<?

/* Charge credit cards using CyberSource SOAP API */
class Cybercharge extends SoapClient
{
    /*
    private $merchant_id = '345272407882';
    private $key = 'Wsnn2rcK4JW3HFK8d5zMBu9lwhMlwFl6jmqp5nnU2v0z4N1+I1Ik1P1xfIFNWSfCoNlpylBxHJTzy584pYqXBmO1y8hmQ5G3pYSS73VUtJ4ZExiLwUgesFOmFcWXyhMdDSoAjDUU50arrvl0hnOwMs4sIbe+K6v9OXgNzQubSgOScCAHuVz+HdzbbEVDnMwG72XCEyXAWXqOaqnmedTa/TPg3X4jUiTU/XF8gU1ZJ8Kg2WnKUHEclPPLnzilipcGY7XLyGZDkbelhJLvdVS0nhkTGIvBSB6wU6YVxZfKEx0NKgCMNRTnRquu+XSGc7Ayziwht74rq/05eA3NC5tKAw==';
    private $wsdl_url = 'https://ics2ws.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.74.wsdl';
    private $wsdl_url = 'https://ics2wstest.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.74.wsdl';
    */

    private $merchant_id;
    private $merchant_key;
    private $wsdl_url;
    private $purchaseCurrency = 'USD';
    //private $soap = null;

    function __construct($params)
    {
        parent::__construct($params['wsdl_url'], $params['options']);
    }

    public function init($merchant_id, $merchant_key)
    {
        $this->merchant_id = $merchant_id;
        $this->merchant_key = $merchant_key;
        //$this->wsdl_url = $wsdl_url;
        //$this->soap = new SoapClient($this->wsdl_url);
        return "trufax";
    }

    /*
        $card = array(first,last,street,city,state,zip,country,number,month,year,cvn,email,ip)
        $product = array(reference,price,quantity,id)
        return = array(bool success, string error, float price, bool soap_fault)
    */
    public function charge($card,$product) 
    {
        if(!$this->merchant_key)
            throw new Exception('Run init() before charge()');

        try
        {
            //var_dump($soapClient->__getFunctions());
            //var_dump($soapClient->__getTypes());
            //die;

            /* build request */
            $request = new stdClass();

            // for troubleshooting
            $request->clientLibrary = "PHP";
            $request->clientLibraryVersion = phpversion();
            $request->clientEnvironment = php_uname();

            //no idea
            $ccAuthService = new stdClass();
            $ccAuthService->run = "true";
            $request->ccAuthService = $ccAuthService;

            // init vars
            $request->merchantID = $this->merchant_id;
            
            // product vars
            $request->merchantReferenceCode = $product['reference'];

            $items = array();
            $items[0] = new stdClass();
            $items[0]->unitPrice = $product['price'];
            $items[0]->quantity = $product['quantity'];
            $items[0]->id = $product['id'];   
            $request->item = $items;

            // card vars
            $billTo = new stdClass();
            $billTo->firstName = $card['first'];
            $billTo->lastName = $card['last'];
            $billTo->street1 = $card['street'];
            $billTo->city = $card['city'];
            $billTo->state = $card['state'];
            $billTo->postalCode = $card['zip'];
            $billTo->country = $card['country'];
            $billTo->email = $card['email'];
            $billTo->ipAddress = $card['ip'];
            $request->billTo = $billTo;

            $request->card = new stdClass();
            $request->card->accountNumber = $card['number'];
            $request->card->expirationMonth = $card['month'];
            $request->card->expirationYear = $card['year'];
            $request->card->cvNumber = $card['cvn'];

            $purchaseTotals = new stdClass();
            $purchaseTotals->currency = $this->purchaseCurrency;
            $request->purchaseTotals = $purchaseTotals;

            $reply = $this->runTransaction($request);            
            //echo "Reply:<br/>";
            //var_dump($reply);
            $out = array();
            if($reply->decision === 'ACCEPT' || $reply->reasonCode == 100)
            {
                $out['success'] = true;
                $out['price'] = $reply->ccAuthReply->amount;
                $out['error'] = '';
                $out['soap_fault'] = false;
            }
            else
            {
                $out['success'] = false;
                $out['price'] = 0;
                $out['error'] = $this->error_string($reply);
                $out['soap_fault'] = false;
            }
        } 
        catch (SoapFault $exception) 
        {
            $out['success'] = false;
            $out['price'] = 0;
            $out['error'] = 'SOAP fault: '.serialize($exception); 
            $out['soap_fault'] = true;
        }
        $out['reply'] = $reply;
        return $out;
    }

    function error_string($reply)
    {
        $fields = array(
            'c:billTo/c:firstName' => 'First Name',
            'c:billTo/c:lastName' => 'Last Name',
            'c:card/c:accountNumber' => 'Credit Card Number',
            'c:billTo/c:street1' => 'Credit Card Street',
            'c:billTo/c:city' => 'Credit Card City',
            'c:billTo/c:state' => 'Credit Card State',
            'c:billTo/c:postalCode' => 'Credit Card ZIP Code',
            'c:expirationMonth' => 'Credit Card Month',
            'c:billTo/c:email' => 'Email Address',
            'c:cvNumber' => 'CVN'
        );

        if(!empty($reply->invalidField))
            while(is_array($reply->invalidField))
                $reply->invalidField = $reply->invalidField[0];
        if(!empty($reply->missingField))
            while(is_array($reply->missingField))
                $reply->missingField = $reply->missingField[0];
        
        switch($reply->reasonCode)
        {
            case 100: return "";
            case 101: 
                if(empty($fields[$reply->missingField]))
                    return "Some fields are incomplete.";
                else
                    return "The Following field is missing: " . $fields[$reply->missingField];
            case 102: 
                if(empty($fields[$reply->invalidField]))
                    return "Some fields are invalid.";
                else
                    return "The Following field is invalid: " . $fields[$reply->invalidField];
            case 104: return "Duplicate Merchant Reference Code";
            case 150:
            case 151:
            case 152: return "Internal System Error";
            case 221:
            case 201: return "Your bank has questions regarding this transfer. Please contact your bank to proceed.";
            case 202: return "Your card has expired.";
            case 203: 
            case 204:
            case 205:
            case 208:
            case 209:
            case 233:
            case 210: return "Your card has been declined.";
            case 234:
            case 236:
            case 241:
            case 207: return "Unable to connect to your bank. Please wait a few minutes and try again.";
            case 211: return "Invalid CVN";
            case 240:
            case 231: return "Invalid Credit Card Number";
            case 232: return "Invalid Credit Card Type";
            default: return "Internal Error. Please contact an administrator.";
        }
    }

    // adds a dumb header to a standard soap request (straight from cybersource example cli-sample.php)
    function __doRequest($request, $location, $action, $version)
    {
        $user = $this->merchant_id;
        $password = $this->merchant_key;
        $soapHeader = "<SOAP-ENV:Header xmlns:SOAP-ENV=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:wsse=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd\"><wsse:Security SOAP-ENV:mustUnderstand=\"1\"><wsse:UsernameToken><wsse:Username>$user</wsse:Username><wsse:Password Type=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText\">$password</wsse:Password></wsse:UsernameToken></wsse:Security></SOAP-ENV:Header>";

        $requestDOM = new DOMDocument('1.0');
        $soapHeaderDOM = new DOMDocument('1.0');

        try {
            $requestDOM->loadXML($request);
            $soapHeaderDOM->loadXML($soapHeader);
            $node = $requestDOM->importNode($soapHeaderDOM->firstChild, true);
            $requestDOM->firstChild->insertBefore($node, $requestDOM->firstChild->firstChild);
            $request = $requestDOM->saveXML();
        } catch (DOMException $e) {
            throw new Exception('Error adding UsernameToken: ' . $e->code);
        }

        return parent::__doRequest($request, $location, $action, $version);
    }
}
?>

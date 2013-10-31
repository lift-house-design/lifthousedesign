<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charge extends App_Controller
{
	private $merchant_id = '345272407882';
    private $key = 'Wsnn2rcK4JW3HFK8d5zMBu9lwhMlwFl6jmqp5nnU2v0z4N1+I1Ik1P1xfIFNWSfCoNlpylBxHJTzy584pYqXBmO1y8hmQ5G3pYSS73VUtJ4ZExiLwUgesFOmFcWXyhMdDSoAjDUU50arrvl0hnOwMs4sIbe+K6v9OXgNzQubSgOScCAHuVz+HdzbbEVDnMwG72XCEyXAWXqOaqnmedTa/TPg3X4jUiTU/XF8gU1ZJ8Kg2WnKUHEclPPLnzilipcGY7XLyGZDkbelhJLvdVS0nhkTGIvBSB6wU6YVxZfKEx0NKgCMNRTnRquu+XSGc7Ayziwht74rq/05eA3NC5tKAw==';
    //private $wsdl_url = 'https://ics2ws.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.74.wsdl';
    private $wsdl_url = 'https://ics2wstest.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.74.wsdl';

	public function __construct()
	{
		parent::__construct();

		$this->load->library(
			'Cybercharge',
			array(
				'wsdl_url' => $this->wsdl_url, 
				'options' => array()
			)
		);
		
		$this->cybercharge->init($this->merchant_id, $this->key);
	
		if(!$this->user->logged_in)
			redirect('/');
	}

	public function index()
	{
		$this->view = false;
	}

	public function add_credits()
	{
		// lets get some default data
		if(empty($_POST['card']))
			$_POST['card'] = array();

		$_POST['card'] = array_merge(
			array(
				'first' => '',
				'last' => '',
				'street' => '',
				'city' => '',
				'state' => '',
				'zip' => '',
				'number' => '',
				'month' => '',
				'year' => '',
				'cvn' => '',
				'email' => $this->user->data['email']
			),
			$_POST['card']
		);
		$this->data['card'] = $_POST['card'];

		if(empty($_POST['product']))
			$_POST['product'] = array();

        $_POST['product'] = array_merge(
        	array(
	        	'reference' => substr(sha1(time().$_SERVER['REMOTE_ADDR']),10,10),
	        	'price' => 100.00
	        ),
	        $_POST['product']
		);
		$this->data['product'] = $_POST['product'];

		$this->data['post'] = $_POST;

		// go ahead and charge if the form has been submitted
		if(!empty($_POST['submit']))
		{
			$this->data['card']['ip'] = $_SERVER['REMOTE_ADDR'];
			$this->data['product']['id'] = sha1(time().$this->data['card']['ip']); 
			$this->data['result'] = $this->cybercharge->charge($this->data['card'], $this->data['product']);
			if($this->data['result']['success'])
				$this->user->add_credits($this->data['result']['price']);
		}
	}

	public function test()
	{
		$this->view = false;

		$card = array(
			'first' => 'Marvin',
			'last' => 'Martian',
			'street' => '9999 nope',
			'city' => 'austin',
			'state' => 'texas',
			'zip' => 999,
			'country' => 'IDK',
			'number' => 73281937182379,
			'month' => 'january',
			'year' => 20,
			'cvn' => 'haha',
			'email' => '',
			'ip' => $_SERVER['REMOTE_ADDR']
		);

        $product = array(
        	'reference' => 'REF431424',
        	'price' => 0.01,
        	'quantity' => 2,
        	'id' => 'ID431231233333'
        );

		$this->cybercharge->charge($card, $product);
	}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */
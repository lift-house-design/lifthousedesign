<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Development Mode
|--------------------------------------------------------------------------
|
| Set to true to display errors and debugging information.
|
|--------------------------------------------------------------------------
*/
if(stripos($_SERVER['HTTP_HOST'],'local.') !== false)
	$config['dev_mode'] = true;
else
	$config['dev_mode'] = false;

/*
|--------------------------------------------------------------------------
| Database Configuration
|--------------------------------------------------------------------------
|
| http://ellislab.com/codeigniter/user-guide/database/configuration.html
|
|--------------------------------------------------------------------------
*/
if($config['dev_mode'])
{
	$config['database']=array(
		'hostname'=>'localhost',
		'username'=>'root',
		'password'=>'root',
		'database'=>'lifthousedesign',
		'dbdriver'=>'mysqli',
		'db_debug'=>$config['dev_mode'],
	);
}
else
{
	$config['database']=array(
		'hostname'=>'localhost',
		'username'=>'thomas',
		'password'=>'Dsb6Zf3npPi8',
		'database'=>'thomas_lhd',
		'dbdriver'=>'mysqli',
		'db_debug'=>$config['dev_mode'],
	);
}


/*
|--------------------------------------------------------------------------
| General Site Configuration
|--------------------------------------------------------------------------
|
| 'site_name'			the name of the site [company name] used in copyright
|
| 'site_description'	a short description or tagline to be used as the
|						default meta description and possibly other places
|						on the site
|
| 'title_format'		the formatting of the title used on every page, where
|						the first argument is the site name and the second is
|						the page name
|
| 'copyright_format'	the formatting of the copyright used at the bottom
|						of every page and in the meta tag, where the first
|						argument is the site name and the second is the 
|						current year
|
| 'assets_url'			url prefix to the assets directory
|
| 'ga_code'				the "UA-XXXXX-X" code for google analytics, or FALSE
|						to disable
|
*/
$config['meta']['title'] = "Austin Local Web Design - Lift House Design";
$config['meta']['description'] = "Austin TX Website Design, Graphic Design, Logo Design, Photography, Videography, Voice Talent, Internet Marketing, and SEO Services";
$config['seo_content'] = '';

$config['site_name'] = 'Lift House Design';
$config['title_format']='%1$s | %2$s';
$config['copyright_format']='Copyright &copy; %1$s %2$d. All Rights Reserved.';
$config['assets_url']='/assets';
$config['ga_code']='UA-40034269-1';

/*
|--------------------------------------------------------------------------
| E-mail Notifications Configuration
|--------------------------------------------------------------------------
*/
$config['email_notifications']=array(
	'sender_email'=>'no-reply@lifthousedesign.com',
	'sender_name'=>'Lift House Design',
	/*'config'=>array(
		'protocol'=>'smtp',
		'smtp_host'=>'ssl://secure.emailsrvr.com',
		'smtp_user'=>'system@accidentreview.com',
		'smtp_pass'=>'9iojkl',
		'smtp_port'=>'465',
		'mailtype'=>'text',
	),*/
	'config'=>array(
		'protocol'=>'smtp',
		'smtp_host'=>'mail.lifthousedesign.com',
		'smtp_user'=>'no-reply@lifthousedesign.com',
		'smtp_pass'=>'9sbZdlAklydT',
		'smtp_port'=>'25',
		'mailtype'=>'text',
	),
	'templates'=>array(
		'inquiry'=>array(
			'subject'=>'Inquiry Received via lifthousedesign.com',
			'message'=>file_get_contents(dirname(__FILE__).'/templates/email/inquiry.php'),
			'to'=>'bain.lifthousedesign@gmail.com',
		),
	),
);

/*
|--------------------------------------------------------------------------
| Harvest Configuration
|--------------------------------------------------------------------------
|
| These are the settings for retrieving data from our Harvest time tracking
| web application that is displayed on the client dashboard page.
|
| 'user'				the e-mail address of the account that will be
|						used to log in to Harvest's API; this should
|						be a dedicated administrator account used only
|						for this purpose
|
| 'password'			the password to the account used to access Harvest
|
| 'account'				the string used to identify our Harvest
|						account, for example, if we access our account at
|						https://lifthousedesign.harvestapp.com, then
|						the company string would be "lifthousedesign"
|
| 'use_ssl'				a boolean that determines whether or not to use
|						SSL to encrypt traffic between the application
|						and Harvest
|
*/
$config['harvest']=array(
	'user'=>'api@lifthousedesign.com',
	'password'=>'XO18D8q1w371Xaf',
	'account'=>'lifthousedesign',
	'use_ssl'=>FALSE,
);

/* End of file app.php */
/* Location: ./application/config/app.php */
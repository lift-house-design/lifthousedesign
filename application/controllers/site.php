<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends App_Controller
{
	protected $models=array('user','inquiry');

	public function index()
	{
		$this->js[]='jquery.maskedinput.min.js';
		$this->js[]='jquery.validate.min.js';
		$this->js[]='jquery.validate.additional-methods.min.js';
		
		$this->js[]='site-index.js';
		$this->css[]='mobile.css';

		//$this->form_validation->set_error('This is a test error.');

		if($this->input->post())
		{
			if($this->inquiry->insert($this->input->post()))
			{
				$this->set_notification('Your inquiry has been received. Please allow 24-48 hours for a response. Thank you!');
			}
		}
	}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */
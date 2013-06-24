<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends App_Controller
{
	public function index()
	{
		$this->js[]='site-index.js';
	}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */
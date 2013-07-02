<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends App_Controller
{
	public function index()
	{
		$this->load->library('harvestapi');
		$this->harvestapi->setUser('some@user.com');
		//var_dump($this->harvestapi);
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
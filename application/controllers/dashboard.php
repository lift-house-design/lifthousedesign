<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends App_Controller
{
	public function index()
	{
		$config=$this->config->item('harvest');
		$this->load->library('harvest');

		$this->harvest->setUser($config['user']);
		$this->harvest->setPassword($config['password']);
		$this->harvest->setAccount($config['account']);
		$this->harvest->setSSL($config['use_ssl']);



		//$project_result=$this->harvest->getClients();

		/*if($this->harvest->isSuccess())
		{
			
		}*/


		//$this->data['projects']=$project_result;
		//$this->harvest->getClientProjects(0);
		//var_dump(file_put_contents('/Users/nick/Desktop/testfile.txt','TESTDATAGOESHERE'));

		//$this->css[]='smoothness/jquery-ui-1.10.3.custom.min.css';
		//$this->js[]='jquery-ui-1.10.3.min.js';

		// Switch nav for dashboard
		$this->asides['nav']='layouts/nav_dashboard';

		// Load dataTables
		$this->js[]=array(
			'file'=>'js/jquery.dataTables.min.js',
			'type'=>'plugins/datatables',
		);
		$this->css[]=array(
			'file'=>'css/jquery.dataTables.css',
			'type'=>'plugins/datatables',
		);
		$this->js[]='dashboard-index.js';
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
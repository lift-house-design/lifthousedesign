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
		$this->harvest->getClientProjects(0);
		//var_dump(file_put_contents('/Users/nick/Desktop/testfile.txt','TESTDATAGOESHERE'));
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
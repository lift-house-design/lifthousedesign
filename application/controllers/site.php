<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends App_Controller
{
	public function __construct()
	{
		$this->models=array_merge($this->models,array(
			'inquiry',
			'portfolio',
		));

		parent::__construct();
	}

	public function index()
	{
		// Masked input
		$this->js[]='jquery.maskedinput.min.js';

		// Validate
		$this->js[]='jquery.validate.min.js';
		$this->js[]='jquery.validate.additional-methods.min.js';

		// Fancybox
		$this->js[]=array(
			'file'=>'jquery.fancybox.pack.js',
			'type'=>'plugins/fancybox2',
		);
		$this->css[]=array(
			'file'=>'jquery.fancybox.css',
			'type'=>'plugins/fancybox2',
		);
		
		// Other assets
		$this->js[]='site-index.js';

		if($this->input->post('send_quote'))
		{
			if($this->inquiry->insert($this->input->post()))
			{
				$this->set_notification('Thank you for contacting us. We will be in touch within the next 48 hours.');
			}
		}

		$this->data['portfolio']=$this->portfolio->get_all();
	}

	public function coming_soon()
	{
		$this->layout=FALSE;
	}

	public function portfolio_details($id)
	{
		$this->layout=FALSE;
		$this->data['work']=$this->portfolio->get($id);
		$pathinfo=pathinfo($this->data['work']['url']);
		$this->data['work']['display_url']=$pathinfo['basename'];
	}

	public function login()
	{
		if($data=$this->input->post('login'))
		{
			if($this->user->log_in())
			{
				$this->set_notification('You have successfully logged in.');
				redirect('dashboard');
			}
		}

		$this->index();
		$this->view='site/index';
	}

	public function logout()
	{
		$this->user->log_out();
		$this->set_notification('You have successfully logged out.');
		redirect('/');
	}

	public function page()
	{
		$slug=str_replace('-','_',$this->uri->uri_string());

		if(file_exists(APPPATH.'views/site/pages/'.$slug.'.php'))
		{
			$this->view='site/pages/'.$slug;
			$this->layout=FALSE;
		}
		elseif(file_exists(APPPATH.'views/'.$slug.'.php'))
		{
			$this->view=$slug;
			$this->layout=FALSE;
		}
		else
			$this->view='site/not_found';
	}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */
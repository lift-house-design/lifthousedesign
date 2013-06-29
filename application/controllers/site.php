<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends App_Controller
{
	protected $models=array('user','inquiry','portfolio');

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

		if($this->input->post())
		{
			if($this->inquiry->insert($this->input->post()))
			{
				$this->set_notification('Your inquiry has been received. Please allow 24-48 hours for a response. Thank you!');
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
	}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */
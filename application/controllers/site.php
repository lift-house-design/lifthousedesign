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

		$this->data['seo_content'] = '
			<a href="http://lifthousedesign.com/site/web_development">Web Development</a>
			<a href="http://lifthousedesign.com/site/website_design">Website Design</a>
			<a href="http://lifthousedesign.com/site/search_engine_optimization">Search Engine Optimization</a>
			<a href="http://lifthousedesign.com/site/graphic_design">Graphic Design</a>
			<a href="http://lifthousedesign.com/site/photography">Photography</a>
			<a href="http://lifthousedesign.com/site/videography">Videography</a>';

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
	{ // does this do anything on lifthouse?
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

	// SEO pages (For google, javascript redirects back to main page)
	public function web_development(){
		$this->data['meta']['title'] = "Austin Local Web Development - Lift House Design";
		$this->data['meta']['description'] = "Austin-based website development company - Lift House Design - offers web programming, custom website building, database design, and all of your other backend development needs.";
		$this->data['url'] = '/';
		$this->data['content'] = "Lift House Design provides quality website development in Austin. Need a custom ecommerce website built to your sepcifications? No problem! Having trouble with your databases?
We can provide you with a web developer or a database administrator to handle your CMS development, database design, database management, data migration, and even full database migration.";
        $this->view = 'site/seo_page';
	}
	public function website_design(){
		$this->data['meta']['title'] = "Austin Local Website Design - Lift House Design";
		$this->data['meta']['description'] = "Lift House offers the best local website builder services, website design, UI design, landing page design, and mobile website designs in Austin TX and surrounding areas.";
		$this->data['url'] = '/';
		$this->data['content'] = "Whether you are frustrated with your current website builder, or you don't know where to start with your website design, our website designer team can deliver the best web site designs, UI design (User Interface design), web page design, mobile website design, and landing page design. Lift House Design is a premium web design company which is ready to handle everything from mobile first design projects to custom content management systems for your local business websites.";
        $this->view = 'site/seo_page';
    }
	public function search_engine_optimization(){
		$this->data['meta']['title'] = "Austin Local Search Engine Optimization - Lift House Design";
		$this->data['meta']['description'] = "Local Austin SEO company offering search engine marketing services, web analytics installation, social media monitoring, and business branding to help your company prosper.";
		$this->data['url'] = '/';
		$this->data['content'] = "If you are looking for search engine optimization on website SEO services, Lift House Design is there to help your company get noticed. Our marketing staff can handle anything form business branding and content creation, to social media management and local SEO optimization.";
        $this->view = 'site/seo_page';
    }
	public function graphic_design(){
		$this->data['meta']['title'] = "Austin Local Graphic Design - Lift House Design";
		$this->data['meta']['description'] = "Look no further for graphic design, info graphics, and logo design by local Austin-based company, Lift House Design.";
		$this->data['url'] = '/';
		$this->data['content'] = "Lift House Design's graphic designer team will help you create a logo, come up with a business card design, and create stunning custom website graphics. Check out our graphic design portfolio and see what our logo designer team can do.";
        $this->view = 'site/seo_page';
    }
	public function photography(){
		$this->data['meta']['title'] = "Austin Local Photography - Lift House Design";
		$this->data['meta']['description'] = "One of the best photography websites offering professional photography and graphic design.
";
		$this->data['url'] = '/';
		$this->data['content'] = "Lift House Design provides high quality photography services for custom graphics on your website. If you are tired of cliche template photographs on your website, we will help you get fresh content and polish them into beautiful graphics for your website.";
        $this->view = 'site/seo_page';
    }
	public function videography(){
		$this->data['meta']['title'] = "Austin Local Videography - Lift House Design";
		$this->data['meta']['description'] = "For Austin videographer and video marketing services, think local, think Lift House Design.";
		$this->data['url'] = '/';
		$this->data['content'] = "We offer a wide array of professional video production services. If you need promotional video ideas, our corporate video company will help your campaign to succeed. Whether you are looking to promote YouTube videos, or use web video to promote your website, Lift House is can help your content reach the spotlight.";
        $this->view = 'site/seo_page';
    }
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */
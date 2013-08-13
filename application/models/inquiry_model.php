<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Inquiry_model extends App_Model
	{
		public $_table='inquiries';
		
		public $validate=array(
			array(
				'field'=>'name',
				'label'=>'Name',
				'rules'=>'required|maxlength[64]', 
			),
			array(
				'field'=>'company',
				'label'=>'Company',
				'rules'=>'alpha_numeric|maxlength[64]',
			),
			array(
				'field'=>'website',
				'label'=>'Website',
				'rules'=>'maxlength[64]',
			),
			array(
				'field'=>'email',
				'label'=>'E-mail',
				'rules'=>'required|valid_email|maxlength[32]',
			),
			array(
				'field'=>'phone',
				'label'=>'Phone',
				'rules'=>'maxlength[14]',
			),
			array(
				'field'=>'project_info',
				'label'=>'Project Info',
				'rules'=>'required',
			),
		);
		
		public $before_create=array('_filter_data','created_at','send_email');

		protected function send_email($data)
		{
			$data['email_successful']=send_email('inquiry',$data) ? 1 : 0;
			if($data['email_successful']==0)
				$data['email_debug']=get_instance()->email->print_debugger();
			return $data;
		}
	}
	
/* End of file inquiry_model.php */
/* Location: ./application/models/inquiry_model.php */
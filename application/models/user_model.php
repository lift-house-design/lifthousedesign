<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class User_model extends App_Model
	{
		public $_table='users';
		
		/*public $validate=array(
			array(
				'field'=>'',
				'label'=>'',
				'rules'=>'required',
			),
		);*/
		
		public $has_many=array();
		
		public $belongs_to=array();
		
		public $after_get=array();

		/* User members
		-------------------------------------------------------------------------*/

		public $logged_in=FALSE;
		
		public $data;
		
		public function __construct()
		{
			parent::__construct();
			
			$user=$this->session->userdata('user');
			$this->logged_in=!empty($user);
			
			if($this->logged_in)
				$this->data=$user;
		}
		
		public function log_in()
		{
			$rules=array(
				array(
					'field'=>'email',
					'label'=>'E-mail',
					'rules'=>'required|max_length[64]|valid_email',
				),
				array(
					'field'=>'password',
					'label'=>'Password',
					'rules'=>'required|sha1',
				),
			);

			$this->form_validation->set_rules($rules);

			if($this->form_validation->run()!==FALSE)
			{
				$user=$this->get_by(array(
					'email'=>$this->input->post('email'),
					'password'=>$this->input->post('password'),
				));
				
				if(empty($user))
				{
					$this->form_validation->set_error('The e-mail address or password you entered was incorrect. Please try again.');
					return FALSE;
				}
				
				$this->session->set_userdata('user',$user);

				$this->update($user['id'],array(
					'last_login'=>date('Y-m-d H:i:s'),
				));

				return TRUE;
			}
			
			return FALSE;
		}
		
		public function log_out()
		{
			$this->session->unset_userdata('user');

			return TRUE;
		}

		public function authenticate($role=NULL)
		{
			return $this->logged_in===TRUE;
		}
	}
	
/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
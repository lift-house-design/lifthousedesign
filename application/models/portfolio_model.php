<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Portfolio_model extends App_Model
	{
		public $_table='portfolio';

		public $validate=array(
			/*
			array(
				'field'=>'',
				'label'=>'',
				'rules'=>'required',
			),
			*/
		);

		public $has_many=array(
			/*
			'relationship'=>array(
				'model'=>'Exact_model_name',
				'primary_key'=>'field_name_on_other_model',
			),
			*/
		);
		
		public $belongs_to=array();
		
		public $before_create=array('created_at','updated_at');

		public $before_update=array('updated_at');

		public $after_get=array();
	}
	
/* End of file portfolio_model.php */
/* Location: ./application/models/portfolio_model.php */
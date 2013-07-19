<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends App_Controller
{
	private $_cache_harvest=FALSE;

	public function index()
	{
		$config=$this->config->item('harvest');
		$this->load->library('harvest');

		$this->harvest->setUser($config['user']);
		$this->harvest->setPassword($config['password']);
		$this->harvest->setAccount($config['account']);
		$this->harvest->setSSL($config['use_ssl']);

		// Get this user's client ID for Harvest
		$harvest_client_id=$this->user->data['harvest_client_id'];

		// Clear the cache
		if($this->_cache_harvest===FALSE)
			$this->cache->delete_all();

		// Get client's estimates
		$this->data['estimates']=$this->_get_estimates();

		// Get client's billing
		$this->data['billing']=$this->_get_billing();

		// Get client's projects
		$this->data['projects']=$this->_get_projects();
		

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
		// Load contentTable
		$this->js[]='jquery.contentTable.js';
		// Load maskedinput plugin
		$this->js[]='jquery.maskedinput.min.js';
		// Validate
		$this->js[]='jquery.validate.min.js';
		$this->js[]='jquery.validate.additional-methods.min.js';
		// Load page js
		$this->js[]='dashboard-index.js';

		if($this->input->post('update_profile'))
		{
			if($this->user->update($this->user->data['id'],$this->input->post()))
			{
				$user=$this->user->get($this->user->data['id']);
				$this->session->set_userdata('user',$user);

				$this->set_notification('Your profile was successfully updated.');
			}

			if($this->input->post('change_password') && $this->input->post('confirm_password'))
			{
				if($this->input->post('change_password') != $this->input->post('confirm_password'))
				{
					$this->form_validation->set_error('Your new passwords must match in order to continue changing your password.');
				}
				elseif($this->user->update($this->user->data['id'],array('password'=>sha1($this->input->post('change_password')))))
				{
					$this->set_notification('Your password was successfully changed.');
				}
				else 
				{
					$this->form_validation->set_error('There was a problem changing your password.');
				}
			}
		}
	}

	public function project()
	{
		$this->layout=FALSE;
	}

	protected function _get_estimates()
	{
		// Get the harvest client ID
		$harvest_client_id=$this->user->data['harvest_client_id'];

		// Currently waiting on Harvest support to get back to me on this
		return FALSE;
	}

	protected function _get_billing()
	{
		// Get the harvest client ID
		$harvest_client_id=$this->user->data['harvest_client_id'];

		// Get all invoices for this client
		$cache_key='harvest-client-invoices-'.$harvest_client_id;

		if(($client_invoices=$this->cache->get($cache_key))===FALSE)
		{
			// Refresh the cache with data from Harvest
			$filter=new Harvest_Invoice_Filter();
			$filter->set('client',$harvest_client_id);
			$client_invoices_result=$this->harvest->getInvoices($filter);
			if($client_invoices_result->isSuccess())
			{
				$client_invoices=$client_invoices_result->data;
				$this->cache->write($client_invoices,$cache_key);
			}
			else
				return FALSE;
		}

		// Get the needed data for each invoice
		$billing_data=array();

		foreach($client_invoices as $invoice)
		{
			if($invoice->state!='draft')
			{
				$data=array(
					'amount'=>$invoice->amount,
					'date_issued'=>$invoice->get('issued-at'),
					'date_due'=>$invoice->get('due-at'),
					'status'=>$invoice->state,
				);

				$billing_data[]=$data;
			}
		}

		return $billing_data;
	}

	protected function _get_projects()
	{
		// Get the harvest client ID
		$harvest_client_id=$this->user->data['harvest_client_id'];

		// Get all projects for this client
		$cache_key='harvest-client-projects-'.$harvest_client_id;

		if(($client_projects=$this->cache->get($cache_key))===FALSE)
		{
			// Refresh the cache with data from Harvest
			$client_projects_result=$this->harvest->getClientProjects($harvest_client_id);
			if($client_projects_result->isSuccess())
			{
				$client_projects=$client_projects_result->data;
				$this->cache->write($client_projects,$cache_key);
			}
			else
				return FALSE;
		}

		// Get the needed data for each project
		$project_data=array();

		foreach($client_projects as $project_id=>$project)
		{
			$data=array(
				'id'=>$project_id,
				'name'=>$project->name,
			);

			// Get all user assignments for this project
			$cache_key='harvest-project-user-assignments-'.$project_id;

			if(($user_assignments=$this->cache->get($cache_key))===FALSE)
			{
				// Refresh the cache with data from Harvest
				$user_assignments_result=$this->harvest->getProjectUserAssignments($project_id);
				if($user_assignments_result->isSuccess())
				{
					$user_assignments=$user_assignments_result->data;
					$this->cache->write($user_assignments,$cache_key);
				}
				else
					return FALSE;
			}

			// Create a mapping of user IDs to hourly rate (these can be changed on a per-project basis)
			$hourly_rates=array();
			foreach($user_assignments as $user_assignment)
			{
				$hourly_rates[$user_assignment->get('user-id')]=$user_assignment->get('hourly-rate');
			}

			// Get all time entries for this project
			$entries_from=date('Ymd',strtotime($project->get('hint-earliest-record-at')));
			$entries_to=date('Ymd',strtotime($project->get('hint-latest-record-at')));

			$cache_key='harvest-project-entries-'.$project_id.'-'.$entries_from.'-'.$entries_to;

			if(($project_entries=$this->cache->get($cache_key))===FALSE)
			{
				// Refresh the cache with data from Harvest
				$project_entries_result=$this->harvest->getProjectEntries($project_id,new Harvest_Range($entries_from,$entries_to));
				if($project_entries_result->isSuccess())
				{
					$project_entries=$project_entries_result->data;
					$this->cache->write($project_entries,$cache_key);
				}
				else
					return FALSE;
			}

			$total_hours=0;
			$total_amount=0;

			foreach($project_entries as $project_entry)
			{
				$total_hours+=$project_entry->hours;
				
				if(isset($hourly_rates[$project_entry->get('user-id')]))
				{
					$total_amount+=( $project_entry->hours * $hourly_rates[$project_entry->get('user-id')] );
				}
			}

			$data['total_hours']=$total_hours;
			$data['total_amount']=$total_amount;

			$project_data[$project_id]=$data;
		}

		return $project_data;
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
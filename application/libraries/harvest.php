<?php

require_once('HarvestAPI.php');
spl_autoload_register(array('HarvestAPI','autoload'));
class Harvest extends HarvestAPI {
	protected $_ci;

	public function __construct()
	{
		$this->_ci=get_instance();
	}

	public function getClientProjects($client_id)
	{
		//$this->_ci->cache->delete_all();

		if(($harvest_projects=$this->_ci->cache->get('harvest-projects'))===FALSE)
		{
			$harvest_projects_result=$this->getProjects();
			if($harvest_projects_result->isSuccess())
			{
				$harvest_projects=$harvest_projects_result->data;
				$this->_ci->cache->write($harvest_projects,'harvest-projects');
			}
			else return FALSE;
		}

		$client_projects=array();

		foreach($harvest_projects as $project_id=>$project)
		{
			if($project->get('client-id')==$client_id)
			{
				$client_projects[$project_id]=$project;
			}
		}

		return $client_projects;
	}
}

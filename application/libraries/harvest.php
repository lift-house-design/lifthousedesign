<?php

require_once('HarvestAPI.php');
spl_autoload_register(array('HarvestAPI','autoload'));

class Harvest extends HarvestAPI {
	protected $_ci;

	public function __construct()
	{
		$this->_ci=get_instance();
	}

	public function get_projects_by_client($client_id)
	{
		if(($harvest_projects=$this->_ci->cache->get('harvest-projects'))===FALSE)
		{
			$harvest_projects_result=$this->getProjects();
			if($harvest_projects_result->isSuccess())
			{
				$harvest_projects=$harvest_projects_result->data;
				$this->_ci->cache->write($harvest_projects,'harvest-projects');
			}
			else
				return FALSE;
		}

		$projects=array();

		foreach($harvest_projects as $project_id=>$project)
		{
			if($project->get('client-id')==$client_id)
			{
				$projects[$project_id]=$project;
			}
		}

		return $projects;
	}
}

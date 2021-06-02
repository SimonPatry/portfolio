<?php

namespace Controllers;

class DashboardProjectsController
{
    private $project;
	public function __construct()
	{
		$this -> project = new \Models\Projects();
	}
	public function display()
	{
        $projects = $this -> project -> getAllProjects();
		include "views/dashboardProjects.phtml";
	}
	public function editProject()
	{
		$project = json_decode(file_get_contents('php://input'));
		if ($project->cat = "C#")
			$cat = 2;
        $datas = [$project->name, $cat, $project->description, $project->image, $project->video, $project->id];
		$this -> project -> editProject($datas);
	}
}
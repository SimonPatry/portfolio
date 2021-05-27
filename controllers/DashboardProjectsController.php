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
}
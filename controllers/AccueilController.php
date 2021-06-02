<?php

namespace Controllers;

class AccueilController
{
	public function __construct()
	{
		$this -> project = new \Models\Projects();
	}
	public function display()
	{
		$template = "views/accueil.phtml";
		$projects = $this -> project -> getAllProjects();
		$projTemplate = "views/projects.phtml";
		include 'views/layout.phtml';
	}
}
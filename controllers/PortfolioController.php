<?php

namespace Controllers;

class PortfolioController
{
    private $project;
	public function __construct()
	{
		$this -> project = new \Models\Projects();
	}
	public function display()
	{
        $projects = $this -> project -> getAllProjects();
		$template = "views/Portfolio.phtml";
        include 'views/layout.phtml';
	}
}
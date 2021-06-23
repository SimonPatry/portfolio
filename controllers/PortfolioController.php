<?php

namespace Controllers;

class PortfolioController
{
    private $project;
	private $gallery;
	public function __construct()
	{
		$this -> project = new \Models\Projects();
		$this -> gallery = new \Models\Gallery();
	}
	public function display()
	{
        $projects = $this -> project -> getAllProjects();
		$gallery = $this -> gallery -> getAllGallery();
		$template = "views/portfolio.phtml";
        include 'views/layout.phtml';
	}
}
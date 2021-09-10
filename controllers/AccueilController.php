<?php

namespace Controllers;

class AccueilController
{
	private $projet;
	private $contact;
	public function __construct()
	{
		$this -> project = new \Models\Projects();
		$this -> contact = new \Models\Contact();
	}
	public function display()
	{
		$template = "views/accueil.phtml";
		$projects = $this -> project -> getAllProjects();
		$contact = $this -> contact -> getInfos();
		$projTemplate = "views/projects.phtml";
		include 'views/layout.phtml';
	}
}
<?php

namespace Controllers;

/*
	most of the code is located here: accueil.phtml
	there isn't much from the databse
*/

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
<?php

namespace Controllers;

class DashboardController
{
	private $contact;
	public function __construct()
	{
		$this -> contact = new \Models\Contact();
	}
	public function display()
	{
		if(!isset($_SESSION['admin']))
		{
			header('admin');
			exit;
		}
		else
		{
			$contact = $this -> contact -> getInfos();
			include 'views/dashboard.phtml';
		}
	}
	public function updateContact(){

		$contact = json_decode(file_get_contents('php://input'));

		$this -> contact -> update($contact);
	}
}
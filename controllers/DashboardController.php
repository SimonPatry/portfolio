<?php

namespace Controllers;

class DashboardController
{
	public function display()
	{
		if(!isset($_SESSION['admin']))
		{
			header('admin');
			exit;
		}
		else
			include 'views/dashboard.phtml';
	}
}
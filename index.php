<?php

spl_autoload_register(function ($class_name) {
    	$file = lcfirst(str_replace('\\', '/', $class_name));
    	include $file.".php";
});

session_start();

if (isset($_GET['page']))
{
	switch($_GET['page'])
	{
		case 'admin':
			$controller = new Controllers\AdminController();
			$controller -> display();
		break;
		case 'dashboard':
			$controller = new Controllers\DashboardController();
			$controller -> display();
		break;
	}
}
else if(isset($_GET['ajax'])){
	switch($_GET['ajax'])
	{
		case 'projects':
			$controller = new Controllers\DashboardProjectsController();
			$controller -> display();
			break;
	}
}
else
{
	$controller = new Controllers\AccueilController();
	$controller -> display();
}
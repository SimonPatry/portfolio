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
		case 'portfolio':
			$controller = new Controllers\PortfolioController();
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
		case 'editProj':
			$controller = new Controllers\DashboardProjectsController();
			$controller -> editProject();
			break;
		case 'addProj':
			$controller = new Controllers\DashboardProjectsController();
			$controller -> editProject();
			break;
		case 'categories':
			$controller = new Controllers\CategoriesController();
			$controller -> displayCategories();
			break;
		case 'editCategory':
			$controller = new Controllers\CategoriesController();
			$controller -> editCategory();
			break;
		case 'addCategory':
			$controller = new Controllers\CategoriesController();
			$controller -> addCategory();
			break;
		case 'delCategory':
			$controller = new Controllers\CategoriesController();
			$controller -> deleteCategory($_GET['id']);
			break;
	}
}
else
{
	$controller = new Controllers\AccueilController();
	$controller -> display();
}
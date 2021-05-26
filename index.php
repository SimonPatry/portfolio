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
		case 'accueil':
		
		break;
	}
	
}
else
{
	$controller = new Controllers\Accueil();
	$controller -> display();
}
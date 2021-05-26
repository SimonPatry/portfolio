<?php

namespace Controllers;

class Accueil
{
	public function display()
	{
		$template = "views/accueil.phtml";
		include 'views/layout.phtml';
	}
}
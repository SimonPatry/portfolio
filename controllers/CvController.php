<?php

namespace Controllers;

class CvController
{
	public function display()
	{
		$template = "views/cv.phtml";
        include 'views/layout.phtml';
	}
}
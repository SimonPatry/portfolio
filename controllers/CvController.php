<?php

namespace Controllers;

class CvController
{
	/* download and interactions with the files
	are done with the embed tag */
	
	public function display()
	{
		$template = "views/cv.phtml";
        include 'views/layout.phtml';
	}
}
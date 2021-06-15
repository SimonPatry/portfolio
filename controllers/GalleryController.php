<?php

namespace Controllers;

class GalleryController
{
    private $gallery;
    public function __construct()
    {
        $this -> gallery = new \Models\Gallery();
		$this -> project = new \Models\Projects();
    }
	public function gallery()
	{
	    $gallery = $this -> gallery -> getAllGallery();
		$projects = $this -> project -> getAllProjects();
		include "views/dashboardGallery.phtml";
	}
	public function deleteImage($id)
	{
	    $this -> gallery -> delImage($id);
	}
	public function addImage()
	{
		if(!empty($_POST))
		{
			$src = $_POST['src'];
			$alt = $_POST['alt'];
			$project = $_POST['id_project'];
			if (!empty($_FILES['image']['name']))
			{
				$image_name = $_FILES['image']['name'] ;
				$tmp_name = $_FILES['image']['tmp_name'];
				$image = "assets/ressources/images/$image_name";
				move_uploaded_file($tmp_name, $image);
			}
			else
			{
				$image="assets/ressources/images/default.jpg";
			}
			$this -> gallery -> addGallery([$src, $alt, $project,]);
		}
	}
}
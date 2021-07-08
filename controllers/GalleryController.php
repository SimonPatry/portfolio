<?php

namespace Controllers;


/* 
	the gallery was made in one block and not a block per project
	with ids from projects to sort it 
	
	this method isn't the most efficient but was a simple and fast
	solution in this context.
	
	this part will evolve in a more appropriate solution
*/

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
	public function editGallery()
	{
		$gallery = json_decode(file_get_contents('php://input'));
		
        $datas = [$gallery->id_project, $gallery->src, $gallery->alt, $gallery->id];
		$this -> gallery -> editGallery($datas);
	}
	public function addImage()
	{
		if(!empty($_POST))
		{
			var_dump($_POST);
			var_dump($_FILES);
			$alt = $_POST['alt'];
			$project = $_POST['proj'];
			if (!empty($_FILES['src']['name']))
			{
				$image_name = $_FILES['src']['name'] ;
				$tmp_name = $_FILES['src']['tmp_name'];
				$image = "assets/ressources/images/$image_name";
				var_dump($image);
				move_uploaded_file($tmp_name, $image);
			}
			else
			{
				$image="assets/ressources/images/default.jpg";
			}
			$this -> gallery -> addGallery([$image, $alt, $project]);
		}
	}
}
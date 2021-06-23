<?php

namespace Controllers;

class DashboardGalleryController
{
    private $gallery;
	public function __construct()
	{
		$this -> gallery = new \Models\Gallery();
	}
	public function display()
	{
        $gallerys = $this -> gallery -> getAllGallery();
		include "views/dashboardgallerys.phtml";
	}
	public function editGallery()
	{
		/*$datas  = file_get_contents('php://input');
		$gallery = json_decode($datas);
*/
		$gallery = json_decode(file_get_contents('php://input'));
		
        $datas = [$gallery->name, $cat, $gallery->description, $gallery->image, $gallery->video, $gallery->id];
		$this -> gallery -> editGallery($datas);
	}

	public function delgallery()
    {
		var_dump($_GET['id']);
        $id = $_GET['id'];
    	$this -> gallery -> delImage($id);
    }

	public function addGallery()
	{
		if(!empty($_POST))
		{
			$name = $_POST['name'];
			$desc = $_POST['desc'];
			$id_categories = $_POST['cat'];
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
			$video = $_POST['vid'];
			$date = date("Y-m-d");
			$this -> gallery -> addgallery($name, $desc, $image, $video, $date, $id_categories);
		}
	}
}
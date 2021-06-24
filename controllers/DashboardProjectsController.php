<?php

namespace Controllers;

class DashboardProjectsController
{
    private $project;
	public function __construct()
	{
		$this -> project = new \Models\Projects();
	}
	public function display()
	{
        $projects = $this -> project -> getAllProjects();
		include "views/dashboardProjects.phtml";
	}
	public function editProject()
	{
		/*$datas  = file_get_contents('php://input');
		$project = json_decode($datas);
*/
		$project = json_decode(file_get_contents('php://input'));
		if ($project->cat = "C#")
			$cat = 2;
		else if ($project->cat = "web")
			$cat = 1;
		else if ($project->cat = "C")
			$cat = 3;
        $datas = [$project->name, $cat, $project->description, $project->image, $project->video, $project->id];
		$this -> project -> editProject($datas);
	}

	public function delProject()
    {
		var_dump($_GET['id']);
        $id = $_GET['id'];
    	$this -> project -> deleteProject($id);
    }

	public function addProject()
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
			$this -> project -> addProject($name, $desc, $image, $video, $date, $id_categories);
		}
	}
}
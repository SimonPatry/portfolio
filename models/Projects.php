<?php

namespace Models;

class Projects extends Database
{
    
    public function addProject($name, $description, $image, $video, $date, $category)
    {
        $this -> modifyOne("
        INSERT INTO project(name, description, image, video, postDate, id_category)
        VALUES (?, ?, ?, ?, ?, ?)", [$name,$description,$image,$video,$date,$category]);
    }
    
    public function editProject($name,$content,$image,$video,$date,$category,$id)
    {
        $this -> modifyOne("
        UPDATE project SET
        name = ?,
        content = ?,
        image = ?,
        video = ?,
        postDate = ?,
        id_category = ?
        WHERE id = ?" ,[$name,$content,$image,$video,$date,$category,$id]);
    }
    
    public function deleteProject($id)
    {
        $this -> modifyOne("
        DELETE FROM project
    	WHERE id = ? ", [$id]);
    }
    
    public function getProjectById($id):array
    {
    	return $this -> findOne("
    	SELECT id, name, description, image, video, postDate, category.name as category
    	FROM project
        INNER JOIN category ON id_category = category.id
    	WHERE id = ?",[$id]);
    }

    public function getAllProjects()
    {
        return $this -> findAll("
    	SELECT project.id, project.name, description, image, video, postDate, category.name as category
    	FROM project
        INNER JOIN category ON id_category = category.id");
    }
}
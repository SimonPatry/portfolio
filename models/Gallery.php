<?php

namespace Models;

class Gallery extends Database
{
    
    public function addGallery($datas)
    {
        $this -> modifyOne("
        INSERT INTO project(id_project, src, alt)
        VALUES (?, ?, ?)", $datas->id_project, $datas->src, $datas->alt);
    }
    
    public function delImage($id)
    {
        $this -> modifyOne("
        DELETE FROM gallery
    	WHERE id = ? ", [$id]);
    }
    
    public function getGalleryById($id):array
    {
    	return $this -> findOne("
    	SELECT id, id_project, src, alt
    	FROM gallery
    	WHERE id_project = ?",[$id]);
    }

    public function getAllGallery()
    {
        return $this -> findAll("
    	SELECT id, src, alt, id_project
    	FROM gallery
        ");
    }
}
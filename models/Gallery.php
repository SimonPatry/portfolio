<?php

namespace Models;

class Gallery extends Database
{
    
    public function addGallery($datas)
    {
        $this -> modifyOne("
        INSERT INTO gallery (id_project, src, alt)
        VALUES (?, ?, ?)", [$datas[2], $datas[0], $datas[1]]);
    }
    
    public function delImage($id)
    {
        $this -> modifyOne("
        DELETE FROM gallery
    	WHERE id = ? ", [$id]);
    }
    public function editGallery($datas)
    {
        $this -> modifyOne("
        UPDATE gallery SET
        id_project = ?,
        src = ?,
        alt = ?,
        WHERE id = ?" , $datas);
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
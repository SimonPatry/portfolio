<?php

namespace Models;

class Admin extends Database
{
    public function getAdminByIdentifiant($pseudo)
    {
        
    	$result = $this -> findOne("
    	SELECT pseudo, password
    	FROM admin
    	WHERE pseudo = ?", [$pseudo]);
    	
        if(!$result)
		{
			throw new \Exception('Cet identifiant n\'existe pas');
		}
		return $result;
    }
}
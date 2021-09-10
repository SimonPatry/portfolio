<?php

namespace Models;

class Contact extends Database
{

	public function getInfos()
    {
    	return $this -> findOne("
    	SELECT firstName, lastName, mail, phone
    	FROM contact");
    }

    public function update($contact)
    {
    	$this -> modifyOne("
            UPDATE contact
            SET firstName = ?,
			lastName = ?,
			mail = ?,
			phone = ?
            ", [$contact->firstName, $contact->lastName, $contact->mail, $contact->phone]);
    }
}
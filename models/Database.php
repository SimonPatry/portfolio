<?php

namespace Models;

abstract class Database
{
	protected $bdd;
	
	public function __construct()
	{
		try
		{
			$this -> bdd = new \PDO('mysql:host=db.3wa.io;dbname=simonpat_portfolio;charset=utf8','simonpat','c9bd35ef21d84659729783bae58bdef8');
		}
		catch(\Exception $e)
		{
			echo 'erreur bdd';
			echo $e->getMessage();
			die;
		}
	}
	
	public function findAll(string $req,array $params = []):array
	{
		$query = $this -> bdd -> prepare($req);
		$query -> execute($params);
		return $query -> fetchAll(\PDO::FETCH_ASSOC);
	}
	
	public function findOne(string $req,array $params = [])
	{
		$query = $this -> bdd -> prepare($req);
		$query -> execute($params);
		return $query -> fetch(\PDO::FETCH_ASSOC);
	}
	
	public function modifyOne(string $req,array $params = [])
	{
		$query = $this -> bdd -> prepare($req);
		$query -> execute($params);
	}
	
}
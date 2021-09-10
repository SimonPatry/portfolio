<?php

namespace Models;

abstract class Database
{
	protected $bdd;
	
	public function __construct()
	{
		try
		{
			$this -> bdd = new \PDO('mysql:host=localhost:3306.fr;dbname=simonpat38_;charset=utf8','simonpat38','13832b1d85cbb');
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
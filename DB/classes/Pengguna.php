<?php

class pengguna
{
	private $username;
	private $password;
	protected $db;
	
	function __construct($user,$pass)
	{
		$this->username = $user;
		$this->password = $pass;

		$database = new database;
		$this->db = $database->db;	
	}

	public function login()
	{
		$get = $this->db->query("SELECT * FROM pengguna 
		WHERE username ='".$this->username."' AND pass ='".$this->password."'");

		if($this->db->affected_rows == 0)
		{
			return FALSE;
		}
		else {
			$hasil = $get->fetch_assoc();
			return $hasil["username"];
		}
	}
}
?>
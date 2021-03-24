<?php
	function connectPdo(){
		$dsn = "mysql:host=courses;dbname=z1875089";
		$username = 'z1875089';
		$password = '1998Oct05';
		$pdo = new PDO($dsn, $username, $password);
		return $pdo;
	}
?>

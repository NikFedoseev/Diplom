<?php 
	$serverName = "178021.simplecloud.ru";
	$username = "root";
	$password ="dan61187";
	try {
		$conn = new PDO("mysql:host=$serverName; dbname=articles", $username, $password);

		echo "connection succesfully";
	}
	catch (PDOException $e){
		echo "connection failed: " . $e->getMessage();
	}
?>
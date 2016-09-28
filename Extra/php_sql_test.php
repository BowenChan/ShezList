<?php

include("../dbconfig.php");
	try {
    	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    	//echo "Connected to $dbname at $host successfully.\n";
    	$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Sets PDO attr that control the error mode to throws exceptions
    	$pdo ->exec('SET NAMES "utf8"'); // Sets PDO object to use the UTF-8 encoding

    	return $pdo;
		
	} catch (PDOException $e) {
    	die("Could not connect to the database $dbname :" . $e->getMessage());
    	$output='Unable to connect to the database server.';
    	exit();
	}



?>
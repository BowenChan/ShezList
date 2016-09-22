<?php
	###### Connecting to Database ######

	$servername = "localhost";
	$username = "root";
	$password = "sesame";
	$db = "shezlist";

	/**
		PDO STYLE
	**/
	try{
		$pdo = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	}catch(PDOException $e) {
		print "Error!: " . $e->getMessage(). "<br/>";
		die();
	}
	/**
		MYSQLI STYLE
	**//*
	$dbc = mysqli_connect($severname,$username,$password,$db);
	$conn = new mysqli($servername,$username,$password,$db);
	if($conn ->connect_error) {
		die)"Connection Failed: " . $conn->connect_error);
	}*/
?>
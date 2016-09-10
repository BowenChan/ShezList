<?php
	include_once('dbconnect.php');

	require('populationMethod.php');
	//create the root user;
	$users = array(
			array("Email" => "root@gmail.com", "Number" => "111-111-1111", "Username" =>"root", "Password" => "root", "Hash" => hashPassword("root"))
		);

	//Creating the users
	for($iteration = 0; $iteration < 10; $iteration++){
		$password = createPassword();
		array_push($users, array("Email" => createEmail(), "Number" => createNumber(), "Username" =>createUsername(), "Password" => $password, "Hash" => hashPassword($password)));
	}

	//Prepared Statements
	$userStmt = $pdo->prepare("INSERT INTO `user` (email, phone_number) VALUES (:email, :phone_number)");
	$userAccStmt = $pdo->prepare("INSERT INTO `user_account` (user_id, username, password,hashPassword) VALUES (:user_id, :username, :password, :hashPassword)");
	$privStmt = $pdo-> prepare("INSERT INTO `user_access` (UA_user_id, UA_role_id) VALUES (:user_id, :role_id)");
	$selectStmt = $pdo->prepare('SELECT `user_id` FROM `user` WHERE email = :email');
	$role_id = 1;

	for($iteration = 0; $iteration < count($users); $iteration++){
		
		//Create the User
		$userStmt->bindParam(':email', $users[$iteration]['Email']);
		$userStmt->bindParam(':phone_number', $users[$iteration]['Number']);
		$userStmt->execute();

		//Grab the foreignKey for user_id
		$selectStmt->bindParam(':email', $users[$iteration]['Email']);
		$selectStmt->execute();
		$result = $selectStmt->fetch(PDO::FETCH_BOTH);
		$user_id = $result['user_id'];

		//Create the user Account
		$userAccStmt->bindParam(':user_id', $user_id);
		$userAccStmt->bindParam(':username', $users[$iteration]['Username']);
		$userAccStmt->bindParam(':password', $users[$iteration]['Password']);
		$userAccStmt->bindParam(':hashPassword', $users[$iteration]['Hash']);
		$userAccStmt->execute();

		//set the users privilge 
		if($iteration == 0){
			$role_id = 3;
		}
		else
			$role_id = 1;
		
		$privStmt->bindParam(':user_id', $user_id);
		$privStmt->bindParam(':role_id', $role_id);
		$privStmt->execute();
		echo "</br>";
	}
	/*
	echo $servername;
	
	$userStmt->bindParam(':email', $email);
	$userStmt->bindParam(':phone_number', $phone_number);
	print_r($userStmt);
	$email = "hello@gmail.com";
	$phone_number = "123-123-1234";
	$userStmt->execute();
	*/
	/**
		MYSQLI Version
	**/
	/*
	$stmt = $conn->prepare("INSERT INTO `user` ('email', 'phone_number', 'rating') VALUES (?,?,?)");
	$stmt->bind_param("ssi");
	*/

?>
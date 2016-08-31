<?php
	include_once('dbconnect.php');

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

	/**
		Hashing a Password taken from https://alias.io/2010/01/store-passwords-safely-with-php-and-mysql/
	**/
	function hashPassword($password){
		// A higher "cost" is more secure but consumes more processing power
		$cost = 10;

		// Create a random salt
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

		// Prefix information about the hash so PHP knows how to verify it later.
		// "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
		$salt = sprintf("$2a$%02d$", $cost) . $salt;

		// Value:
		// $2a$10$eImiTXuWVxfM37uY4JANjQ==

		// Hash the password with the salt
		$hash = crypt($password, $salt);

		return $hash;
	}

	function reHash($hash){

	}
	
	function randomGen($start, $end){
		$possible_character = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		$possible_character_length = strlen($possible_character);
		if($end === true)
			return $possible_character[rand($start, $possible_character_length -1)];
		else
			return $possible_character[rand($start, $end)];
	}

	function createUsername(){
		$username = "";
		$username_length = rand(5,8);
		for($i = 0; $i < $username_length; $i++){
			if($i == 0)
				$username .= randomGen(0,25);
			else
				$username .= randomGen(26,51);
		}
		return $username;
	}

	function createPassword(){
		$password = "";
		$password_length = 10;
		$randomSpecialCharacter = rand(0,$password_length - 1);
		for($i = 0; $i < $password_length; $i++){
			if($i == $randomSpecialCharacter)
				$password .= "!";
			else
				$password .= randomGen(0, true);
		}

		return $password;
	}
	function createNumber(){
		$number = "";
		for($i = 0; $i < 10; $i++){
			$number .= rand(0,9);
			if($i == 2 || $i == 5)
				$number .= "-";
		}
		return $number;
	}

	function createEmail(){
		
		$email_length = rand(5,10);
		$email = "";
		for($i = 0; $i< $email_length; $i++){
			if($i == 0)
				$email .= randomGen(0,25);
			else
				$email .= randomGen(26, true);
		}
		
		switch (rand(0,2)) {
			case 0:
				$email .= "@yahoo.com";
				break;
			
			case 1:
				$email .= "@gmail.com";

			case 2:
				$email .= "@hotmail.com";
			default:
				# code...
				break;
		}
		return $email;
	}
?>
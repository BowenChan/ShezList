<?php
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
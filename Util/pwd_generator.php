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

	
	function randomGen($start, $end){
		$possible_character = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		$possible_character_length = strlen($possible_character);
		if($end === true)
			return $possible_character[rand($start, $possible_character_length -1)];
		else
			return $possible_character[rand($start, $end)];
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

?>
<?php

function find_user($pdo, $username){
	try{
		/* Preventing SQL Injections by using prepared statement */
		//$sql = 'SELECT a.user_id, a.username, a.password as user_password, b.email as user_email FROM user_account a, user b WHERE b.email = :email';  // make it dynamic
		$sql = 'SELECT a.user_id, a.username as user_name, a.password as user_password FROM user_account a WHERE a.user_id = (SELECT user_id FROM user WHERE email = :email)';
		$resultset = $pdo->prepare($sql);
		$resultset->bindValue(':email', $username);
		//$resultset->bindValue(':password', $password);
		/*$sth->bindParam(1, $colour, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 12);*/
		$resultset->execute();
		return $resultset;

	} catch (PDOException $e){

		$error = "Database Query Error";
		$output='Catch: '. $e->getMessage();
			
		include 'login-error.html';
		exit(0);
		//include 'output.html.php';
			
	}

}

?>
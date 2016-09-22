<?php

function create_user($pdo, $userEmail, $temp_pwd, $hash_val){
	try{
		/* Preventing SQL Injections by using prepared statement */
		//$sql = 'SELECT a.user_id, a.username as user_name, a.password as user_password FROM user_account a WHERE a.user_id = (SELECT user_id FROM user WHERE email = :email)';
		$sql = 'INSERT INTO user(email) VALUES (:userEmail)';




		//$sql2 = 'SELECT user_id FROM user WHERE email = $userEmail';


		$resultset = $pdo->prepare($sql);
		$resultset->bindValue(':userEmail', $userEmail);
		//$resultset->bindValue(':password', $password);
		/*$sth->bindParam(1, $colour, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 12);*/
		$resultset->execute();
		
		$sql = 'SELECT user_id FROM user WHERE email = :userEmail';
		$r2 = $pdo->prepare($sql);
		$r2->bindValue(':userEmail', $userEmail);
		
		$r2->execute();

		$val = $r2->fetchColumn();
		//print("user_id= $val\n");
		echo("<br>").($val);

		//$sql = 'INSERT INTO user_account(user_id, password, hashPassword) VALUES (:userID, :temp_pwd, :hash_pwd)'; /*with hashpassword */
		
		$sql = 'INSERT INTO user_account(user_id, password) VALUES (:userID, :temp_pwd)';
		
		$r3 = $pdo->prepare($sql);
		$r3->bindValue(':userID', $val);
		$r3->bindValue(':temp_pwd', $temp_pwd);
		//$r3->bindValue(':hash_pwd', $hash_val);  /* Hash is too large for database */

		$r3->execute();
 	
 		//exit(0);
		//return $resultset;

	} catch (PDOException $e){

		$error_title = "Database Query";
		$error = "Did not query database, Check syntax";
		$output='Catch: '. $e->getMessage();
			
		include 'error_page.html';
		exit(0);
		//include 'output.html.php';
			
	}

}

?>
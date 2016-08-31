<?php 

	
include "../Util/make_connection.php";
include "../Util/query_user.php";
include "../Util/validateUserName.php";



$pdo = connect_to_db();


	if($_SERVER["REQUEST_METHOD"] == "POST"){

		//echo("got here");
		
			$username = $_POST['username'];
			$password = $_POST['userpassword'];

			$valid = validDateEmail($username);
			if($valid == 0){
				$error_title = 'Login';
				$error ='Invalid Email Address';
				$output ='Must use a "@sjsu.edu" domain name';
				include "login-error.html";
				exit(0);
			}
			/*$sql = 'SELECT user_account.username, user_account.user_id FROM user_account, user WHERE user.email = "'.$username.'"" AND user.account password = "'.$password.'"';
			*/
			/*try{*/
			/* Preventing SQL Injections by using prepared statement */
			//$sql = 'SELECT a.user_id, a.username, a.password as user_password, b.email as user_email FROM user_account a, user b WHERE b.email = :email';  // make it dynamic
			/*$sql = 'SELECT a.user_id, a.username as user_name, a.password as user_password FROM user_account a WHERE a.user_id = (SELECT user_id FROM user WHERE email = :email)';
			$resultset = $pdo->prepare($sql);
			$resultset->bindValue(':email', $username);
			$resultset->execute();*/
			//$resultset->bindValue(':password', $password);
			/*$sth->bindParam(1, $colour, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 12);*/
			
			/*$resultset = $pdo->query($sql);
*/			
			$resultset = find_user($pdo, $username);

			/* Checks if the result consist of one row */
			if($resultset->rowcount() == 1){
				$userInfo = getRow($resultset);
				$confirmPW = checkUserPW($userInfo, $password);
				
				if($confirmPW){
					//include 'index.html';
					//include("../homepage.html");
					header("location: ../homepage.html"); 
				}else{
					$error_title = '';
					$error="Password is incorrect";
					$output='Please type the correct password ';
					include 'login-error.html';
				}
				

				/*$user;
				$pwd;
				while ($row = $resultset->fetch())
				{
					$user = $row['user_email'];
					$pwd = $row['user_password'];
					
				}	
*/
				//echo($user);
				//echo($pwd);

					/*if($user == $username && $pwd == $password){
						include 'index.html';
					}else{*/
					/* wrong password */
					/*echo('wrong password');
					}*/

					//include 'index.html';
					//include 'test.html.php';
			}else{
				$error="Error";
				$output='No such user account found in Database';
				include 'login-error.html';
				
				
			}

		/*} catch (PDOException $e){
			$error = "Database Query Error";
			$output='Catch: '. $e->getMessage();
				
			include 'login-error.html';
			
			//include 'output.html.php';
			
		}*/
	}

/*	if($_SERVER["REQUEST_METHOD"] == "POST") {

		echo("<br><br>username: ".$_POST['username']."<br>");
		echo("password: " .$_POST['userpassword']);



	}*/

 


		//echo(mysqli_real_escape_string($dbname, $_POST['username']));
		//echo(mysqli_real_escape_string($dbname, $_POST['userpassword']));
		
		//$username = mysqli_real_escape_string($db,$_POST['username']);
		//echo($username);
		//$sql = "SELECT username FROM accounts WHERE username = '$username'";
		//$q = $conn->query($sql);
	    //$q->setFetchMode(PDO::FETCH_ASSOC);
	    //$cols = $q->columnCount();
		//echo($cols);
	//$output = 'Database connection established';
	//include 'output.html.php';

	$pdo = null; //Disconnects from the database server

function getRow($rs){
	
	while ($row = $rs->fetch())
		{
			$user = $row['user_name'];
			$pass = $row['user_password'];				
		}

		$array = array($user, $pass);
	return $array;
	


}

/*function checkUsername($username){


	if($user == $username){
		echo'true';
		return true;
	}


	return (int)false;

}*/

function checkUserPW($array, $userpassword){

	$userPass = 1;

	$pass = $array[$userPass];
	if($userpassword == $pass){
		return true;
	}
	
	return (int)false;
}


?>
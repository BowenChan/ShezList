<?php 

	include("dbconfig.php");

	try {
    	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    	//echo "Connected to $dbname at $host successfully.\n";
    	$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Sets PDO attr that control the error mode to throws exceptions
    	$pdo ->exec('SET NAMES "utf8"'); // Sets PDO object to use the UTF-8 encoding

    	
		
	} catch (PDOException $e) {
    	die("Could not connect to the database $dbname :" . $e->getMessage());
    	$output='Unable to connect to the database server.';
    	exit();
	}



	if($_SERVER["REQUEST_METHOD"] == "POST"){

		//echo("got here");
		
			$username = $_POST['username'];
			$password = $_POST['userpassword'];
			/*$sql = 'SELECT user_account.username, user_account.user_id FROM user_account, user WHERE user.email = "'.$username.'"" AND user.account password = "'.$password.'"';
			*/
			try{
			/* Preventing SQL Injections by using prepared statement */
			$sql = 'SELECT a.username, a.password as user_password, b.email as user_email FROM user_account a, user b WHERE b.email = :email AND a.password = :password';  // make it dynamic
			$resultset = $pdo->prepare($sql);
			$resultset->bindValue(':email', $username);
			$resultset->bindValue(':password', $password);
			/*$sth->bindParam(1, $colour, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 12);*/
			$resultset->execute();
			/*$resultset = $pdo->query($sql);
*/
 			
			
			if($resultset->rowcount() == 1){
				//echo "got here";

				$user;
				$pwd;
				while ($row = $resultset->fetch())
				{
					$user = $row['user_email'];
					$pwd = $row['user_password'];
					
				}	

				//echo($user);
				//echo($pwd);

					if($user == $username && $pwd == $password){
						include 'index.html';
					}else{
					/* wrong password */
					echo('wrong password');
					}

					//include 'index.html';
					//include 'test.html.php';
				}else{
					echo "result is empty";
					echo "WRONG username or password given";
			}

		} catch (PDOException $e){
			$output='Error, did not query database'. $e->getMessage();
			include 'output.html.php';
		}
	}

/*
	$STH = $DBH->prepare("SELECT News.ID, LEFT(NewsText,650), Title, AID, Date, imgID," .
            "DATE_FORMAT(Date, '%d.%m.%Y.') as formated_date " .
            "FROM News, Categories, NewsCheck  WHERE Name LIKE '%News - Block%' AND CID=Categories.ID AND JID=News.ID ". 
            "ORDER BY `Date` DESC LIMIT :offset, :rowsPerPage;");

$STH->bindParam(':offset', $offset, PDO::PARAM_STR);
$STH->bindParam(':rowsPerPage', $rowsPerPage, PDO::PARAM_STR);

$STH->execute();
*/




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
	$output = 'Database connection established';
	include 'output.html.php';

	$pdo = null; //Disconnects from the database server

 ?>
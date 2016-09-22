<?php
  
 //   include "dbconfig.php";
    include "../Util/validateUserName.php";
    include "../Util/make_connection.php";
    include "../Util/query_user.php";
    include "../Util/sendVerification.php";
       
/*  try {
      $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
      //echo "Connected to $dbname at $host successfully.\n";
      $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Sets PDO attr that control the error mode to throws exceptions
      $pdo ->exec('SET NAMES "utf8"'); // Sets PDO object to use the UTF-8 encoding

      
    
  } catch (PDOException $e) {
      die("Could not connect to the database $dbname :" . $e->getMessage());
      $output='Unable to connect to the database server.';
      exit();
  }*/

  

  if($_SERVER["REQUEST_METHOD"] == "POST"){


  $userEmail = $_POST['enteredEmail'];
  //echo($userEmail);
  $valid = validDateEmail($userEmail);
 

    if($valid){
 
        $pdo = connect_to_db();
        $resultset = find_user($pdo, $userEmail);
        
        if($resultset->rowcount() == 1){
          $error_title = 'Account';
          $error = "Username Already Exist!!";
          $output = 'The username you type already exists in the our Database, If you have lost your password, please click on the "forgotten Password" to obtain a temporary password.';
          include "../Login/login-error.html";
          exit(0);


        }else{

          sendEmail($userEmail);

        }
        
        

    }else{
      $error_title = 'Registration';
      $error ='Attention!!!';
      $output ='You must use a "@sjsu.edu" to register an account';
      //header('location: login-error.html');
      include "../Login/login-error.html";
      exit(0);
    }

  }



?>

<!DOCTYPE html>
<html>
<head>  
  <title></title>
</head>
<body>
  <h> Thank you for all your information </h>
</body>
</html>
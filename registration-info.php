<?php
  
 //   include "dbconfig.php";
    include "validateUserName.php";
    include "make_connection.php";
    include "query_user.php";
    include 'sendVerification.php';
       
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
          $error = "Username Already Exist!!";
          $output = 'The username you type already exists in the our Database, If you have lost your password, please click on the "forgotten Password" to obtain a temporary password.';
          include "login-error.html";
          exit(0);


        }else{

          $temp = "abc";
          sendEmail($temp);

        }
        
        

    }else{
      $error ='Attention!!!';
      $output ='You must use a "@sjsu.edu" to register an account';
      //header('location: login-error.html');
      include "login-error.html";
      exit(0);
    }

  }



?>
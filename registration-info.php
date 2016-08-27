<?php
  
    include "dbconfig.php";
    include "validateUserName.php";

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


  $userEmail = $_POST['enteredEmail'];
  //echo($userEmail);
  $valid = validDateEmail($userEmail);

    if($valid){
        echo'true';



    }else{
      echo' NO! Please enter a valid @sjsu.edu account';
      header('location: login-error.html');
      //exit(0);
    }

  }



?>
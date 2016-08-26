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


  $userEmail = $_POST['enteredEmail'];
  //echo($userEmail);
  $valid = validDateEmail($userEmail);

  }


 
  function validDateEmail($email){

  $mail_box = 0;
  $domain_part = 1;
  $email_confirm = 'sjsu.edu';

  $domain = explode("@", $email);
    
  if(sizeof($domain) > 1 ){
    //echo"<br> two parts";
    $valid = $domain[$domain_part];
    if($valid == $email_confirm){
      //include 'login.html.php';
      return true;

    }else{
      echo"<br> invalid email address";
      include 'register.html';
    }

    

  }else{
    echo"<br> invalid email address";
    include 'register.html';
  }
  
    /*echo('got here');
  */
  

  //echo('<br>').($domain[$domain_name]);


}






?>
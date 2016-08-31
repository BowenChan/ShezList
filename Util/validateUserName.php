
<?php

function validDateEmail($email){

  $mail_box = 0; //Name of email 
  $domain_part = 1; //Domain address of email
  $email_confirm = 'sjsu.edu';

  $domain = explode("@", $email);  //Splits domain name from domain address
    
  if(sizeof($domain) > 1 ){         //checks if domain user used '@' in email address
    //echo"<br> two parts";
    $valid = $domain[$domain_part];  
    if($valid == $email_confirm){   //checks if user used 'sjsu.edu'
      //include 'login.html.php';
      return true;

    }else{
      //echo"<br> invalid email address";
      //include 'register.html';
        return (int)false;
    }

  }else{
    //echo"<br> invalid email address";
    //include 'register.html';
    return (int)false;
  }
  
    /*echo('got here');
  */
  

  //echo('<br>').($domain[$domain_name]);


}


?>
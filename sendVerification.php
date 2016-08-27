<?php
if(require_once 'PHPMailer/PHPMailerAutoload.php'){
	echo'successful';
}else{
	echo'not succesful';
}
	
  $m = new PHPMailer;

  $m->isSMTP(); //tells object that you want to use a SMTP
  $m->SMTPAuth = true;  //Sets property to true
  /* IMPORTANT Remove 'SMTPDebug' line below when in production, ONLY testing purposes */
  //$m->SMTPDebug = 2; //2 give back errors and messages, 1 is for errors 
  $m->Host = 'smtp.gmail.com';
  $m->Username = 'shezlistco@gmail.com';
  $m->Password = 'weRspar10';
  $m->SMTPSecure = 'ssl'; //using ssl secure 
  $m->Port = 465; //port necessar for smtp.gmail.com

  $m->From ='shezlistco@gmail.com';  //Email address that is being sent from
  $m->FromName ='ShezList Co';  //name of who
  $m->addReplyTo('shezlist@gmail.com', 'ShezList Customer Services'); //for them to reply back to
  
  $m->addAddress('stuf4sel@gmail.com', 'stuff sale');  //Add addres to send to people
  //$m->addCC('email@gmail.com', 'name');  // a copy
  //$m->addBCC('email@gmail.com', 'name'); //Blind copy
  //$m->addAttachment('Images/ShezList_Logo_3bg.png');
  //$m->AddEmbeddedImage('Images/ShezList_Logo_3bg.png', 'shezlist');  //Embeds image in the email 
  $m->Subject = 'Here is an email'; 
  $m->Body = 'This is the body of an email';

  //$m->Body = 'This is the body of an email <img src="cid:shezlist"> ';

  $m->AltBody = 'This is the body of an email';

  if($m->send()){
  	echo'<br>Email Sent';
  }else{
  	echo $m->ErrorInfo;
  }

?>
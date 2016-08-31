<?php

function sendEmail($email){
	if(require_once '../PHPMailer/PHPMailerAutoload.php'){
		echo'successful';
	}else{
		echo'not succesful';
	}
	
function createTempPW(){

		return 'abc';

}

	  $pw = createTempPW();	

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
	  
	  $m->addAddress($email, 'guest');  //Add addres to send to people
	  //$m->addCC('email@gmail.com', 'name');  // a copy
	  //$m->addBCC('email@gmail.com', 'name'); //Blind copy
	  //$m->addAttachment('Images/ShezList_Logo_3bg.png');
	  $m->Subject = 'Email Confirmation'; 
	 // $m->AddEmbeddedImage('../Images/ShezList_Logo_BGwhite.png', 'shezlist');  //Embeds image in the email 
	  $m->Body = '<img src="https://s21.postimg.io/ihpwrvit3/Shez_List_Logo_No_BG.png"><h1>Welcome!!</h1><p>Please use our temporary password to login to our account account!!!</p><h3>Temporary pw: '.$pw .'<h3></p> <br> <a href="http://localhost:8080/shezlist_project/shezlist/index.html">Shezlist.com</a>';
	
	  //$m->Body = 'This is the body of an email <img src="cid:shezlist"> ';

	  $m->AltBody = 'This is the body of an email';

	  if($m->send()){
	  	echo'<br>Email Sent';
	  }else{
	  	echo $m->ErrorInfo;
	  }
}
?>
<?php




if($_SERVER["REQUEST_METHOD"]){

//	echo"Something has been entered";
//	exit(0);




	$var = $_POST['checkbox'];
	echo($var);

	$error_title = "Thank You";
	$error = "We have receieved your post.";
	$output = "Give us a moment to put your post onto classifieds";
	include'../Util/success_page.html';
	

}else{

	echo"Did not fill required fields";
	$error_title = "Nothing filled output";
	$error = "Please fill required field boxes";
	$output = "Error";

	include'../Util/success_page.html';
	exit(0);
}

?>
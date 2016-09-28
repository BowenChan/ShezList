<?php

	if($_SERVER['REQUEST_METHOD']){

		if($_POST['title']){


		}else{

			$error ="Post to classified error";
			$error_title = "Incomplete";
			$output = "Please complete the required post fields";
			$redirect = "../post.html";
			include'../Util/error_page.html';
	

		}

	}else{



	}
	
	



?>
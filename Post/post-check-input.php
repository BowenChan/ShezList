<?php

	if($_SERVER['REQUEST_METHOD']){

		
		if($_POST['title']){
			$title = $_POST['title'];
			$isbn = $_POST['isbn'];
			$description = $_POST['description'];
			$booktype = $_POST['booktype'];
			$condition = $_POST['condition'];

			include"post-confirm.php";
			exit(0);
			
		}else{

			$error ="Post to classified error";
			$error_title = "Incomplete";
			$output = "Please complete the required post fields";
			$redirect = "../post.html";
			include'../Util/error_page.html';

		}

			echo($title)."<br>".($isbn)."<br>".($description)."<br>".($booktype)."<br>".($condition);

		}else{

			$error ="Post to classified error";
			$error_title = "Incomplete";
			$output = "Please complete the required post fields";
			$redirect = "../post.html";
			include'../Util/error_page.html';
	

		}

	



?>
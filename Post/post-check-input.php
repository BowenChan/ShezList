<?php

	if($_SERVER['REQUEST_METHOD']){



	}else{

		$error ="Post to classified error";
		$error_title = "Incomplete";
		$output = "Please complete the required post fields"
		include('/Util/error_page.html');
	}



?>
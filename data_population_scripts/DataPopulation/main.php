<!DOCTYPE html>
<html>
	<?php require('dbconnect.php') ?>
<head>
	<title></title>
</head>
<body>

	<h> RUNNING POPULATION OF USERS </h>
	<?php include_once('users.php') ?>

	<h> FINISHED POPULATING USERS </h>

	<br><br>

	<h> POPULATING POST </h>
	<?php include_once('post.php') ?>
</body>
</html>
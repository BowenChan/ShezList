

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="author" content="Lynn Longboy" description="">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">  <!-- tells internet explore to use the latest rendering engine -->
	<meta name="viewport" content="width = device-width, initial scale = 1"> <!-- Sets the page width size for the device and set the zoom level = 1 -->
 	
	<!-- <script type='text/javascript' src='jquery-3.1.0.js'></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		
<!-- link the cdn files from getbootstrap.com -->
		
		<!-- Latest compiled and minified CSS -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> Using the CDN (content delivery network) -->

		<link rel="stylesheet" href="css/bootstrap.min.css"> <!-- external file Locally -->
		
		
		<!-- Optional theme -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"> (content delivery network)-->
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">  <!-- external file Locally -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<!-- <link rel="stylesheet" type="text/css" href="style.css" />
 -->
	<title>Login Page</title>


</head>
<body style="background-color:white"> <!-- #2E2D55 -->

<!-- inserted code -->



	<div class="container">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand">ShezList</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">Post</a></li>
                <li><a href="#">FAQ</a></li>
                <li class="dropdown">
                  <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Contact Us <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Phone</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Email</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Messenger</a></li> -->
                  </ul>
                </li>
              </ul>

              <!-- area to search, can change to however you want to make it easier for database handling -->
              <!-- <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">&#128269</button>
              </form>
 -->
              <!-- change this to User Profile/Log out button if user is already logged in -->
              <!-- <ul class="nav navbar-nav navbar-right">
                <li><a href="register.html.php">Register</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="login.html.php">Log In</a></li>
              </ul>
               -->
            </div>
          </div>
        </nav>
      



<!-- your code below -->





 			<div class="container">
<!-- <div class="container bg-danger"> -->
			
					<!-- <div class="row"> -->
					
						<!-- <div class="col-lg-6 col-md-6 col-xs-6 col-xs-push-3 bg-info"> -->
							
						 	
						<div class="jumbotron col-lg-12 col-md-12 col-xs-12 col-lg-push-2" style="background-color:white; color:white">
							
							<!-- <h2 style="color:white"> Login </h2> -->
							<div class="container ">
								<img src="Images/ShezList_Logo_BGwhite.png"  class="img-responsive img-rounded"><br>
								<form id="Login" action="login-info.php" method="post">
									<div class="row"> 
										<div class="form-group col-lg-4 col-md-6 col-xs-10 col-lg-push-1">
											<input type="email" id="email" class="form-control form-control-custom" name="username" placeholder="email">
										</div>
									</div>
							<!-- <h2> Password </h2> -->
							
									<div class="row">
										<div class="col-lg-4 col-md-6 col-xs-10 col-lg-push-1">
											<input type="password" id="password" class="form-control form-control-custom" name="userpassword" placeholder="password">
										</div>
									</div>

									<br>

									<div class="row">
										<div class="col-lg-2 col-md-3 col-xs-3 col-lg-push-1">
											<input class="btn btn-primary" type="submit" value="Login">
										</div>
								</form>
								
									<!-- 	<div class="col-lg-2 col-md-3 col-xs-3 col-lg-push-2">
											<input class="btn btn-info"  value="Register">
										</div>
									 --></div>
								
								
									<br>

									<div class="row">		
										<div class="col-lg-12 col-xs-12 col-lg-push-1">
											<A href="register.html">Register Account</a> <font color="black"> | </font> <A href="">Forgot Password</a> <font color="black">| </font> <A href="">Contact Us</a>
										</div>	
								
							</div>
						</div>
							
					<!-- 	</div> -->
					
<!-- 					
					</div>
	</div>
 -->

	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" scr="jquery-3.1.0.min.js"></script>   <!-- jquery used locally -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  can be used only on the internet -->
	<script src="bootstrap/js/bootstrap.min.js"</script>  <!-- using bootstrap online CDN (content delivery network) -->
</body>
</html>


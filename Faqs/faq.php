<?php
  $db = mysqli_connect('localhost', 'root', '', 'shezlist')
     or die('Error connecting to MySQL server.');
  //if (!$db) {
  //  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  //  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  //  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  //  exit;
  //}

  //echo "Success: Connected to Database." . PHP_EOL;
  //echo "Host information: " . mysqli_get_host_info($db) . PHP_EOL;
?>


<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>ShezList - FAQS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/faq.js"></script>
    <script type="text/javascript" src="../js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="../js/currency-autocomplete.js"></script>
  </head>

  <body>
    <!-- Navigation Bar for website -->
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
                <li><a href="../index.html">Home</a></li>
                <li><a href="../post.html">Post</a></li>
                <li><a href="../Faqs/faq.php">FAQ</a></li>
                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Contact Us <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Phone</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Email</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Messenger</a></li>
                  </ul>
                </li>
              </ul>

              <!-- area to search -->
              <form class="navbar-form navbar-right" role="search" id="autocomplete">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">&#128269</button>
              </form>

              <!-- change this to User Profile/Log out button if user is already logged in -->
              <ul class="nav navbar-nav navbar-right">
                <li><a href="../Registration/register.html">Register</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="../Login/login.html.php">Log In</a></li>
              </ul>
              
            </div>
          </div>
        </nav>

        <!-- Side bar -->

        <div class="jumbotron">
            <div class="container-fluid">
                <h1><i>ShezList</i></h1>

                <p>Where you can sell all your things.</p>
                
                <!--This is the main body for the list of frequently asked questions -->
                <div id="page-wrap">
                    <div class="container">
                      <h2>Frequently Asked Questions</h2>
                      <button type="submit" class="btn btn-primary" >ADD FAQ </button>

                        <dl class="faq">
                          <dt>
                            <?php
                              //Grabbing faq question 1 from database
                              $q1_query = "SELECT Q1 FROM faqs_questions";
                              mysqli_query($db, $q1_query) or die('Error querying database.');
                              $result = mysqli_query($db, $q1_query);
                              $row = mysqli_fetch_row($result);
                              echo $row[0];
                            ?>
                          </dt>
                          <dd class="answer"><div>
                            <?php
                              //Grabbing faq answer 1 from database
                              $a1_query = "SELECT A1 FROM faqs_answers";
                              mysqli_query($db, $a1_query) or die('Error querying database.');
                              $result = mysqli_query($db, $a1_query);
                              $row = mysqli_fetch_row($result);
                              echo $row[0];
                            ?>
                          </div></dd>
                        </dl>
                        
                        <dl class="faq">
                          <dt>
                            <?php
                              //Grabbing faq question 2 from database
                              $q2_query = "SELECT Q2 FROM faqs_questions";
                              mysqli_query($db, $q2_query) or die('Error querying database.');
                              $result = mysqli_query($db, $q2_query);
                              $row = mysqli_fetch_row($result);
                              echo $row[0];
                            ?>
                          </dt>
                          <dd class="answer"><div>
                            <?php
                              //Grabbing faq answer 2 from database
                              $a2_query = "SELECT A2 FROM faqs_answers";
                              mysqli_query($db, $a2_query) or die('Error querying database.');
                              $result = mysqli_query($db, $a2_query);
                              $row = mysqli_fetch_row($result);
                              echo $row[0];
                            ?>
                          <div></dd>
                        </dl>
                        
                        <dl class="faq">
                          <dt>
                            <?php
                              //Grabbing faq question 3 from database
                              $q3_query = "SELECT Q3 FROM faqs_questions";
                              mysqli_query($db, $q3_query) or die('Error querying database.');
                              $result = mysqli_query($db, $q3_query);
                              $row = mysqli_fetch_row($result);
                              echo $row[0];
                            ?>
                          </dt>
                          <dd class="answer"><div>
                            <?php
                              //Grabbing faq answer 3 from database
                              $a3_query = "SELECT A3 FROM faqs_answers";
                              mysqli_query($db, $a3_query) or die('Error querying database.');
                              $result = mysqli_query($db, $a3_query);
                              $row = mysqli_fetch_row($result);
                              echo $row[0];
                              //Closing database connection
                              mysqli_close($db);
                            ?>
                          </div></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

    </div>

  </body>
</html>







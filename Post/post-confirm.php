<!DOCTYPE html>
<html lang="en">
<head>
    <title>ShezList Post Confirm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
         
        <!-- Side bar (Will update if there is an already an example of a side bar with bootstrap. Don't wanna put too much effort into a rough draft-->

        <!--This is the main body the login form-->
      
          <div class="jumbotron col-lg-12">
            <div class="row">
              <div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2">
              <img src="../images/ShezList_Logo_BGwhite.png"  class="img-responsive img-rounded"><br>
              </div>
            </div>
          <div class="row">

          </div>
              <div class="row" >

                  <div class="col-lg-4">
                    <!-- <legend><h2 style="color:black"><?php echo$error_title; ?></h2></legend> -->
                    <legend><h2 style="color:black"><u> Please Review Info</u> </h2></legend>
                  </div>
              </div>       
          
                    <div class="row">
                      <h3><label for="title" class="col-lg-3 control-label">Title:</label></h3>
                      <p><?php echo$title; ?></p>
                    </div>
                    <div class="row">
                      <h3><label for="isbn" class="col-lg-3 control-label">Book ISBN:</label></h3>
                      <p> <?php echo$isbn; ?></p>      
                    </div>
                    <div class="row">
                      <h3><label for="isbn" class="col-lg-3 control-label">Book Type:</label></h3>  
                      <p> <?php echo$booktype; ?> </p>
                    </div>
                    <div class="row">
                      <h3><label for="isbn" class="col-lg-3 control-label">Condition:</label></h3><p> <?php echo$condition; ?> </p>
                    </div>
                     <div class="row">
                      <h3><label for="isbn" class="col-lg-3 control-label">Description:</label></h3>
                      <p> <?php echo$description; ?></p>
                    </div>
                
                

<!--  --><!-- 
                <div class="col-lg-12 col-lg-push-1">
                  <h4> <?php echo$error; ?> </h4>
                  <?php echo$output; ?> 
                </div>
              </div> -->
                <div class="row">
                    <div class="col-lg-12 col-lg-offset-1 top-buffer">
                      <a class="btn btn-success col-lg-2" onclick="successPage();"> Confirm </a>
                      <a class="btn btn-warning col-lg-2 col-lg-push-1" onclick="successPage();"> Edit </a>
                      
                    </div>
                    <script type="text/javascript">
                      function successPage(){
                        var url = "<?php echo$redirect; ?>";
                        window.location = url;
                      }
                    </script>
                </div>



                <!-- <button class="btn btn-danger onclick="window.location.href='/register.html'">Continue</button> -->
            
         </div>
      </div>
        
    

</body>
</html>







<?php 
include "connection.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Doctor Registration Form | HMS </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Hospital Management System</h1>
</div>


<body class="login" style="margin-top: -20px;">



    <div class="login_wrapper">

            <section class="login_content" style="margin-top: -40px;">
                <form name="form1" action="registration.php" method="post">
                    <h2>Doctor Registration Form</h2><br>

                    <div>
                        <input type="text" class="form-control" placeholder="Name" name="name" required=""/>
                    </div>
                    

                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="username" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Fees" name="fees" required=""/>
                    </div>
                    <div>
                        <input type="text" class="form-control" placeholder="Specialization" name="specialization" required=""/>
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="email" name="email" required=""/>
                    </div>
                    
                    
                    <div class="col-lg-12  col-lg-push-3">
                        <input class="btn btn-default submit " type="submit" name="submit11" value="Register">
                    </div>

                </form>
            </section>
          <?php
          // $DB = mysqli_connect("localhost","root","","lms");
    if(isset($_POST["submit11"]))
        {  
            // session_start();
            
        
            mysqli_query($DB,"insert into doctor values('','$_POST[name]','$_POST[username]','$_POST[password]','$_POST[fees]','$_POST[specialization]','$_POST[email]','0')");
?>
 <div class="alert alert-success col-lg-12 col-lg-push-0">
         Registration successfull
     </div>
             <?php
        }        

    ?>
    </div>

    




</body>
</html>

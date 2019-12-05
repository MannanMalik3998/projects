<?php 
session_start();
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

    <title>Login| HMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">Hospital Management System</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h1>Doctor Login Form</h1>

            <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="submit11" value="Login">
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">New to site?
                    <a href="registration.php"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>
</div>


<?php
    if(isset($_POST["submit11"]))
        { 
            $count=0;
            $res=mysqli_query($DB,"select * from doctor where username = '$_POST[username]' && password = '$_POST[password]' && status ='1'");
            $count = mysqli_num_rows($res);
            
            if($count==0){
                 ?>
                <div class="alert alert-danger col-lg-6 col-lg-push-3">
    <strong style="color:white">Invalid</strong> Username Or Password.
</div>
            <?php
            }

            else{
                $_SESSION["doctor"]=$_POST["username"];
                ?>
                <script type="text/javascript">
                    window.location = "doctorissuedpatient.php";
                </script>
                <?php
        }    
            }
?>


</body>
</html>

<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"cn");
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" name="form1" action="user_signup.php" method="post">
  	<p><input type="text" placeholder="Name" required name="name"></p>
    <p><input type="text" placeholder="UserName" required name="username"></p>
    <p><input type="password" placeholder="Password" required name="pwd"></p>
    <p><input type="submit" name="submit1" value="signup"></p>
  </form>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    
	<?php
	if(isset($_POST["submit1"]))
	{
	
	
	$res=mysqli_query($link,"insert into user values('','$_POST[name]','$_POST[username]','$_POST[pwd]')");
	?>
	<script type="text/javascript">
	window.location="shop.php";
	</script>
	<?php	
	
	
	
	}
	
	?>
    
    
    
  </body>
</html>

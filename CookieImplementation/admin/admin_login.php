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

  <form class="login-container" name="form1" action="" method="post">
    <p><input type="text" placeholder="Email" required name="username"></p>
    <p><input type="password" placeholder="Password" required name="pwd"></p>
    <p><input type="submit" name="submit1" value="Log in"></p>
  </form>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    
	<?php
	if(isset($_POST["submit1"]))
	{
	
	
	$res=mysqli_query($link,"select * from admin where username='$_POST[username]' && password='$_POST[pwd]'");
	while($row=mysqli_fetch_array($res))
	{
	$_SESSION["admin"]=$row["username"];
	?>
	<script type="text/javascript">
	window.location="add_product.php";
	</script>
	<?php	
	}
	
	
	
	
	}
	
	?>
    
    
    
  </body>
</html>

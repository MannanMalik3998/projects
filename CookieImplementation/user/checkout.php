<?php
session_start();
$userId = $_SESSION['user'];
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "cn");
include "header.php";
?>


	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Enter Details</h2>
			</div>
			<!--/checkout-options-->

			

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">

					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form name="form1" action="" method="post" >
									<?php 

									$res = mysqli_query($link, "select * from user where id = $userId");
									 while($row=mysqli_fetch_array($res))
            						{
            							?><input type="text" placeholder="Name" name="firstname" value="<?php echo $row["name"]; ?>" style="width:350px; background-color: #e5ebef"><?php
            							?><input type="text" placeholder="UserName" name="lastname" value="<?php echo $row["username"]; ?>"  style="width:350px; background-color: #e5ebef"><?php

            							?><input type="text" placeholder="Email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="please enter valid email address" style="width:350px; background-color: #e5ebef">
									<input type="text" placeholder="Resi. Address" name="resi" required style="width:350px; background-color: #e5ebef">
									<input type="text" placeholder="City" name="city" required pattern="[A-Za-z]+" title="please enter valid city name[a-z only]" style="width:350px; background-color: #e5ebef">
									<input type="text" placeholder="Pincode" name="pincode" required pattern="[0-9]{6}" title="please enter valid pincode[0-9 and 6 digit only]" style="width:350px; background-color: #e5ebef">
									<input type="text" placeholder="Contact Number" name="cno" required pattern="[0-9]{10}" title="please enter valid contacet number[0-9 and 10 digit only]" style="width:350px; background-color: #e5ebef">
									<input type="submit" name="submit1" value="save" style="background-color:#843534; color:white; font-weight:bold"><?php
									}
									
									
									
?>
								</form>
							</div>

						</div>
					</div>

				</div>
			</div>


			<?php
			if(isset($_POST["submit1"]))
			{
				$link=mysqli_connect("localhost","root","");
				mysqli_select_db($link,"cn");
				mysqli_query($link,"insert into checkout_address values('','$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[resi]','$_POST[city]','$_POST[pincode]','$_POST[cno]')");
				// mysqli_query($link,"insert into confirm_order_address values('','$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[resi]','$_POST[city]','$_POST[pincode]','$_POST[cno]')");
	
				?>
			<script type="text/javascript">

					window.location="pay.php";


			</script>
			<?php


			}


			?>


		</div>
	</section> <!--/#cart_items-->

	
<?php
include "footer.php";
?>
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php
session_start();
if($_SESSION["admin"]=="")
{
?>
<script type="text/javascript">
window.location="admin_login.php";
</script>
<?php
}
include "header.php";
?>
<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"cn");
?>
      
        <div class="grid_10">
            <div class="box round first">
                <h2>
                   Add Product</h2>
                <div class="block">
                    
					<form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
					<tr>
					<td>Cat Name</td>
					<td><input type="text" name="pnm" placeholder="Oggy"></td>
					</tr>
					<tr>
					<td>Cat Price</td>
					<td><input type="text" name="pprice" placeholder="50$" ></td>
					</tr>
					<tr>
					<td>Product Image</td>
					<td><input type="file" name="pimage"></td>
					</tr>
					<tr>
					<td>Cat Breed</td>
					<td><input type="text" name="pcategory" value="Persian etc"></td>
					</tr>
					<tr>
					<td>Product Description</td>
					<td>
					<textarea cols="15" rows="10" name="pdesc">This is a playful cat</textarea>
			        </td>
					</tr>
					<tr>
					<td colspan="2" ><input type="submit" name="submit1" value="upload"></td>
				</tr>
					
					
					</table>
					
					
					</form>

<?php
if(isset($_POST["submit1"]))
{
   $v1=rand(1111,9999);
   $v2=rand(1111,9999);
   
   $v3=$v1.$v2;
   
   $v3=md5($v3);
   
   
   $fnm=$_FILES["pimage"]["name"];
   $dst="./product_image/".$v3.$fnm;
   $dst1="product_image/".$v3.$fnm;
   move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);


mysqli_query($link,"insert into product values('','$_POST[pnm]',$_POST[pprice],1,'$dst1','$_POST[pcategory]','$_POST[pdesc]','0')");


}

?>					
					
					
                </div>
            </div>
<?php
include "footer.php";  
  
?>         
     
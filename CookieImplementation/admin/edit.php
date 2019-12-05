<?php
include "header.php";
include "menu.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"cn");
$id = $_GET["id"]; 

 $res = mysqli_query($link, "select * from product where id=$id");
    while ($row = mysqli_fetch_array($res)) {
        $name=$row["product_name"];
        $price=$row["product_price"];
        $breed=$row["product_category"];
        $desc=$row["pproduct_desc"];
        $img = $row["product_image"];

    }

?>
      
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Edit Details</h2>
                <div class="block">
                    <form name="form1" action="" method="post" enctype="multipart/form-data">
					<table border="1">
						<tr>
							<td colspan="2" align="center">
								<img src="<?php echo "$img"; ?>" height="100" width ="100">
							</td>
						</tr>
					<tr>
					<td>Product Name</td>
					<td><input type="text" name="pnm" value="<?php echo "$name" ?>"></td>
					</tr>
					<tr>
					<td>Product Price</td>
					<td><input type="text" name="pprice" value="<?php echo "$price" ?>"></td>
					</tr>
					<!-- <tr>
					<td>Product Quantity</td>
					<td><input type="text" name="pqty" value=""></td>
					</tr> -->
					<!-- <tr>
					<td>Product Image</td>
					<td><input type="file" name="pimage"></td>
					</tr> -->
					<tr>
					<td>Product Categoty</td>
					<td>
						<input type="text" name="Breed"  value="<?php echo "$breed" ?>">
					</td>
					</tr>
					<tr>
					<td>Product Description</td>
					<td>
					<textarea cols="15" rows="10" name="pdesc"><?php echo "$desc" ?></textarea>
			        </td>
					</tr>
					<tr>
					<td colspan="2" align="center"><input type="submit" name="submit1" value="upload"></td>
				</tr>
					
					
					</table>
					
					
					</form>

					
                </div>
            </div>

            <?php
            if(isset($_POST["submit1"])){
            	// $fnm=$_Files["pimage"]["name"]; //here

            	// if($fnm=""){
            		mysqli_query($link, "update product set product_name = '$_POST[pnm]', product_price='$_POST[pprice]', product_category='$_POST[Breed]', pproduct_desc='$_POST[pdesc]' where id=$id");
            	// }
        //     	else{

        //     		   $v1=rand(1111,9999);
					   // $v2=rand(1111,9999);
					   
					   // $v3=$v1.$v2;
					   
					   // $v3=md5($v3);
					   
					   
					   // $fnm=$_FILES["pimage"]["name"];
					   // $dst="./product_image/".$v3.$fnm;
					   // $dst1="product_image/".$v3.$fnm;
					   // move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);

					   // //in image

        //     		mysqli_query($link, "update product set product_image = '$dst1', product_name = '$_POST[pnm]', product_price='$_POST[pprice]', product_category='$_POST[pcategory]', pproduct_desc='$_POST[pdesc]' where id=$id");
        //     	}
            	?>
            	<script type="text/javascript">
            		window.location="display_items.php";
            	</script>
            	<?php

            }
            ?>
<?php
include "footer.php";  
  
?>         
     
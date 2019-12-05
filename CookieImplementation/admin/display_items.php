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
?>

<?php
include "header.php";
// include "menu.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"cn");
?>
      
        <div class="grid_10">
            <div class="box round first">
                <h2>
                    Cats</h2>
                <div class="block">
                    <?php
                    	$res=mysqli_query($link, "select * from product");
                    	echo "<table border='1'>";
                    	echo "<tr>";
                    	echo "<th>";echo "Cat image";echo "</th>";
                    	echo "<th>";echo "Name";echo "</th>";
                    	echo "<th>";echo "Price";echo "</th>";
                    	echo "<th>";echo "Breed";echo "</th>";
                    	echo "<th>";echo "Remove";echo "</th>";
                    	echo "<th>";echo "Edit";echo "</th>";
                    	echo "</tr>";

                    	while($row=mysqli_fetch_array($res)){
                    		echo "<tr>";
                    		echo "<td>"; ?> <img src="<?php echo $row["product_image"]; ?>" height="100" width="100"> <?php echo "</td>";
                    		echo "<td>";echo $row["product_name"];echo "</td>";
                    		echo "<td>";echo $row["product_price"];echo "</td>";
                    		echo "<td>";echo $row["product_category"];echo "</td>";
                    		echo "<td>";?><a href="delete.php?id=<?php echo $row["id"]; ?>" >Remove</a> <?php echo "</td>";
                    		echo "<td>";?><a href="edit.php?id=<?php echo $row["id"]; ?>" >Edit Details</a> <?php echo "</td>";
                    		echo "</tr>";
                    	}
                    	echo "</table>";
                    ?>
					
                </div>
            </div>
<?php
include "footer.php";  
  
?>         
     
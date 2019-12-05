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
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "cn");
?>

<div class="grid_10">
    <div class="box round first">
        <h2>
            Display Order</h2>

        <div class="block">

            <?php
            $res = mysqli_query($link, "select * from confirm_order_product");

            echo "<table border='1'>";
            
            echo "</tr>";

            while($row=mysqli_fetch_array($res))
            {
                echo "<tr>";
            echo "<th>";echo "Cat image";echo "</th>";
            echo "<td style='font-weight:bold'>"; echo "UserId"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Cat Ordered"; echo "</td>";
            echo "<td style='font-weight:bold'>"; echo "Price"; echo "</td>";
                $uid =  $row["product_total"];

                echo "<tr>";
                echo "<td>"; ?> <img src="<?php echo $row["product_image"]; ?>" height="100" width="100"> <?php echo "</td>";
                echo "<td>"; echo $row["product_total"]; echo "</td>";
                echo "<td>"; echo $row["product_name"]; echo "</td>";
                echo "<td>"; echo $row["order_id"]; echo "</td>"; 
                echo "</tr>";

                //extracting user info
                 echo "<td style='font-weight:bold'>"; echo "Customer Name"; echo "</td>";
                 echo "<td style='font-weight:bold'>"; echo "Customer Username"; echo "</td>";
                $res2 = mysqli_query($link, "select * from user where id = $uid");

                 while($row2=mysqli_fetch_array($res2))
                    {
                        $uname = $row2["username"];
                        echo "<tr>";
                        echo "<td>"; echo $row2["name"]; echo "</td>";
                        echo "<td>"; echo $row2["username"]; echo "</td>";
                        echo "</tr>";

                         //extracting user info
                         echo "<td style='font-weight:bold'>"; echo "Email"; echo "</td>";
                         echo "<td style='font-weight:bold'>"; echo "Address"; echo "</td>";
                         echo "<td style='font-weight:bold'>"; echo "Contact Number"; echo "</td>";
                        $res3 = mysqli_query($link, "select * from checkout_address where lastname = '$uname'");

                        while($row3=mysqli_fetch_array($res3))
                        {
                            echo "<tr>";
                            echo "<td>"; echo $row3["email"]; echo "</td>";
                            echo "<td>"; echo $row3["address"]; echo "</td>";
                            echo "<td>"; echo $row3["contactno"]; echo "</td>";
                            echo "</tr>";

                        }

                    }
            }
            echo "</table>";

            ?>

        </div>
    </div>
    <?php
    include "footer.php";

    ?>
     
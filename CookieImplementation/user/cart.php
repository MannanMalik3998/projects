<?php
session_start();
if (!isset($_SESSION['user']))
{
?>
    <script type="text/javascript">
    window.location="user_login.php";
</script>
<?php
}
$userId = $_SESSION['user'];


include "header.php";
?>


<section id="cart_cats">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed" border="10">
                <form name="form1" action="" method="post">
                    <?php
                    $d = 0;
                    if (isset($_COOKIE['cat']))  //this is for check cookies are available or nor
                    {
                        $d = $d + 1;

                    }
                    if ($d == 0)
                    {
                        echo "Cart Empty";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                    }
                    else
                    {
                    ?>
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Description</td>
                        <td class="price">Price</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($_COOKIE['cat'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
                    {

                            $values11 = explode("__", $value);
                            if($userId!= $values11[5]){continue;}
                            //0 image
                            //1 name
                            //2 price
                            //3 categ
                            //4 desc
                            //5 userid

                            ?>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="../admin/<?php echo $values11[0]; ?>" alt="" height="100"
                                                    width="100"></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href=""><?php echo $values11[4]; ?></a></h4>

                                </td>
                                <td class="cart_price">
                                    <p>$<?php echo $values11[2]; ?></p>
                                </td>
                          
                            
                            </tr>
                            <?php

                    }

                    ?>


                    </tbody>
                </form>
            </table>
            <?php

            }
            $tot = 0;

            if (isset($_COOKIE['cat']))  //this is for chec cookies are available or nor
            {
                foreach ($_COOKIE['cat'] as $name1 => $value)   //this is for looping as per cookies if 3 cookies then loop move
                {

                    $values11 = explode("__", $value);
                    if($userId!= $values11[5]){continue;}
                    $tot = $tot + $values11[2];
                }

                echo "$" . $tot;
            }
            ?>


        </div>
    </div>
</section>
<!--/#cart_items-->
<center>
    <a href="checkout.php">
        <input type="button" value="checkout"></a>
</center>

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
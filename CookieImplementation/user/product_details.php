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
$id = $_GET["id"]; 
$link = mysqli_connect("localhost", "root", "");
mysqli_select_db($link, "cn");

if (isset($_POST["submit1"])) {
$bool = 0;


     //to get item description from table
    $res3 = mysqli_query($link, "select * from product where id=$id");
    while ($row3 = mysqli_fetch_array($res3)) {
        $img1 = $row3["product_image"];
        $nm = $row3["product_name"];
        $price = $row3["product_price"];
        $categ = $row3["product_category"];
        $desc = $row3["pproduct_desc"];
    }

    $d = 0;//keeps track of cookie
     if (isset ($_COOKIE['cat'])) //this is for checking cookies available or not
        {
            //cookies found
            foreach ($_COOKIE['cat'] as $name => $value) {
                $values11 = explode("__", $value);
                if($img1== $values11[0]){$bool=1;break;}
                
                $d = $d + 1;
            }
            $d = $d + 1;
        } else {
            //not found
            $d = $d + 1;
        }

    
if($bool==0)
    setcookie("cat[$d]", $img1 . "__" . $nm . "__" . $price . "__" . $categ . "__" . $desc. "__" .$userId, time() + 1800);//new

}

?>


<body>
<?php
include "header.php";
?>
<section>
    <div class="container">
        <div class="row">
            

            <?php
            $res = mysqli_query($link, "select * from product where id=$id");
            while ($row = mysqli_fetch_array($res))
            {
            ?>

          

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="../admin/<?php echo $row["product_image"]; ?>" alt=""/>

                        </div>


                    </div>


                    <form name="form1" action="" method="post">
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="images/product-details/new.jpg" class="newarrival" alt=""/>

                                <h2><?php echo $row["product_name"]; ?></h2>
                                <h4><?php echo $row["pproduct_desc"]; ?></h4>

                                <p>Web ID: <?php echo $row["id"]; ?></p>
                                
                                <span>
                                    <span>US $<?php echo $row["product_price"]; ?></span>
                                    <!-- <label>Quantity:</label> -->
                                    <input type="text" value="1"/>
                                    <button type="submit" name="submit1" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </span>


                            </div>
                            <!--/product-information-->
                        </div>
                </div>
                <!--/product-details-->
                </form>
                <!-- end here-->

                <?php

                }
                ?>



            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>


<script src="js/jquery.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>
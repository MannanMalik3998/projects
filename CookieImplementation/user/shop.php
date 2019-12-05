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
include "header.php";
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"cn");
?>
            

<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
<link href="pagination/css/A_green.css" rel="stylesheet" type="text/css" />

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->

                   <?php

 include("pagination/function.php");
 $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 9;
    	$startpoint = ($page * $limit) - $limit;
        $statement = "product"; 

$res=mysqli_query($link,"select * from {$statement} LIMIT {$startpoint} , {$limit}");
while($row=mysqli_fetch_array($res))
{
    if($row["status"]=='1')
    continue;

?>

 <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="../admin/<?php echo $row["product_image"]; ?>" alt="" width="180" height="381" />
                                    <h2>$<?php echo $row["product_price"]; ?></h2>
                                    <p><?php echo $row["product_name"]; ?></p>
                                    <a href="product_details.php?id=<?php echo $row["id"]; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Description</a>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
}

<?php


}
                    ?>

                  </div>

                    <ul class="pagination">
					<?php
                        echo pagination($statement,$limit,$page);
                    ?>
					</ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>
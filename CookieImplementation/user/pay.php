<?php
session_start();
$userId = $_SESSION['user'];
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"cn");
// echo $userId;


//setcookie("test[1]","", time() - 1800);//code to delete cookie


$val=1;
foreach ($_COOKIE['cat'] as $name1 => $value)  
{
    
    $values11 = explode("__", $value);
     if($userId!= $values11[5]){$val = $val+1;continue;}
    mysqli_query($link,"insert into confirm_order_product values('','$values11[2]','$values11[1]','$values11[2]','$values11[4]','$values11[0]','$values11[5]')");
    mysqli_query($link,"update product set status = 1 where product_image = '$values11[0]'");
     setcookie("cat[$val]", "", time()-1800);
     $val = $val+1;
}

    //0 image
    //1 name
    //2 price
    //3 categ
    //4 desc
    //5 userid

echo "Thanks for shopping with us, We will contact you soon after confirmation of your order";


?>

<script type="text/javascript">

    setTimeout(function(){
        window.location="shop.php";

    },3000);

</script>

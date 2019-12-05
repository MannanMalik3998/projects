<?php
$id = $_GET["id"]; 
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"cn");


 $res = mysqli_query($link, "select * from product where id=$id");
    while ($row = mysqli_fetch_array($res)) {
        $img = $row["product_image"];
    }

// unlink($img);

mysqli_query($link,"delete from product where id=$id");
?>

<script type="text/javascript">
	setTimeout(function(){
        window.location="display_order.php";

    },3000);

</script>
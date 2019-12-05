<?php
include "connection.php";
$id=$_GET["id"];
// $name=$_Get["name"];
echo "$id";
echo "name";
$a = date("d-m-Y");
// $res = mysqli_query($DB,"update issuebook set bookreturndate = '$a' where id = '$id'");

$type="";
$res=mysqli_query($DB,"select * from room where id = '$id'");
while($row=mysqli_fetch_array($res))
{
	$type=$row["type"];
}

mysqli_query($DB,"update room set available_qty= available_qty+1 where type = '$type'");
// mysqli_query($DB,"delete from patient where type = '$type'");


?>
<script type="text/javascript">
	// window.location="return_books.php";
</script>
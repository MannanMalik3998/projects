<?php
include "connection.php";
$id=$_GET["id"];
$a = date("d-m-Y");
$res = mysqli_query($DB,"update issuebook set bookreturndate = '$a' where id = '$id'");

$bookname="";
$res=mysqli_query($DB,"select * from issuebook where id = '$id'");
while($row=mysqli_fetch_array($res))
{
	$bookname=$row["bookname"];
}

mysqli_query($DB,"update book set available_qty= available_qty+1 where bookname = '$bookname'");

?>
<script type="text/javascript">
	window.location="return_books.php";
</script>
<?php
include "connection.php";
if(isset($_GET["id"])){
	$id=$_GET["id"];
mysqli_query($DB,"delete from room where id = '$id'");
?>
<script type="text/javascript">
	window.location="room_display.php";
</script>
<?php
}
else{
	?>
	<script type="text/javascript">
	window.location="room_display.php";
</script>
	<?php
}
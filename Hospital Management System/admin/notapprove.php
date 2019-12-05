<?php
include "connection.php";
$id = $_GET["id"];
mysqli_query($DB,"update doctor set status = '0' where id = $id");
            ?>

            <script type="text/javascript">
            	window.location="display_doctor_info.php";
            </script>
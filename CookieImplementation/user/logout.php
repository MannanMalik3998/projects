<?php
session_start();
unset($_SESSION["user"]);
?>
<script type="text/javascript">
    window.location="user_login.php";
</script>
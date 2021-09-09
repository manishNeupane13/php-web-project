<?php
session_start();
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['USER_ID']);
?>
<script>
    window.location.href = "index.php";
</script>
<?php
die();

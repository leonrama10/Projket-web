<?php
session_start();
session_destroy();
header('Location: LOGINFORM.php');  
exit();
?>

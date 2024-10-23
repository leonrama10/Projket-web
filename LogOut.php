<?php
session_start();
session_destroy();
header('Location: LOGINFORM.php');  // Redirect to the login page after logging out
exit();
?>

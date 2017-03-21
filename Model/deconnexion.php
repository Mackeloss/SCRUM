<?php
session_start();
unset($_SESSION['identifie']);
session_destroy();
header('location: ../site.php');
?>

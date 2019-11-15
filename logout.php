<?php
require('database.php');
unset($_SESSION['username']);
session_destroy();
header('Location: start.php');
exit;
?>
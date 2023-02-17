<?php
require('init.php');
unset($_SESSION['username']);
session_destroy();
header('Location: start.php');
exit;
?>
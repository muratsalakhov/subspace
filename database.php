<?php
$connection = mysqli_connect('subspace', 'root', '');
$select_db = mysqli_select_db($connection, 'subspace');
session_start();
?>
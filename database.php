<?php
$connection = mysqli_connect('subspace', 'root', '') or die("Ошибка " . mysqli_error($connection));
$select_db = mysqli_select_db($connection, 'subspace') or die("Ошибка " . mysqli_error($select_db));
session_start();
?>
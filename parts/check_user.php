<?php
if (!isset($_SESSION['username'])){
	header('Location: start.php#unregistered');
}
?>
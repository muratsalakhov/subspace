<?php
require('database.php');
error_reporting(E_ALL); 
ini_set('display_errors', 'On');

if (isset($_POST['username']) and isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = "SELECT * FROM users WHERE username='$username' and password='$password'";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);

	if($count == 1){
		$_SESSION['username'] = $username;
		header("Location: authentification.php#success");
	} else {
		header("Location: authentification.php#error");
	}
}
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Space-Sub</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="css/auth.css" >
	<link rel="stylesheet" href="css/authentification.css" >
</head>
<body>
<header>
	<div class="container">
		<div class="header-logo">
			<a href="start.php">Space-Sub</a>
		</div>
		<div class="header-buttons">
			<a href="authentification.php">Вход
			<a href="registration.php">Регистрация</a>
		</div>
	</div>
</header>

<div class="main-section">
	<div class="container">
		<form class="form-signin" method="POST">
			<h2>Авторизация </h2>
			<input type="text" name="username" class="form-control" placeholder="Имя" required="" autocomplete="off">
			<input type="password" name="password" class="form-control" placeholder="Пароль" required="" autocomplete="off">
			<button class="submit-btn" type="submit">Войти</button>
			<a href="registration.php" class="submit-btn auth-btn" type="submit">Регистрация</a>
		</form>
	</div>
</div>
<div id="error" class="modalbackground">
	<div class="modalwindow">
		<h3>Ошибка!</h3>
		<p>Проверьте введенные данные</p>
		<a href=" ">Закрыть</a>
	</div>
</div>
<div id="success" class="modalbackground">
	<div class="modalwindow">
		<h3>Успешно!</h3>
		<p>Вы успешно авторизировались</p>
		<a href="index.php">Продолжить</a>
	</div>
</div>
<footer>
	<div class="container">
		<div class="footer-info">
			<p>Создано в учебных целях</p>
		</div>
	</div>
</footer>
</body>
</html>
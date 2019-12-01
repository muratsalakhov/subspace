<?php
require('database.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$query = "SELECT * FROM users WHERE user_name = '$username' OR user_email = '$email'";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);

	if ($count == 0) {
		$query = "INSERT INTO users (user_name, user_email, user_password) VALUES ('$username', '$email', '$password')";
		$result = mysqli_query($connection, $query);

		if($result){
			header("Location: registration.php#success");
			require('new_user_init.php');

		} else {
			header("Location: registration.php#error2");
		}
	} else {
		header("Location: registration.php#error1");
	}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Space-Sub</title>
	<link rel="stylesheet" href="css/auth.css" >
	<link rel="stylesheet" href="css/registration.css" >
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
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
			<h2>Регистрация</h2>
			<input type="text" name="username" class="form-control" placeholder="Имя" required="" autocomplete="off">
			<input type="email" name="email" class="form-control" placeholder="Email" required="" autocomplete="off">
			<input type="password" name="password" class="form-control" placeholder="Пароль" required="" autocomplete="off">
			<button class="submit-btn reg-btn" type="submit">Зарегистрироваться</button>
			<a href="authentification.php" class="submit-btn auth-btn" type="submit">Авторизоваться</a>
		</form>
	</div>
</div>

<div id="error1" class="modalbackground">
	<div class="modalwindow">
		<h3>Ошибка!</h3>
		<p>Пользователь с таким именем или почтой уже существует</p>
		<a href=" ">Закрыть</a>
	</div>
</div>
<div id="erro2r" class="modalbackground">
	<div class="modalwindow">
		<h3>Ошибка!</h3>
		<p>Произошла ошибка.</p>
		<a href=" ">Закрыть</a>
	</div>
</div>
<div id="success" class="modalbackground">
	<div class="modalwindow">
		<h3>Успешно!</h3>
		<p>Вы успешно зарегистрировались</p>
		<a href="authentification.php">Продолжить</a>
	</div>
</div>

<footer>
	<div class="container">
		<div class="footer-info">
			<p>Создано в учебных целях.</p>
		</div>
	</div>
</footer>
</body>
</html>

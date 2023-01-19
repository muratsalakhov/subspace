<?php

require '../init.php';

/** @var mysqli|bool $connection */

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
			header("Location: /registration/#success");
			require('new_user_init.php');

		} else {
			header("Location: /registration/#error2");
		}
	} else {
		header("Location: /registration/#error1");
	}
}
?>

<?php require_once '../template/header-no-auth.php'; ?>

<div class="main-section">
	<div class="container">
		<form class="form-signin" method="POST">
			<h2>Регистрация</h2>
			<input type="text" name="username" class="form-control" placeholder="Имя" required="" autocomplete="off">
			<input type="email" name="email" class="form-control" placeholder="Email" required="" autocomplete="off">
			<input type="password" name="password" class="form-control" placeholder="Пароль" required="" autocomplete="off">
			<button class="submit-btn reg-btn" type="submit">Зарегистрироваться</button>
			<a href="../auth/" class="submit-btn auth-btn" type="submit">Авторизоваться</a>
		</form>
	</div>
</div>

<?php require_once '../template/footer-no-auth.php'; ?>

<?php
require('init.php');

/** @var mysqli|bool $connection */

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (isset($_POST['username']) and isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = "SELECT * FROM users WHERE user_name='$username' and user_password='$password'";
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
<?php require_once '../template/header-no-auth.php'; ?>

<div class="main-section">
	<div class="container">
		<form class="form-signin" method="POST">
			<h2>Авторизация </h2>
			<input type="text" name="username" class="form-control" placeholder="Имя" required="" autocomplete="off">
			<input type="password" name="password" class="form-control" placeholder="Пароль" required="" autocomplete="off">
			<button class="submit-btn" type="submit">Войти</button>
			<a href="../registration" class="submit-btn auth-btn" type="submit">Регистрация</a>
		</form>
	</div>
</div>

<?php require_once '../template/footer-no-auth.php'; ?>
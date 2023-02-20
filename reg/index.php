<?php

use Murat\Subspace\Controller\UserController;

require '../init.php';

// регистрация пользователя через POST запрос
if (isset($_POST['username'], $_POST['password'])) {
    (new UserController())->register(); // todo: перейти на работу с api
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

<?php

use Murat\Subspace\Controller\UserController;

require '../init.php';

// авторизация пользователя через POST запрос
if (isset($_POST['username'], $_POST['password'])) {
    (new UserController())->authorize(); // todo: перейти на работу с api
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
                <input type="text" name="username" class="form-control" placeholder="Имя" required=""
                       autocomplete="off">
                <input type="password" name="password" class="form-control" placeholder="Пароль" required=""
                       autocomplete="off">
                <button class="submit-btn" type="submit">Войти</button>
                <a href="../reg" class="submit-btn auth-btn" type="submit">Регистрация</a>
            </form>
        </div>
    </div>

<?php require_once '../template/footer-no-auth.php'; ?>
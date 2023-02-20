<?php

use \NoahBuscher\Macaw\Macaw as Router;
use Murat\Subspace\Controller\UserController;

require '../init.php';

/**
 * Регистрация пользователя
 * @uses UserController::register()
 */
Router::post('/api/user/register/', UserController::class.'@register');

/**
 * Авторизация пользователя
 * @uses UserController::authorize()
 */
Router::post('/api/user/authorize/', UserController::class.'@authorize');

Router::error(static function () {
    // todo: 404 controller
    echo '404 :: Not Found';
});

Router::dispatch();
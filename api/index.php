<?php

use \NoahBuscher\Macaw\Macaw as Router;
use Murat\Subspace\Controller\UserController;

require '../init.php';

// регистрация
Router::post('/api/user/register/', UserController::class.'@register');

// авторизация
Router::post('/api/user/authorize/', UserController::class.'@authorize');

Router::error(static function() {
    // todo: 404 controller
    echo '404 :: Not Found';
});

Router::dispatch();
<?php

use \NoahBuscher\Macaw\Macaw as Router;

require '../init.php';

Router::get('/api/', static function () {
    echo "hello world";
});

Router::error(static function() {
    echo '404 :: Not Found';
});

Router::dispatch();
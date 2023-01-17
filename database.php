<?php

require 'vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$connection = mysqli_connect(
    $_ENV["DB_HOSTNAME"],
    $_ENV["DB_USERNAME"],
    $_ENV["DB_PASSWORD"]
);

mysqli_select_db($connection, $_ENV["DB_HOSTNAME"]);
session_start();

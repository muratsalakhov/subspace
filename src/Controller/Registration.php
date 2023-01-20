<?php

namespace Murat\Subspace\Controller;

use Exception;
use mysqli;

class Registration extends BaseController
{
    protected array $postData;

    public function __construct()
    {
        parent::__construct();
        $this->postData = $_POST;
    }

    public function register()
    {
        if (!isset($this->postData['username'])) {
            throw new Exception('Empty username field');
        }
        if (!isset($this->postData['password'])) {
            throw new Exception('Empty password field');
        }

        $username = $this->postData['username'];
        $password = md5($this->postData['password']);
        $email    = $this->postData['email'];

        $queryString = "SELECT * FROM users WHERE user_name = {$username} OR user_email = {$email}";
        $queryResult = $this->dbClient->query($queryString);

        if (mysqli_num_rows($queryResult) !== 0) {
            header("Location: /registration/#error1"); // пользователь с такими данными уже зарегистрирован
        }

        $queryString  = "INSERT INTO users (user_name, user_email, user_password) VALUES ({$username}, {$email}, {$password})";
        $queryResult = $this->dbClient->query($queryString);

        if ($queryResult) {
            header("Location: /registration/#success"); // регистрация прошла успешно
            require('new_user_init.php');
        }

        header("Location: /registration/#error2"); // не удалось зарегистрировать пользователя
    }
}
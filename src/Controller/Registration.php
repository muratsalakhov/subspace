<?php

namespace Murat\Subspace\Controller;

use Exception;
use Murat\Subspace\Tool\UserHelper;

/**
 * Контроллер регистрации
 */
class Registration extends BaseController
{
    /**
     * Массив данных POST запроса
     * @var array
     */
    protected array $postData;

    public function __construct()
    {
        parent::__construct();
        $this->postData = $_POST;
    }

    /**
     * Регистрация пользователя
     * @return void
     * @throws Exception
     */
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

        if (!$queryResult) {
            header("Location: /registration/#error2"); // не удалось зарегистрировать пользователя
        }

        header("Location: /registration/#success"); // регистрация прошла успешно
        UserHelper::fillDataForNewUser($username);
    }
}
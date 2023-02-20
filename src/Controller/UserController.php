<?php

namespace Murat\Subspace\Controller;

use Exception;
use Murat\Subspace\Model\User;
use Murat\Subspace\Tool\UserHelper;

/**
 * Контроллер для работы с пользователем
 */
class UserController extends BaseController
{
    /**
     * Зарегистрировать пользователя
     * @throws Exception
     */
    public function register(): void
    {
        try {
            if (!isset($this->postData['username'])) {
                throw new Exception('Empty username field');
            }
            if (!isset($this->postData['password'])) {
                throw new Exception('Empty password field');
            }

            $username = $this->postData['username'];
            $email    = $this->postData['email'];
            $password = md5($this->postData['password']);

            $user = new User();

            if ($user->getByEmail($email)) {
                // todo: сделать редирект на фронте
                header("Location: /registration/#error1"); // пользователь с такими данными уже зарегистрирован
                return;
            }

            $isSuccess = $user->create($username, $email, $password);

            if ($isSuccess) {
                header("Location: /registration/#success"); // регистрация прошла успешно
                UserHelper::fillDataForNewUser($username);
                return;
            }

            header("Location: /registration/#error2"); // не удалось зарегистрировать пользователя
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     * Авторизовать пользователя
     * @return void
     */
    public function authorize(): void
    {
        try {
            if (!isset($this->postData['username'])) {
                throw new Exception('Empty username field');
            }
            if (!isset($this->postData['password'])) {
                throw new Exception('Empty password field');
            }

            // todo: переделать на авторизацию по email
            $username = $this->postData['username'];
            $password = md5($this->postData['password']);

            $user = new User();

            if ($user->getByAuthData($username, $password)) {
                $_SESSION['username'] = $username; // todo: класс для работы с сессией
                header("Location: /auth/#success"); // авторизация прошла успешно
            }

            header("Location: ../auth/#error"); // ошибка авторизации
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
<?php

namespace Murat\Subspace\Model;

use Exception;
use Murat\Subspace\Core\Model;

/**
 * Модель пользователя
 */
class User extends Model
{
    /**
     * Получить пользователя по email
     * @param string $email
     * @return array
     * @throws Exception
     */
    public function getByEmail(string $email): array
    {
        return $this->selectOne("SELECT * FROM users WHERE user_email = '{$email}'");
    }

    /**
     * Получить пользователя по email
     * @param string $username
     * @param string $password
     * @return array
     * @throws Exception
     */
    public function getByAuthData(string $username, string $password): array
    {
        return $this->selectOne("SELECT * FROM users WHERE user_name = '{$username}' AND user_password = '{$password}'");
    }

    /**
     * Создать пользователя
     * @param string $username
     * @param string $email
     * @param string $password
     * @return bool результат операции
     * @throws Exception
     */
    public function create(string $username, string $email, string $password): bool
    {
        return $this->insert(
            "INSERT INTO users 
                SET user_name = '{$username}',
                    user_email = '{$email}', 
                    user_password = '{$password}';"
        );
    }
}
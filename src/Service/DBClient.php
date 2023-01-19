<?php

namespace Murat\Subspace\Service;

use Exception;
use mysqli;
use Symfony\Component\Dotenv\Dotenv;

/**
 * Клиент для работы с БД
 */
class DBClient
{
    protected static DBClient $instance;

    /**
     * Подключение к mysql
     * @var mysqli|null
     */
    protected ?mysqli $dbConnection;

    public function __construct()
    {
        $this->dbConnection = $this->getConnection();

        if (!$this->dbConnection) {
            throw new Exception("DB connection error");
        }
    }

    /**
     * Получить инстанс
     * @return DBClient
     */
    public static function getInstance(): DBClient
    {
        if (!isset(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Создать подключение
     * @return mysqli|null
     */
    private function getConnection(): ?mysqli
    {
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__.'/.env');

        $dbConnection = mysqli_connect(
            $_ENV['DB_HOSTNAME'],
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD']
        );

        mysqli_select_db($dbConnection, $_ENV['DB_NAME']);

        return $dbConnection;
    }
}
<?php

namespace Murat\Subspace\Service;

use Exception;
use mysqli;
use mysqli_result;
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

    /**
     * @var bool|mysqli_result
     */
    protected $result;

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
     * Выполнить запрос к БД
     * @param string $queryString
     * @return mysqli_result
     * @throws Exception
     */
    public function query(string $queryString): mysqli_result
    {
        $this->result = mysqli_query($this->dbConnection, $queryString);

        if (!$this->result) {
            throw new Exception("Database query error");
        }

        return $this->result;
    }

    /**
     * Создать подключение
     * @return mysqli|null
     */
    private function getConnection(): ?mysqli
    {
        $dotenv = new Dotenv();
        $dotenv->load($_SERVER['DOCUMENT_ROOT'].'/.env');

        $dbConnection = mysqli_connect(
            $_ENV['DB_HOSTNAME'],
            $_ENV['DB_USERNAME'],
            $_ENV['DB_PASSWORD']
        );

        mysqli_select_db($dbConnection, $_ENV['DB_NAME']);

        return $dbConnection;
    }
}
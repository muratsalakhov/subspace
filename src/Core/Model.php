<?php

namespace Murat\Subspace\Core;

use Exception;

/**
 * Абстрактная модель
 */
abstract class Model
{
    /**
     * Клиент БД
     * @var DBClient
     */
    protected DBClient $dbClient;

    public function __construct()
    {
        $this->dbClient = DBClient::getInstance();
    }

    /**
     * Получить одну запись по указанному запросу
     * @param string $selectString SQL запрос
     * @return array запись
     * @throws Exception
     */
    protected function selectOne(string $selectString): array
    {
        return $this->dbClient->query($selectString)->fetch_row() ?: [];
    }

    /**
     * Получить все записи по указанному запросу
     * @param string $selectString SQL запрос
     * @return array массив записей
     * @throws Exception
     */
    protected function select(string $selectString): array
    {
        return $this->dbClient->query($selectString)->fetch_all() ?: [];
    }

    /**
     * Добавить новую запись
     * @param string $insertString SQL запрос
     * @return bool успешно/неуспешно
     * @throws Exception
     */
    protected function insert(string $insertString): bool {
        return (bool)$this->dbClient->query($insertString);
    }
}
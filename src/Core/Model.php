<?php

namespace Murat\Subspace\Core;

use Exception;
use Murat\Subspace\Core\DBClient;

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
     * @param string $selectString
     * @return array
     * @throws Exception
     */
    protected function selectOne(string $selectString): array
    {
        return $this->dbClient->query($selectString)->fetch_row() ?: [];
    }

    /**
     * Получить все записи по указанному запросу
     * @param string $selectString
     * @return array
     * @throws Exception
     */
    protected function select(string $selectString): array
    {
        return $this->dbClient->query($selectString)->fetch_all() ?: [];
    }
}
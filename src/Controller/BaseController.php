<?php

namespace Murat\Subspace\Controller;

use Murat\Subspace\Service\DBClient;

/**
 * Абстрактный класс базового контроллера
 */
abstract class BaseController
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
}
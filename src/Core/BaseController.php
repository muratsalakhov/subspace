<?php

namespace Murat\Subspace\Core;

use Murat\Subspace\Core\DBClient;

/**
 * Абстрактный класс базового контроллера
 */
abstract class BaseController
{
    /**
     * Массив данных POST запроса
     * @var array
     */
    protected array $postData = [];

    public function __construct()
    {
        $this->postData = $_POST;
    }

    // todo: response method
}
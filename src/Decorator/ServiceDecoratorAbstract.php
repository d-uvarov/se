<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 16.07.2018
 * Time: 0:31
 */

namespace src\Decorator;

use src\Service\ServiceInterface;

abstract class ServiceDecoratorAbstract implements ServiceInterface
{
    protected $service;

    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }
}
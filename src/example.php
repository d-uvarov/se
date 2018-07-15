<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 16.07.2018
 * Time: 1:00
 */

use src\Decorator\DecoratorManager;
use src\Integration\Cache;
use src\Service\Db\DbService;
use src\Servise\UrlService\UrlService;

$manager = new DecoratorManager(
    new UrlService("http://example.com"),
    new Logger()
);

$manager->get(['page' => 'news']);

$manager = new DecoratorManager(
    new DbService('example.com', 'test', 'test'),
    new Logger()
);

$manager->setCache(new Cache());
$manager->get(['table' => 'my']);
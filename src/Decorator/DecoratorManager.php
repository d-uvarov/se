<?php

namespace src\Decorator;

use DateTime;
use Exception;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\LoggerInterface;
use src\Service\ServiceInterface;


class DecoratorManager extends ServiceDecoratorAbstract
{
    /**
     * @var CacheItemPoolInterface
     */
    protected $cache;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var ServiceInterface
     */
    protected $service;

    /**
     * DecoratorManager constructor.
     *
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service, LoggerInterface $logger)
    {
        $this->service = $service;
        $this->logger  = $logger;
    }

    /**
     * @param CacheItemPoolInterface $cache
     */
    public function setCache($cache)
    {
        $this->cache = $cache;
    }

    /**
     * {@inheritdoc}
     */
    public function get(array $request)
    {
        try {
            if (!is_null($this->cache)) {
                $cacheKey  = $this->getCacheKey($request);
                $cacheItem = $this->cache->getItem($cacheKey);
                if ($cacheItem->isHit()) {
                    return $cacheItem->get();
                }
            }

            $result = $this->service->get($request);

            if ($result && !is_null($this->cache)) {
                $cacheItem = new CacheItem();
                $cacheItem
                    ->set($result)
                    ->expiresAt(
                        (new DateTime())->modify('+1 day')
                    );

                $this->cache->save($cacheItem);
            }

            return $result;
        } catch (Exception $e) {
            $this->logger->critical('Error');
        }

        return [];
    }

    /**
     * @param array $input
     *
     * @return string
     */
    public function getCacheKey(array $input)
    {
        return json_encode($input);
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 16.07.2018
 * Time: 0:57
 */

namespace src\Servise\UrlService;

class UrlService implements \src\Service\ServiceInterface
{
    private $url;

    private $client;

    /**
     * Client constructor.
     *
     * @param $url string
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @param array $request
     *
     * @return array|mixed
     */
    public function get(array $request)
    {
        $this->client->request($this->url, $request);

        return [];
    }

}
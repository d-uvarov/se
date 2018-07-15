<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 16.07.2018
 * Time: 0:31
 */

namespace src\Service\Db;

class DbService implements \src\Service\ServiceInterface
{
    private $host;

    private $user;

    private $password;

    /**
     * @param $host
     * @param $user
     * @param $password
     */
    public function __construct($host, $user, $password)
    {
        $this->host     = $host;
        $this->user     = $user;
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function get(array $request)
    {
        // call service
        return [];
    }

}
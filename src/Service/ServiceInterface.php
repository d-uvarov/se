<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 16.07.2018
 * Time: 0:30
 */

namespace src\Service;

interface ServiceInterface
{
    /**
     * @param array $request
     *
     * @return mixed
     */
    public function get(array $request);
}
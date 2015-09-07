<?php

namespace Brzoski;

class Connector
{
    public static function connect($config)
    {
        try
        {
            return new \PDO('mysql:host='.$config['host'].';dbname='.$config['db_name'].'', $config['user'], $config['password']);
        }
        catch(\PDOException $e)
        {
            return $e;
        }
    }
}

<?php

namespace App\Instance;

use ClickHouseDB;

class ClickHouseInstance
{
    public static function get(): ClickHouseDB\Client
    {
        $redisConfig = self::getConfig();
        return self::connect($redisConfig);
    }

    private static function getConfig(): array
    {
        $config = [
            'host' => env('clickhouse.host', '10.10.170.39'),
            'port' => env('clickhouse.port', '8123'),
            'username' => env('clickhouse.username', 'default'),
            'password' => env('clickhouse.password', ''),
        ];
        return $config;
    }

    private static function connect(array $config): ClickHouseDB\Client
    {
        $db = new ClickHouseDB\Client($config);
        $db->database('default');
        $db->setTimeout(1.5);      // 1500 ms
        $db->setTimeout(10);       // 10 seconds
        $db->setConnectTimeOut(3); // 5 seconds
        return $db;
    }
}
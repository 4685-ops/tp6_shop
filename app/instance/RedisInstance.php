<?php

namespace app\instance;

class RedisInstance
{
    public static function get(): \Redis
    {
        $redisConfig = self::getRedisConfig();
        return self::connect($redisConfig);
    }

    private static function connect(array $redisConfig)
    {
        $redis = new \Redis();
        $redis->connect($redisConfig['host'], $redisConfig['port']);
        $redis->auth($redisConfig['password']);
        return $redis;
    }

    private static function getRedisConfig(): array
    {
        // parse_ini_file
        $redisConfig['host'] = env('redis.hostname');
        $redisConfig['password'] = env('redis.password');
        $redisConfig['port'] = env('redis.port');
        $redisConfig['timeout'] = env('redis.timeout');
        $redisConfig['db_number'] =  env('redis.db_number');;

        return $redisConfig;
    }
}
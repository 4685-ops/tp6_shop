<?php

namespace App\Instance;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMQInstance
{
    public static function get():AMQPStreamConnection
    {
        $rabbitMQConfig = self::getRabbitMQConfig();
        return self::connect($rabbitMQConfig);
    }

    private static function connect(array $rabbitMQConfig):AMQPStreamConnection
    {
        $connection = new AMQPStreamConnection(
           $rabbitMQConfig['host'],
           $rabbitMQConfig['port'],
           $rabbitMQConfig['login'],
           $rabbitMQConfig['password'],
           $rabbitMQConfig['vhost']);
        return $connection;
    }

    private static function getRabbitMQConfig(): array
    {
        $rabbitMQConfig['host'] = env('rabbitMQ.host','10.10.170.39');
        $rabbitMQConfig['port'] = env('rabbitMQ.port','5672');
        $rabbitMQConfig['login'] = env('rabbitMQ.login','admin');
        $rabbitMQConfig['password'] = env('rabbitMQ.password','admin');
        $rabbitMQConfig['vhost'] = env('rabbitMQ.vhost','/');

        return $rabbitMQConfig;
    }
}
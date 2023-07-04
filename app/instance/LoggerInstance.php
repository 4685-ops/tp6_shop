<?php

namespace App\Instance;

use App\Helpers\LoggerHelper;

class LoggerInstance
{
    const LOG_FILE_COLLECT = 'collect'; // 采集日志
    const LOG_FILE_COLLECT_NEWS = 'collectNews'; // 采集新闻日志
    const LOG_FILE_GENERATE = 'generate'; // 生成和推送日志
    const LOG_FILE_SPIDER = 'spider'; // 蜘蛛访问统计采集日志
    const LOG_SlOW_SQL = 'slowSql'; // 收集慢SQL日志
    const LOG_RABBITMQ = 'rabbitMQ'; // rabbitMQ
    const LOG_Kafka = 'kafka'; // kafka

    /**
     * 普通日志
     * @param string $module
     * @param int $webId
     * @param string $logFileName
     * @return LoggerHelper
     */
    public static function get(string $module = 'default', int $webId = 0, string $logFileName = ''): LoggerHelper
    {
        return new LoggerHelper($module, $webId, $logFileName);
    }

    /**
     * 采集日志
     * @param string $module
     * @param int $webId
     * @return LoggerHelper
     */
    public static function getCollect(string $module = 'default', int $webId = 0): LoggerHelper
    {
        return new LoggerHelper($module, $webId, self::LOG_FILE_COLLECT);
    }

    /**
     * 采集日志
     * @param string $module
     * @param int $webId
     * @return LoggerHelper
     */
    public static function getCollectNews(string $module = 'default', int $webId = 0): LoggerHelper
    {
        return new LoggerHelper($module, $webId, self::LOG_FILE_COLLECT_NEWS);
    }

    /**
     * 生成规则和推送日志
     * @param string $module
     * @param int $webId
     * @return LoggerHelper
     */
    public static function getGenerate(string $module = 'default', int $webId = 0): LoggerHelper
    {
        return new LoggerHelper($module, $webId, self::LOG_FILE_GENERATE);
    }

    /**
     * 蜘蛛访问统计日志
     * @param string $module
     * @param int $webId
     * @return LoggerHelper
     */
    public static function getSpider(string $module = 'default', int $webId = 0): LoggerHelper
    {
        return new LoggerHelper($module, $webId, self::LOG_FILE_SPIDER);
    }

    /**
     * SQL慢日志
     * @param string $module
     * @param int $webId
     * @return LoggerHelper
     */
    public static function getSlowSql(string $module = 'default', int $webId = 0): LoggerHelper
    {
        return new LoggerHelper($module, $webId, self::LOG_SlOW_SQL);
    }

    /**
     * rabbitMQ
     * @param string $module
     * @param int $webId
     * @return LoggerHelper
     */
    public static function getRabbitMQ(string $module = 'default', int $webId = 0): LoggerHelper
    {
        return new LoggerHelper($module, $webId, self::LOG_RABBITMQ);
    }

    /**
     * kafka
     * @param string $module
     * @param int $webId
     * @return LoggerHelper
     */
    public static function getKafka(string $module = 'default', int $webId = 0): LoggerHelper
    {
        return new LoggerHelper($module, $webId, self::LOG_Kafka);
    }

}
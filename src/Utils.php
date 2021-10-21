<?php


namespace Reactificate\Utils;


use React\EventLoop\LoopInterface;

class Utils
{
    protected static array $data = [
        'config_directory' => '',
    ];

    /**
     * @return LoopInterface
     */
    public static function getLoop(): LoopInterface
    {
        return \React\EventLoop\Loop::get();
    }

    /**
     * @param string $key
     * @param mixed $data
     */
    public static function set(string $key, $data): void
    {
        self::$data[$key] = $data;
    }

    public static function setConfigDirectory(string $path): void
    {
        self::$data['config_directory'] = $path;
    }

    public static function getConfigDirectory(): string
    {
        return self::$data['config_directory'];
    }

    /**
     * @param string $key
     * @return mixed
     */
    public static function get(string $key)
    {
        return self::$data[$key] ?? null;
    }
}
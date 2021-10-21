<?php


namespace Reactificate\Utils;


use React\EventLoop\LoopInterface;

class Utils
{
    protected static array $data = [
        'config_directory' => '',
    ];

    private static LoopInterface $loop;

    public static function init(LoopInterface $loop): void
    {
        self::$loop = $loop;
    }

    /**
     * @return LoopInterface
     */
    public static function getLoop(): LoopInterface
    {
        return self::$loop;
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
        return self::$data[$key];
    }
}
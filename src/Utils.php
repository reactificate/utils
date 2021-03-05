<?php


namespace Reactificate\Utils;


use React\EventLoop\LoopInterface;

class Utils
{
    protected static array $data;
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

    public static function set(string $key, object $emitter): void
    {
        self::$data[$key] = $emitter;
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
<?php


namespace Reactificate\Utils;


use React\EventLoop\LoopInterface;

class Utils
{
    private static LoopInterface $loop;


    public static function init(LoopInterface $loop)
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
}
<?php


namespace Reactificate\Utils;


class Console
{
    /**@var resource $stdOut**/
    protected static $stdOut;

    /**
     * @return resource
     */
    protected static function getStdOut()
    {
        if (!isset(self::$stdOut)){
            self::$stdOut = fopen('php://stdout', 'w+');
        }

        return self::$stdOut;
    }

    public static function echo(string $message): void
    {
        fwrite(self::getStdOut(), $message);
    }
}
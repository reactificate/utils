<?php


namespace Reactificate\Utils;


class Console
{
    /**@var resource $stdOut * */
    protected static $stdOut;

    public static function echo(string $message): void
    {
        fwrite(self::getStdOut(), $message);
    }

    /**
     * @param mixed $data
     */
    public static function dump($data): void
    {
        ob_start();
        dump($data);
        $output = ob_get_clean();
        self::echo($output);
    }

    /**
     * @return resource
     */
    protected static function getStdOut()
    {
        if (!isset(self::$stdOut)) {
            self::$stdOut = fopen('php://stdout', 'w+');
        }

        return self::$stdOut;
    }
}
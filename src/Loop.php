<?php


namespace Reactificate\Utils;


use Closure;
use React\EventLoop\LoopInterface;
use React\EventLoop\TimerInterface;

/**
 * Class Loop
 * @package Reactify
 */
class Loop
{
    /**
     * @param float|int $interval micro
     * @param Closure $closure
     * @return TimerInterface
     */
    public static function interval($interval, Closure $closure): TimerInterface
    {
        return self::getLoop()->addPeriodicTimer($interval, $closure);
    }

    public static function getLoop(): LoopInterface
    {
        return Utils::getLoop();
    }

    /**
     * @param float|int $timeout
     * @param Closure $closure
     * @return TimerInterface
     */
    public static function timeout($timeout, Closure $closure): TimerInterface
    {
        return self::getLoop()->addTimer($timeout, $closure);
    }

    /**
     * Listens to future event loop tick
     * @param Closure $closure
     */
    public static function futureTick(Closure $closure): void
    {
        self::getLoop()->futureTick($closure);
    }

    /**
     * Cancel timer
     * @param TimerInterface $timer
     */
    public static function cancelTimer(TimerInterface $timer): void
    {
        self::getLoop()->cancelTimer($timer);
    }
}
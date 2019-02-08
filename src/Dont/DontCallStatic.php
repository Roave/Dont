<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\NonStaticCallableClass;

trait DontCallStatic
{
    /**
     * @throws NonStaticCallableClass
     */
    final public static function __callStatic($name, $arguments)
    {
        throw NonStaticCallableClass::fromAttemptedStaticCall(self::class, $name);
    }
}

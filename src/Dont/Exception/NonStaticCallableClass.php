<?php

declare(strict_types=1);

namespace Dont\Exception;

use LogicException;

class NonStaticCallableClass extends LogicException implements ExceptionInterface
{
    private const ERROR_TEMPLATE = <<<'ERROR'
The given class %s is not designed to allow any undefined or inaccessible static methods to be called.

You tried to call a static method called "%s".

Perhaps you made a typo in the method name, or tried to call an inaccessible method?
ERROR;

    /**
     * @throws TypeError
     */
    public static function fromAttemptedStaticCall(string $class, string $method) : self
    {
        return new self(sprintf(
            self::ERROR_TEMPLATE,
            $class,
            $method
        ));
    }
}

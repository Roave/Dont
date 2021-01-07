<?php

declare(strict_types=1);

namespace Dont\Exception;

use LogicException;

class NonStringableObject extends LogicException implements ExceptionInterface
{
    private const ERROR_TEMPLATE = <<<'ERROR'
The given object %s#%s is not designed to be stringable.

You tried to access a method called "__toString()".
ERROR;

    /**
     * @return NonStringableObject
     */
    public static function fromAttemptedToString(object $object) : self
    {
        $className = get_class($object);

        return new self(sprintf(
            self::ERROR_TEMPLATE,
            $className,
            spl_object_hash($object)
        ));
    }
}

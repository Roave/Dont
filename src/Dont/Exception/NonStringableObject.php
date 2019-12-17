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
     * @param object $object
     *
     * @return NonStringableObject
     *
     * @throws TypeError
     */
    public static function fromAttemptedToString($object) : self
    {
        if (! is_object($object)) {
            throw TypeError::fromNonObject($object);
        }

        $className = get_class($object);

        return new self(sprintf(
            self::ERROR_TEMPLATE,
            $className,
            spl_object_hash($object)
        ));
    }
}

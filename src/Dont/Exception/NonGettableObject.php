<?php

declare(strict_types=1);

namespace Dont\Exception;

use LogicException;

class NonGettableObject extends LogicException implements ExceptionInterface
{
    private const ERROR_TEMPLATE = <<<'ERROR'
The given object %s#%s is not designed to allow any undefined or inaccessible properties to be read from.

You tried to access a property called "%s".

Perhaps you made a typo in the property name, or tried to access an inaccessible property?
ERROR;

    /**
     * @param object $object
     * @throws TypeError
     */
    public static function fromAttemptedGet($object, string $property) : self
    {
        if (! is_object($object)) {
            throw TypeError::fromNonObject($object);
        }

        $className = get_class($object);

        return new self(sprintf(
            self::ERROR_TEMPLATE,
            $className,
            spl_object_hash($object),
            $property
        ));
    }
}

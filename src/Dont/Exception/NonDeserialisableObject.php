<?php

declare(strict_types=1);

namespace Dont\Exception;

use LogicException;

class NonDeserialisableObject extends LogicException implements ExceptionInterface
{
    private const ERROR_TEMPLATE = <<<'ERROR'
The given object %s#%s is not designed to be deserialised, yet deserialisation was attempted.

This error is raised because the author of %s didn't design it to be deserialisable, nor can
guarantee that it will function correctly after deserialisation, nor can guarantee that all
its internal components are deserialisable.

Please do not use unserialize() to produce %s instances.
ERROR;

    public static function fromAttemptedDeSerialisation($object) : self
    {
        if (! is_object($object)) {
            throw TypeError::fromNonObject($object);
        }

        $className = get_class($object);

        return new self(sprintf(
            self::ERROR_TEMPLATE,
            $className,
            spl_object_hash($object),
            $className,
            $className
        ));
    }
}

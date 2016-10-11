<?php

declare(strict_types=1);

namespace Dont\Exception;

use LogicException;

class ShouldNotUnserializeObject extends LogicException implements ExceptionInterface
{
    private const ERROR_TEMPLATE = <<<'ERROR'
The given object %s#%s is not designed to be deserialized, yet deserialization was attempted using
 the `unserialize` funtion.

This error is raised because the author of %s didn't design it to be deserialized, nor can guarantee 
that all its internal components are deserializable. 

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

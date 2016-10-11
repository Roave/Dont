<?php

declare(strict_types=1);

namespace Dont\Exception;

use LogicException;

class NonDeSerializableObject extends LogicException implements ExceptionInterface
{
    public static function fromAttemptedDeSerialization($object) : self
    {
        if (! is_object($object)) {
            throw TypeError::fromNonObject($object);
        }

        $template = <<<'ERROR'
The given object %s#%s is not designed to be de-serialized, yet de-serialization was attempted.

This error is raised because the author of %s didn't design it to be de-serializable, nor can
guarantee that it will function correctly after de-serialization, nor can guarantee that all
its internal components are de-serializable.

Please do not use unserialize() to produce %s instances.
ERROR;

        $className = get_class($object);

        return new self(sprintf(
            $template,
            $className,
            spl_object_hash($object),
            $className,
            $className
        ));
    }
}

<?php

declare(strict_types=1);

namespace Dont\Exception;

use LogicException;

class NonSerializableObject extends LogicException implements ExceptionInterface
{
    /**
     * @param object $object
     *
     * @return NonSerializableObject
     */
    public static function fromAttemptedSerialization($object) : self
    {
        $template = <<<'ERROR'
The given object %s#%s is not designed to be serialized, yet serialization was attempted.

This error is raised because the author of %s didn't design it to be serializable, nor can
guarantee that it will function correctly after serialization, nor can guarantee that all
its internal components are serializable.

Please do not serialize %s instances.
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

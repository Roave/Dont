<?php

declare(strict_types=1);

namespace Dont\Exception;

use LogicException;

class NonSerialisableObject extends LogicException implements ExceptionInterface
{
    /**
     * @param object $object
     *
     * @return NonSerialisableObject
     *
     * @throws TypeError
     */
    public static function fromAttemptedSerialisation($object) : self
    {
        if (! is_object($object)) {
            throw TypeError::fromNonObject($object);
        }

        $template = <<<'ERROR'
The given object %s#%s is not designed to be serialised, yet serialisation was attempted.

This error is raised because the author of %s didn't design it to be serialisable, nor can
guarantee that it will function correctly after serialisation, nor can guarantee that all
its internal components are serialisable.

Please do not serialise %s instances.
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

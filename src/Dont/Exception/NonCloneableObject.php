<?php

declare(strict_types=1);

namespace Dont\Exception;

use LogicException;

class NonCloneableObject extends LogicException implements ExceptionInterface
{
    private const ERROR_TEMPLATE = <<<'ERROR'
The given object %s#%s is not designed to be cloned, yet cloning was attempted.

This error is raised because the author of %s didn't design it to be cloneable, nor can
guarantee that it will function correctly after cloning, nor can guarantee that all
its internal components are cloneable.

Please do not clone %s instances.
ERROR;

    /**
     * @param object $object
     *
     * @return NonCloneableObject
     *
     * @throws TypeError
     */
    public static function fromAttemptedCloning($object) : self
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

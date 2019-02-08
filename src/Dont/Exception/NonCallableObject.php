<?php

declare(strict_types=1);

namespace Dont\Exception;

use LogicException;

class NonCallableObject extends LogicException implements ExceptionInterface
{
    private const ERROR_TEMPLATE = <<<'ERROR'
The given object %s#%s is not designed to allow any undefined or inaccessible methods to be called.

You tried to call a method called "%s".

Perhaps you made a typo in the method name, or tried to call an inaccessible method?
ERROR;

    /**
     * @param object $object
     * @throws TypeError
     */
    public static function fromAttemptedCall($object, string $property) : self
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

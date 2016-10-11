<?php

declare(strict_types=1);

namespace Dont\Exception;

use InvalidArgumentException;

class TypeError extends InvalidArgumentException implements ExceptionInterface
{
    /**
     * @param mixed $nonObject
     *
     * @return self
     */
    public static function fromNonObject($nonObject) : self
    {
        return new self(sprintf('Expected object to be given, found %s instead', gettype($nonObject)));
    }
}

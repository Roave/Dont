<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\NonSettableObject;
use Dont\Exception\TypeError;

trait DontSet
{
    /**
     * @throws NonSettableObject
     * @throws TypeError
     */
    final public function __set($propertyName, $newValue) : void
    {
        throw NonSettableObject::fromAttemptedSet($this, $propertyName);
    }
}

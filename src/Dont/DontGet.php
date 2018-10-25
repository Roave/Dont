<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\NonGettableObject;
use Dont\Exception\TypeError;

trait DontGet
{
    /**
     * @throws NonGettableObject
     * @throws TypeError
     */
    final public function __get($propertyName) : void
    {
        throw NonGettableObject::fromAttemptedGet($this, $propertyName);
    }
}

<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\NonCallableObject;
use Dont\Exception\TypeError;

trait DontCall
{
    /**
     * @throws NonCallableObject
     * @throws TypeError
     */
    final public function __call($name, $arguments)
    {
        throw NonCallableObject::fromAttemptedCall($this, $name);
    }
}

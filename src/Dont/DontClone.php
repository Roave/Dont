<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\NonCloneableObject;
use Dont\Exception\TypeError;

trait DontClone
{
    /**
     * @throws NonCloneableObject
     * @throws TypeError
     */
    final public function __clone()
    {
        throw NonCloneableObject::fromAttemptedCloning($this);
    }
}

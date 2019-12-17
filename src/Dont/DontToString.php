<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\NonCloneableObject;
use Dont\Exception\NonStringableObject;
use Dont\Exception\TypeError;

trait DontToString
{
    /**
     * @throws NonCloneableObject
     * @throws TypeError
     */
    final public function __toString() : string
    {
        throw NonStringableObject::fromAttemptedToString($this);
    }
}

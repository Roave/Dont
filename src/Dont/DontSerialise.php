<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\NonSerialisableObject;
use Dont\Exception\TypeError;

trait DontSerialise
{
    /**
     * @throws NonSerialisableObject
     * @throws TypeError
     */
    final public function __sleep() : void
    {
        throw NonSerialisableObject::fromAttemptedSerialisation($this);
    }
}

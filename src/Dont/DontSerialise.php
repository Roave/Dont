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
    final public function __sleep() : array
    {
        throw NonSerialisableObject::fromAttemptedSerialisation($this);
    }

    /**
     * @throws NonSerialisableObject
     * @throws TypeError
     */
    final public function __serialize() : array
    {
        throw NonSerialisableObject::fromAttemptedSerialisation($this);
    }

    /**
     * @throws NonSerialisableObject
     * @throws TypeError
     */
    final public function serialize() : void
    {
        throw NonSerialisableObject::fromAttemptedSerialisation($this);
    }
}

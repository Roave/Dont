<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\NonSerialisableObject;
use Dont\Exception\TypeError;

trait DontSerialise
{
    /**
     * @return void
     *
     * @throws NonSerialisableObject
     * @throws TypeError
     */
    final public function __sleep()
    {
        throw NonSerialisableObject::fromAttemptedSerialisation($this);
    }
}

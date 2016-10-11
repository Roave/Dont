<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\NonDeserialisableObject;
use Dont\Exception\TypeError;

trait DontDeserialise
{
    /**
     * @throws NonDeserialisableObject
     * @throws TypeError
     */
    final public function __wakeup() : void
    {
        throw NonDeserialisableObject::fromAttemptedDeSerialisation($this);
    }
}

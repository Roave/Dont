<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\NonDeserialisableObject;
use Dont\Exception\TypeError;

trait DontDeserialise
{
    /**
     * @return void
     *
     * @throws NonDeserialisableObject
     * @throws TypeError
     */
    final public function __wakeup()
    {
        throw NonDeserialisableObject::fromAttemptedDeSerialisation($this);
    }
}

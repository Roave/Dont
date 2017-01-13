<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\ShouldNotUnserializeObject;
use Dont\Exception\TypeError;

trait DontDeserialise
{
    /**
     * @throws ShouldNotUnserializeObject
     * @throws TypeError
     */
    final public function __wakeup() : void
    {
        throw ShouldNotUnserializeObject::fromAttemptedDeSerialisation($this);
    }
}

<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\NonDeSerializableObject;
use Dont\Exception\TypeError;

trait DontDeSerialize
{
    /**
     * @return void
     *
     * @throws NonDeSerializableObject
     * @throws TypeError
     */
    final public function __wakeup()
    {
        throw NonDeSerializableObject::fromAttemptedDeSerialization($this);
    }
}

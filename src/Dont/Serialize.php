<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\NonSerializableObject;
use Dont\Exception\TypeError;

trait Serialize
{
    /**
     * @return void
     *
     * @throws NonSerializableObject
     * @throws TypeError
     */
    final public function __sleep()
    {
        throw NonSerializableObject::fromAttemptedSerialization($this);
    }
}

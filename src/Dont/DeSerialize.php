<?php

declare(strict_types=1);

namespace Dont;

use Dont\Exception\NonDeSerializableObject;
use Dont\Exception\TypeError;

trait DeSerialize
{
    /**
     * @return void
     *
     * @throws NonDeSerializableObject
     * @throws TypeError
     */
    public function __wakeup()
    {
        throw NonDeSerializableObject::fromAttemptedDeSerialization($this);
    }
}

<?php

declare(strict_types=1);

namespace DontTestAsset;

use Dont;

final class NonDeSerializable
{
    use Dont\DeSerialize;
}

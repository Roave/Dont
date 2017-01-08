<?php

declare(strict_types=1);

namespace DontTestAsset;

use Dont\DontClone;

final class NonCloneable
{
    use DontClone;
}

<?php

declare(strict_types=1);

namespace DontTestAsset;

use Dont\DontGet;
use Dont\DontSet;

final class NotGetOrSettable
{
    use DontGet;
    use DontSet;
}

<?php

declare(strict_types=1);

namespace DontTestAsset;

use Dont\DontInstantiate;

final class NonInstantiatable
{
    use DontInstantiate;
}

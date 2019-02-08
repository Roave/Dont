<?php

declare(strict_types=1);

namespace DontTestAsset;

use Dont\DontCallStatic;

final class NonStaticCallable
{
    use DontCallStatic;
}

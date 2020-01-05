<?php

declare(strict_types=1);

namespace DontTestAsset;

use Dont\DontDeserialise;
use Dont\DontSerialise;

final class NonDeserialisableImplementingSerialisable
{
    use DontDeserialise;
    use DontSerialise;
}

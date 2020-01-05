<?php

declare(strict_types=1);

namespace DontTestAsset;

use Dont\DontDeserialise;
use Dont\DontSerialise;

final class NonDeserialisableImplementingSerialisable implements \Serialisable
{
    use DontDeserialise;
    use DontSerialise;
}

<?php

declare(strict_types=1);

namespace DontTestAsset;

use Dont\DontDeserialise;
use Dont\DontSerialise;

final class NonDeserialisableImplementingSerializable implements \Serializable
{
    use DontDeserialise;
    use DontSerialise;
}

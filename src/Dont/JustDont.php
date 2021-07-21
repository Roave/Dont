<?php

declare(strict_types=1);

namespace Dont;

trait JustDont
{
    use DontGet;
    use DontSet;
    use DontCall;
    use DontCallStatic;
    use DontClone;
    use DontSerialise;
    use DontDeserialise;
}

<?php

declare(strict_types=1);

namespace DontTest;

use Dont\Exception\NonSerialisableObject;
use Dont\DontSerialise;
use DontTestAsset\NotSerialisable;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Dont\DontSerialise
 */
final class DontSerialiseTest extends TestCase
{
    public function testWillThrowOnSerialisationAttempt() : void
    {
        $object = new NotSerialisable();

        $this->expectException(NonSerialisableObject::class);

        serialize($object);
    }

    public function testSerialisePreventionIsFinal() : void
    {
        self::assertTrue((new \ReflectionMethod(DontSerialise::class, '__sleep'))->isFinal());
    }
}

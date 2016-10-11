<?php

declare(strict_types=1);

namespace DontTest;

use Dont\Exception\NonSerialisableObject;
use Dont\DontSerialise;
use DontTestAsset\NotSerialisable;

/**
 * @covers \Dont\DontSerialise
 */
final class DontSerialiseTest extends \PHPUnit_Framework_TestCase
{
    public function testWillThrowOnSerialisationAttempt()
    {
        $object = new NotSerialisable();

        $this->expectException(NonSerialisableObject::class);

        serialize($object);
    }

    public function testSerialisePreventionIsFinal()
    {
        self::assertTrue((new \ReflectionMethod(DontSerialise::class, '__sleep'))->isFinal());
    }
}

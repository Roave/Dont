<?php

declare(strict_types=1);

namespace DontTest;

use Dont\Exception\NonSerializableObject;
use Dont\DontSerialize;
use DontTestAsset\NotSerializable;

/**
 * @covers \Dont\DontSerialize
 */
final class DontSerializeTest extends \PHPUnit_Framework_TestCase
{
    public function testWillThrowOnSerializationAttempt()
    {
        $object = new NotSerializable();

        $this->expectException(NonSerializableObject::class);

        serialize($object);
    }

    public function testSerializePreventionIsFinal()
    {
        self::assertTrue((new \ReflectionMethod(DontSerialize::class, '__sleep'))->isFinal());
    }
}

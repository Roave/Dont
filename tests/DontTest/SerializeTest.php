<?php

declare(strict_types=1);

namespace DontTest;

use Dont\Exception\NonSerializableObject;
use Dont\Serialize;
use DontTestAsset\NotSerializable;

/**
 * @covers \Dont\Serialize
 */
final class SerializeTest extends \PHPUnit_Framework_TestCase
{
    public function testWillThrowOnSerializationAttempt()
    {
        $object = new NotSerializable();

        $this->expectException(NonSerializableObject::class);

        serialize($object);
    }

    public function testSerializePreventionIsFinal()
    {
        self::assertTrue((new \ReflectionMethod(Serialize::class, '__sleep'))->isFinal());
    }
}

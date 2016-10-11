<?php

declare(strict_types=1);

namespace DontTest;

use Dont\Exception\NonSerializableObject;
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
}

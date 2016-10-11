<?php

declare(strict_types=1);

namespace DontTest;

use Dont\DeSerialize;
use Dont\Exception\NonDeSerializableObject;

/**
 * @covers \Dont\DeSerialize
 */
final class DeSerializeTest extends \PHPUnit_Framework_TestCase
{
    public function testWillThrowOnSerializationAttempt()
    {
        $this->expectException(NonDeSerializableObject::class);

        unserialize('O:31:"DontTestAsset\NonDeSerializable":0:{}');
    }
}

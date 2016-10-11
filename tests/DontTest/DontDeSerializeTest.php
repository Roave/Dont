<?php

declare(strict_types=1);

namespace DontTest;

use Dont\DontDeSerialize;
use Dont\Exception\NonDeSerializableObject;

/**
 * @covers \Dont\DontDeSerialize
 */
final class DontDeSerializeTest extends \PHPUnit_Framework_TestCase
{
    public function testWillThrowOnSerializationAttempt()
    {
        $this->expectException(NonDeSerializableObject::class);

        unserialize('O:31:"DontTestAsset\NonDeSerializable":0:{}');
    }

    public function testSerializePreventionIsFinal()
    {
        self::assertTrue((new \ReflectionMethod(DontDeSerialize::class, '__wakeup'))->isFinal());
    }
}

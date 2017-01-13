<?php

declare(strict_types=1);

namespace DontTest;

use Dont\DontDeserialise;
use Dont\Exception\ShouldNotUnserializeObject;

/**
 * @covers \Dont\DontDeserialise
 */
final class DontDeserialiseTest extends \PHPUnit_Framework_TestCase
{
    public function testWillThrowOnSerialisationAttempt() : void
    {
        $this->expectException(ShouldNotUnserializeObject::class);

        unserialize('O:31:"DontTestAsset\NonDeserialisable":0:{}');
    }

    public function testSerialisePreventionIsFinal() : void
    {
        self::assertTrue((new \ReflectionMethod(DontDeserialise::class, '__wakeup'))->isFinal());
    }
}

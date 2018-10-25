<?php

declare(strict_types=1);

namespace DontTest;

use Dont\DontGet;
use Dont\Exception\NonGettableObject;
use DontTestAsset\NotGetOrSettable;

/**
 * @covers \Dont\DontGet
 */
final class DontGetTest extends \PHPUnit_Framework_TestCase
{
    public function testWillThrowOnSerialisationAttempt() : void
    {
        $object = new NotGetOrSettable();

        $this->expectException(NonGettableObject::class);

        $object->undefinedProperty;
    }

    public function testGetIsFinal() : void
    {
        self::assertTrue((new \ReflectionMethod(DontGet::class, '__get'))->isFinal());
    }
}

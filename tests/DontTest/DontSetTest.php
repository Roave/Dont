<?php

declare(strict_types=1);

namespace DontTest;

use Dont\DontSet;
use Dont\Exception\NonSettableObject;
use DontTestAsset\NotGetOrSettable;

/**
 * @covers \Dont\DontSet
 */
final class DontSetTest extends \PHPUnit_Framework_TestCase
{
    public function testWillThrowOnSerialisationAttempt() : void
    {
        $object = new NotGetOrSettable();

        $this->expectException(NonSettableObject::class);

        $object->undefinedProperty = 1;
    }

    public function testGetIsFinal() : void
    {
        self::assertTrue((new \ReflectionMethod(DontSet::class, '__set'))->isFinal());
    }
}

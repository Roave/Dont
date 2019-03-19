<?php

declare(strict_types=1);

namespace DontTest;

use Dont\DontSet;
use Dont\Exception\NonSettableObject;
use DontTestAsset\DontDoIt;
use DontTestAsset\NotGetOrSettable;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Dont\DontSet
 */
final class DontSetTest extends TestCase
{
    /**
     * @dataProvider notGetOrSettableObject
     *
     * @param object $object
     */
    public function testWillThrowOnSerialisationAttempt($object) : void
    {
        $this->expectException(NonSettableObject::class);

        $object->undefinedProperty = 1;
    }

    /**
     * @return object[]
     */
    public function notGetOrSettableObject() : array
    {
        return [
            [new NotGetOrSettable()],
            [new DontDoIt()],
        ];
    }

    public function testGetIsFinal() : void
    {
        self::assertTrue((new \ReflectionMethod(DontSet::class, '__set'))->isFinal());
    }
}

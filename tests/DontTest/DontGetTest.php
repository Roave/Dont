<?php

declare(strict_types=1);

namespace DontTest;

use Dont\DontGet;
use Dont\Exception\NonGettableObject;
use DontTestAsset\DontDoIt;
use DontTestAsset\NotGetOrSettable;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Dont\DontGet
 */
final class DontGetTest extends TestCase
{
    /**
     * @dataProvider notGetOrSettableObject
     *
     * @param object $object
     */
    public function testWillThrowOnSerialisationAttempt($object) : void
    {
        $this->expectException(NonGettableObject::class);

        $object->undefinedProperty;
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
        self::assertTrue((new \ReflectionMethod(DontGet::class, '__get'))->isFinal());
    }
}

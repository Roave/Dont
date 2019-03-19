<?php

declare(strict_types=1);

namespace DontTest;

use Dont\Exception\NonCloneableObject;
use Dont\DontClone;
use DontTestAsset\NonCloneable;
use DontTestAsset\DontDoIt;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Dont\DontClone
 */
final class DontCloneTest extends TestCase
{
    /**
     * @dataProvider nonCloneableObject
     *
     * @param object $object
     */
    public function testWillThrowOnCloningAttempt($object) : void
    {
        $this->expectException(NonCloneableObject::class);

        $clonedObject = clone $object;
    }

    /**
     * @return object[]
     */
    public function nonCloneableObject() : array
    {
        return [
            [new NonCloneable()],
            [new DontDoIt()],
        ];
    }

    public function testClonePreventionIsFinal() : void
    {
        self::assertTrue((new \ReflectionMethod(DontClone::class, '__clone'))->isFinal());
    }
}

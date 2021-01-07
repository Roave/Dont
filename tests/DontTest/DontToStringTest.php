<?php

declare(strict_types=1);

namespace DontTest;

use Dont\DontToString;
use Dont\Exception\NonStringableObject;
use DontTestAsset\DontDoIt;
use DontTestAsset\NonStringable;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Dont\DontToString
 */
final class DontToStringTest extends TestCase
{
    /**
     * @dataProvider nonStringableObject
     *
     * @param object $object
     */
    public function testWillThrowOnToStringMethodAttempt($object) : void
    {
        $this->expectException(NonStringableObject::class);

        $object->__toString();
    }

    /**
     * @dataProvider nonStringableObject
     *
     * @param object $object
     */
    public function testWillThrowOnStringCastAttempt($object) : void
    {
        $this->expectException(NonStringableObject::class);

        (string) $object;
    }

    /**
     * @return object[]
     */
    public function nonStringableObject() : array
    {
        return [
            [new NonStringable()],
            [new DontDoIt()],
        ];
    }

    public function testToStringPreventionIsFinal() : void
    {
        self::assertTrue((new \ReflectionMethod(DontToString::class, '__toString'))->isFinal());
    }
}

<?php

declare(strict_types=1);

namespace DontTest;

use Dont\DontCall;
use Dont\Exception\NonCallableObject;
use DontTestAsset\NonCallable;
use DontTestAsset\DontDoIt;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Dont\DontCall
 */
final class DontCallTest extends TestCase
{
    /**
     * @dataProvider nonCloneableObject
     *
     * @param object $object
     */
    public function testWillThrowOnCallingAttempt($object) : void
    {
        $this->expectException(NonCallableObject::class);

        $object->undefinedMethod();
    }

    /**
     * @return object[]
     */
    public function nonCloneableObject() : array
    {
        return [
            [new NonCallable()],
            [new DontDoIt()],
        ];
    }

    public function testCallPreventionIsFinal() : void
    {
        self::assertTrue((new \ReflectionMethod(DontCall::class, '__call'))->isFinal());
    }
}

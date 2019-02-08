<?php

declare(strict_types=1);

namespace DontTest;

use Dont\DontCall;
use Dont\Exception\NonCallableObject;
use DontTestAsset\NonCallable;
use PHPUnit\Framework\TestCase;

/**
 * @covers DontCall
 */
final class DontCallTest extends TestCase
{
    public function testWillThrowOnCallingAttempt() : void
    {
        $object = new NonCallable();

        $this->expectException(NonCallableObject::class);

         $object->undefinedMethod();
    }

    public function testCallPreventionIsFinal() : void
    {
        self::assertTrue((new \ReflectionMethod(DontCall::class, '__call'))->isFinal());
    }
}

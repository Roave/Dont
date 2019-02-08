<?php

declare(strict_types=1);

namespace DontTest;

use Dont\DontCallStatic;
use Dont\Exception\NonStaticCallableClass;
use DontTestAsset\NonStaticCallable;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Dont\DontCallStatic
 */
final class DontCallStaticTest extends TestCase
{
    public function testWillThrowOnStaticCallAttempt() : void
    {
        $this->expectException(NonStaticCallableClass::class);

        NonStaticCallable::undefinedMethod();
    }

    public function testCallStaticPreventionIsFinal() : void
    {
        self::assertTrue((new \ReflectionMethod(DontCallStatic::class, '__callStatic'))->isFinal());
    }
}

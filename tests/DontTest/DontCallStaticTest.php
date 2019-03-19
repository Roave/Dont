<?php

declare(strict_types=1);

namespace DontTest;

use Dont\DontCallStatic;
use Dont\Exception\NonStaticCallableClass;
use DontTestAsset\DontDoIt;
use DontTestAsset\NonStaticCallable;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Dont\DontCallStatic
 */
final class DontCallStaticTest extends TestCase
{
    /**
     * @dataProvider NonStaticCallableObject
     *
     * @param string $className
     */
    public function testWillThrowOnStaticCallAttempt($className) : void
    {
        $this->expectException(NonStaticCallableClass::class);
        $this->expectExceptionMessage($className);

        $className::undefinedMethod();
    }

    /**
     * @return string[]
     */
    public function NonStaticCallableObject() : array
    {
        return [
            [NonStaticCallable::class],
            [DontDoIt::class],
        ];
    }

    public function testCallStaticPreventionIsFinal() : void
    {
        self::assertTrue((new \ReflectionMethod(DontCallStatic::class, '__callStatic'))->isFinal());
    }
}

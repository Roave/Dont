<?php

declare(strict_types=1);

namespace DontTest\Exception;

use Dont\Exception\ExceptionInterface;
use Dont\Exception\NonStaticCallableClass;
use LogicException;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @covers \Dont\Exception\NonStaticCallableClass
 */
final class NonStaticCallableClassTest extends TestCase
{
    /**
     * @dataProvider objectProvider
     */
    public function testFromAttemptedCall(string $class) : void
    {
        $exception = NonStaticCallableClass::fromAttemptedStaticCall($class, 'methodName');

        self::assertInstanceOf(NonStaticCallableClass::class, $exception);
        self::assertInstanceOf(LogicException::class, $exception);
        self::assertInstanceOf(ExceptionInterface::class, $exception);

        $expected = 'The given class ' . $class
            . " is not designed to allow any undefined or inaccessible static methods to be called.\n\n"
            . 'You tried to call a static method called "methodName".' . "\n\n"
            . 'Perhaps you made a typo in the method name, or tried to call an inaccessible method?';

        self::assertSame($expected, $exception->getMessage());
    }

    /**
     * @return string[][]
     */
    public function objectProvider() : array
    {
        return [
            [stdClass::class],
            ['Dont\Call\Me\Maybe'],
            [self::class],
        ];
    }
}

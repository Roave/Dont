<?php

declare(strict_types=1);

namespace DontTest\Exception;

use Dont\Exception\ExceptionInterface;
use Throwable;

/**
 * @covers \Dont\Exception\ExceptionInterface
 */
final class ExceptionInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function testIsThrowable() : void
    {
        self::assertSame(
            [Throwable::class],
            (new \ReflectionClass(ExceptionInterface::class))->getInterfaceNames()
        );
    }

    public function testIsInterface() : void
    {
        self::assertTrue(interface_exists(ExceptionInterface::class));
    }
}

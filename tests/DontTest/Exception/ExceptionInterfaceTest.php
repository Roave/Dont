<?php

declare(strict_types=1);

namespace DontTest;

use Dont\Exception\ExceptionInterface;
use Throwable;

/**
 * @covers \Dont\Exception\ExceptionInterface
 */
final class ExceptionInterfaceTest extends \PHPUnit_Framework_TestCase
{
    public function testIsThrowable()
    {
        self::assertInstanceOf(Throwable::class, $this->createMock(ExceptionInterface::class));
    }

    public function testIsInterface()
    {
        self::assertTrue(interface_exists(ExceptionInterface::class));
    }
}

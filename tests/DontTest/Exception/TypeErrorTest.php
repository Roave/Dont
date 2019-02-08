<?php

declare(strict_types=1);

namespace DontTest\Exception;

use Dont\Exception\ExceptionInterface;
use Dont\Exception\TypeError;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Dont\Exception\TypeError
 */
final class TypeErrorTest extends TestCase
{
    /**
     * @dataProvider nonObjectProvider
     *
     * @param mixed $nonObject
     */
    public function testFromNonObject($nonObject) : void
    {
        $exception = TypeError::fromNonObject($nonObject);

        self::assertInstanceOf(TypeError::class, $exception);
        self::assertInstanceOf(\InvalidArgumentException::class, $exception);
        self::assertInstanceOf(ExceptionInterface::class, $exception);

        self::assertSame(
            'Expected object to be given, found ' . gettype($nonObject) . ' instead',
            $exception->getMessage()
        );
    }

    /**
     * @return mixed[][]
     */
    public function nonObjectProvider() : array
    {
        return [
            [null],
            [true],
            [123],
            [12.3],
            ['foo'],
            [[]],
            [STDERR],
        ];
    }
}

<?php

declare(strict_types=1);

namespace DontTest\Exception;

use Dont\Exception\ExceptionInterface;
use Dont\Exception\NonCloneableObject;
use Dont\Exception\NonStringableObject;
use Dont\Exception\TypeError;
use LogicException;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @covers \Dont\Exception\NonStringableObject
 */
final class NonStringableObjectTest extends TestCase
{
    /**
     * @dataProvider objectProvider
     *
     * @param object $object
     */
    public function testFromAttemptedCloning($object) : void
    {
        $exception = NonStringableObject::fromAttemptedToString($object);

        self::assertInstanceOf(NonStringableObject::class, $exception);
        self::assertInstanceOf(LogicException::class, $exception);
        self::assertInstanceOf(ExceptionInterface::class, $exception);

        $expected = 'The given object ' . get_class($object)
            . '#' . spl_object_hash($object) . " is not designed to be stringable.\n\n"
            . "You tried to access a method called \"__toString()\".";

        self::assertSame($expected, $exception->getMessage());
    }

    /**
     * @return object[][]
     */
    public function objectProvider() : array
    {
        return [
            [new stdClass()],
            [$this],
        ];
    }
}

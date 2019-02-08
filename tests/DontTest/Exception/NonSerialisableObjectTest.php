<?php

declare(strict_types=1);

namespace DontTest\Exception;

use Dont\Exception\ExceptionInterface;
use Dont\Exception\NonSerialisableObject;
use Dont\Exception\TypeError;
use LogicException;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @covers \Dont\Exception\NonSerialisableObject
 */
final class NonSerialisableObjectTest extends TestCase
{
    /**
     * @dataProvider objectProvider
     *
     * @param object $object
     */
    public function testFromAttemptedSerialisation($object) : void
    {
        $exception = NonSerialisableObject::fromAttemptedSerialisation($object);

        self::assertInstanceOf(NonSerialisableObject::class, $exception);
        self::assertInstanceOf(LogicException::class, $exception);
        self::assertInstanceOf(ExceptionInterface::class, $exception);

        $expected = 'The given object ' . get_class($object)
            . '#' . spl_object_hash($object) . " is not designed to be serialised, yet serialisation was attempted.\n\n"
            . 'This error is raised because the author of ' . get_class($object)
            . " didn't design it to be serialisable, nor can\n"
            . "guarantee that it will function correctly after serialisation, nor can guarantee that all\n"
            . "its internal components are serialisable.\n\n"
            . 'Please do not serialise ' . get_class($object) . ' instances.';

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

    /**
     * @dataProvider nonObjectProvider
     *
     * @param mixed $nonObject
     */
    public function testWillThrowOnNonObject($nonObject) : void
    {
        $this->expectException(TypeError::class);

        NonSerialisableObject::fromAttemptedSerialisation($nonObject);
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

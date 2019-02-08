<?php

declare(strict_types=1);

namespace DontTest\Exception;

use Dont\Exception\ExceptionInterface;
use Dont\Exception\NonDeserialisableObject;
use Dont\Exception\TypeError;
use LogicException;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @covers \Dont\Exception\NonDeserialisableObject
 */
final class NonDeserialisableObjectTest extends TestCase
{
    /**
     * @dataProvider objectProvider
     *
     * @param object $object
     */
    public function testFromAttemptedDeSerialisation($object) : void
    {
        $exception = NonDeserialisableObject::fromAttemptedDeSerialisation($object);

        self::assertInstanceOf(NonDeserialisableObject::class, $exception);
        self::assertInstanceOf(LogicException::class, $exception);
        self::assertInstanceOf(ExceptionInterface::class, $exception);

        $expected = 'The given object ' . get_class($object)
            . '#' . spl_object_hash($object) . ' is not designed to be deserialised, '
            . "yet deserialisation was attempted.\n\n"
            . 'This error is raised because the author of ' . get_class($object)
            . " didn't design it to be deserialisable, nor can\n"
            . "guarantee that it will function correctly after deserialisation, nor can guarantee that all\n"
            . "its internal components are deserialisable.\n\n"
            . 'Please do not use unserialize() to produce ' . get_class($object) . ' instances.';

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

        NonDeserialisableObject::fromAttemptedDeSerialisation($nonObject);
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

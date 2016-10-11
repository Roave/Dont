<?php

declare(strict_types=1);

namespace DontTest\Exception;

use Dont\Exception\ExceptionInterface;
use Dont\Exception\NonDeSerializableObject;
use Dont\Exception\TypeError;
use LogicException;
use stdClass;

/**
 * @covers \Dont\Exception\NonDeSerializableObject
 */
final class NonDeSerializableObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider objectProvider
     *
     * @param object $object
     *
     * @return void
     */
    public function testFromAttemptedDeSerialization($object)
    {
        $exception = NonDeSerializableObject::fromAttemptedDeSerialization($object);

        self::assertInstanceOf(NonDeSerializableObject::class, $exception);
        self::assertInstanceOf(LogicException::class, $exception);
        self::assertInstanceOf(ExceptionInterface::class, $exception);

        $expected = 'The given object ' . get_class($object)
            . '#' . spl_object_hash($object) . ' is not designed to be de-serialized, '
            . "yet de-serialization was attempted.\n\n"
            . 'This error is raised because the author of ' . get_class($object)
            . " didn't design it to be de-serializable, nor can\n"
            . "guarantee that it will function correctly after de-serialization, nor can guarantee that all\n"
            . "its internal components are de-serializable.\n\n"
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
     *
     * @return void
     */
    public function testWillThrowOnNonObject($nonObject)
    {
        $this->expectException(TypeError::class);

        NonDeSerializableObject::fromAttemptedDeSerialization($nonObject);
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

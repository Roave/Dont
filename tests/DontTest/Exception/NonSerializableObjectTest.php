<?php

declare(strict_types=1);

namespace DontTest;

use Dont\Exception\ExceptionInterface;
use Dont\Exception\NonSerializableObject;
use LogicException;
use stdClass;

/**
 * @covers \Dont\Exception\NonSerializableObject
 */
final class NonSerializableObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider objectProvider
     *
     * @param object $object
     *
     * @return void
     */
    public function testFromAttemptedSerialization($object)
    {
        $exception = NonSerializableObject::fromAttemptedSerialization($object);

        self::assertInstanceOf(NonSerializableObject::class, $exception);
        self::assertInstanceOf(LogicException::class, $exception);
        self::assertInstanceOf(ExceptionInterface::class, $exception);

        $expected = 'The given object ' . get_class($object)
            . '#' . spl_object_hash($object) . " is not designed to be serialized, yet serialization was attempted.\n\n"
            . 'This error is raised because the author of ' . get_class($object)
            . " didn't design it to be serializable, nor can\n"
            . "guarantee that it will function correctly after serialization, nor can guarantee that all\n"
            . "its internal components are serializable.\n\n"
            . 'Please do not serialize ' . get_class($object) . ' instances.';

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

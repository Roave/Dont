<?php

declare(strict_types=1);

namespace DontTest\Exception;

use Dont\Exception\ExceptionInterface;
use Dont\Exception\NonSettableObject;
use Dont\Exception\TypeError;
use LogicException;
use stdClass;

/**
 * @covers \Dont\Exception\NonSettableObject
 */
final class NonSettableObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider objectProvider
     *
     * @param object $object
     */
    public function testFromAttemptedSet($object) : void
    {
        $exception = NonSettableObject::fromAttemptedSet($object, 'propertyName');

        self::assertInstanceOf(NonSettableObject::class, $exception);
        self::assertInstanceOf(LogicException::class, $exception);
        self::assertInstanceOf(ExceptionInterface::class, $exception);

        $expected = 'The given object ' . get_class($object)
            . '#' . spl_object_hash($object) . " is not designed to allow any undefined or inaccessible properties to be written to.\n\n"
            . 'You tried to write to a property called "propertyName".' . "\n\n"
            . 'Perhaps you made a typo in the property name, or tried to write to an inaccessible property?';

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

        NonSettableObject::fromAttemptedSet($nonObject, 'propertyName');
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

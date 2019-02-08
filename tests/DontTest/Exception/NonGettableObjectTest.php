<?php

declare(strict_types=1);

namespace DontTest\Exception;

use Dont\Exception\ExceptionInterface;
use Dont\Exception\NonGettableObject;
use Dont\Exception\TypeError;
use LogicException;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @covers \Dont\Exception\NonGettableObject
 */
final class NonGettableObjectTest extends TestCase
{
    /**
     * @dataProvider objectProvider
     *
     * @param object $object
     */
    public function testFromAttemptedGet($object) : void
    {
        $exception = NonGettableObject::fromAttemptedGet($object, 'propertyName');

        self::assertInstanceOf(NonGettableObject::class, $exception);
        self::assertInstanceOf(LogicException::class, $exception);
        self::assertInstanceOf(ExceptionInterface::class, $exception);

        $expected = 'The given object ' . get_class($object)
            . '#' . spl_object_hash($object) . " is not designed to allow any undefined or inaccessible properties to be read from.\n\n"
            . 'You tried to access a property called "propertyName".' . "\n\n"
            . 'Perhaps you made a typo in the property name, or tried to access an inaccessible property?';

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

        NonGettableObject::fromAttemptedGet($nonObject, 'propertyName');
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

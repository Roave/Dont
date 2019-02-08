<?php

declare(strict_types=1);

namespace DontTest\Exception;

use Dont\Exception\ExceptionInterface;
use Dont\Exception\NonCloneableObject;
use Dont\Exception\TypeError;
use LogicException;
use PHPUnit\Framework\TestCase;
use stdClass;

/**
 * @covers \Dont\Exception\NonCloneableObject
 */
final class NonCloneableObjectTest extends TestCase
{
    /**
     * @dataProvider objectProvider
     *
     * @param object $object
     */
    public function testFromAttemptedCloning($object) : void
    {
        $exception = NonCloneableObject::fromAttemptedCloning($object);

        self::assertInstanceOf(NonCloneableObject::class, $exception);
        self::assertInstanceOf(LogicException::class, $exception);
        self::assertInstanceOf(ExceptionInterface::class, $exception);

        $expected = 'The given object ' . get_class($object)
            . '#' . spl_object_hash($object) . " is not designed to be cloned, yet cloning was attempted.\n\n"
            . 'This error is raised because the author of ' . get_class($object)
            . " didn't design it to be cloneable, nor can\n"
            . "guarantee that it will function correctly after cloning, nor can guarantee that all\n"
            . "its internal components are cloneable.\n\n"
            . 'Please do not clone ' . get_class($object) . ' instances.';

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

        NonCloneableObject::fromAttemptedCloning($nonObject);
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

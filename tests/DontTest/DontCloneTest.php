<?php

declare(strict_types=1);

namespace DontTest;

use Dont\Exception\NonCloneableObject;
use Dont\DontClone;
use DontTestAsset\NonCloneable;

/**
 * @covers \Dont\DontClone
 */
final class DontCloneTest extends \PHPUnit_Framework_TestCase
{
    public function testWillThrowOnCloningAttempt() : void
    {
        $object = new NonCloneable();

        $this->expectException(NonCloneableObject::class);

        $clonedObject = clone $object;
    }

    public function testClonePreventionIsFinal() : void
    {
        self::assertTrue((new \ReflectionMethod(DontClone::class, '__clone'))->isFinal());
    }
}

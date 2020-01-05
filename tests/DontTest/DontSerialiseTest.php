<?php

declare(strict_types=1);

namespace DontTest;

use Dont\Exception\NonSerialisableObject;
use Dont\DontSerialise;
use DontTestAsset\DontDoIt;
use DontTestAsset\NotSerialisable;
use DontTestAsset\NonDeserialisableImplementingSerializable;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Dont\DontSerialise
 */
final class DontSerialiseTest extends TestCase
{
    /**
     * @dataProvider nonSerialisableObject
     *
     * @param object $object
     */
    public function testWillThrowOnSerialisationAttempt($object) : void
    {
        $this->expectException(NonSerialisableObject::class);

        serialize($object);
    }

    /**
     * @return object[]
     */
    public function nonSerialisableObject() : array
    {
        return [
            [new NotSerialisable()],
            [new NonDeserialisableImplementingSerializable()],
            [new DontDoIt()],
        ];
    }

    public function testSerialisePreventionIsFinal() : void
    {
        self::assertTrue((new \ReflectionMethod(DontSerialise::class, '__sleep'))->isFinal());
        self::assertTrue((new \ReflectionMethod(DontSerialise::class, 'serialize'))->isFinal());
        self::assertTrue((new \ReflectionMethod(DontSerialise::class, '__serialize'))->isFinal());
    }

    public function testManuallyInvokingMethods() : void
    {
        $dont = new DontDoIt();

        try {
            $dont->__serialize();
            self::markAsFailed('This method must always throw');
        } catch (NonSerialisableObject $_) {
        }

        try {
            $dont->serialize();
            self::markAsFailed('This method must always throw');
        } catch (NonSerialisableObject $_) {
        }

        try {
            $dont->__sleep();
            self::markAsFailed('This method must always throw');
        } catch (NonSerialisableObject $_) {
        }

        self::assertTrue(true);
    }
}

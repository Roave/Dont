<?php

declare(strict_types=1);

namespace DontTest;

use DontTestAsset\NonInstantiatable;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Dont\DontInstantiate
 */
final class DontInstantiateTest extends TestCase
{
    public function testWillThrowOnInstantiationAttempt() : void
    {
        $this->expectException(\Error::class);

        new NonInstantiatable();
    }
}

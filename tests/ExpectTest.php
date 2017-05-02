<?php

use Dgame\Expectation\Expect;
use PHPUnit\Framework\TestCase;

final class ExpectTest extends TestCase
{
    public function testThat()
    {
        $this->assertEquals(42, Expect::that(42)->isInt()->else(null));
    }
}
<?php

use function Dgame\Expectation\expect;
use PHPUnit\Framework\TestCase;

final class ExpectationsTest extends TestCase
{
    public function testIsInt(): void
    {
        $this->assertEquals(42, expect(42)->isInt()->else(23));
        $this->assertEquals(1337, expect('foo')->isInt()->else(1337));
    }

    public function testIsFloat(): void
    {
        $this->assertEquals(4.2, expect(4.2)->isFloat()->else(2.3));
        $this->assertEquals(13.37, expect('foo')->isFloat()->else(13.37));
    }

    public function testIsScalar(): void
    {
        $this->assertEquals('bar', expect('bar')->isScalar()->else('foo'));
        $this->assertEquals(42, expect(42)->isScalar()->else('bar'));
    }

    public function testIsNumeric(): void
    {
        $this->assertEquals(42, expect(42)->isNumeric()->else('foo'));
        $this->assertEquals('1337', expect('1337')->isNumeric()->else('bar'));
    }

    public function testIsString(): void
    {
        $this->assertEquals('foo', expect('foo')->isString()->else('bar'));
        $this->assertEquals('bar', expect(42)->isString()->else('bar'));
    }

    public function testIsBool(): void
    {
        $this->assertTrue(expect(true)->isBool()->else(false));
        $this->assertFalse(expect(1)->isBool()->else(false));
    }

    public function testIsArray(): void
    {
        $this->assertEquals([1, 2, 3], expect([1, 2, 3])->isArray()->else([]));
        $this->assertEquals([2], expect('abc')->isArray()->else([2]));
        $this->assertEquals([], expect(null)->isArray()->else([]));
    }

    public function testIsObject(): void
    {
        $this->assertEquals($this, expect($this)->isObject()->else(null));
        $this->assertEquals(null, expect(null)->isObject()->else(null));
        $this->assertEquals(23, expect(42)->isObject()->else(23));
    }

    public function testIsInstanceOf(): void
    {
        $this->assertEquals($this, expect($this)->isInstanceOf(self::class)->else(null));
        $this->assertEquals(null, expect(new Exception())->isInstanceOf(self::class)->else(null));
        $this->assertEquals(null, expect(null)->isInstanceOf(self::class)->else(null));
    }

    public function testIsCallable(): void
    {
        $this->assertEquals('trim', expect('trim')->isCallable()->else(null));
        $this->assertEquals(null, expect('empty')->isCallable()->else(null));
    }

    public function testIsDir(): void
    {
        $this->assertEquals(__DIR__, expect(__DIR__)->isDir()->else('src'));
        $this->assertEquals('src', expect('test')->isDir()->else('src'));
    }

    public function testIsFile(): void
    {
        $this->assertEquals(__FILE__, expect(__FILE__)->isFile()->else(null));
        $this->assertEquals(null, expect('src')->isFile()->else(null));
    }

    public function testIsEmpty(): void
    {
        $this->assertEmpty(expect(null)->isEmpty()->else('abc'));
        $this->assertNull(expect('abc')->isEmpty()->else(null));
    }

    public function testIsNotEmpty(): void
    {
        $this->assertNotEmpty(expect(null)->isNotEmpty()->else('abc'));
        $this->assertNotNull(expect('abc')->isNotEmpty()->else(null));
    }

    public function testIsNull(): void
    {
        $this->assertNull(expect(null)->isNull()->else('abc'));
        $this->assertEquals('foobar', expect('abc')->isNull()->else('foobar'));
    }

    public function testIsNotNull(): void
    {
        $this->assertNotNull(expect(null)->isNotNull()->else('abc'));
        $this->assertNull(expect(null)->isNotNull()->else(null));
    }

    public function testIsTrue(): void
    {
        $this->assertTrue(expect(false)->isTrue()->else(true));
        $this->assertTrue(expect(true)->isTrue()->else(false));
        $this->assertFalse(expect(false)->isTrue()->else(false));
    }

    public function testIsFalse(): void
    {
        $this->assertFalse(expect(false)->isFalse()->else(true));
        $this->assertFalse(expect(true)->isFalse()->else(false));
        $this->assertTrue(expect(true)->isFalse()->else(true));
    }

    public function testIsEqual(): void
    {
        $this->assertEquals('abc', expect('abc')->isEqual('abc')->else('foo'));
        $this->assertEquals('42', expect('42')->isEqual('42')->else(null));
        $this->assertEquals(42, expect('42')->isEqual(42)->else(null));
    }

    public function testIsNotEqual(): void
    {
        $this->assertEquals('foo', expect('abc')->isNotEqual('abc')->else('foo'));
        $this->assertEquals(null, expect('42')->isNotEqual('42')->else(null));
        $this->assertEquals(42, expect('42')->isEqual(42)->else(null));
    }

    public function testIsIdenticalTo(): void
    {
        $this->assertEquals('abc', expect('abc')->isIdenticalTo('abc')->else('foo'));
        $this->assertEquals('42', expect('42')->isIdenticalTo('42')->else(null));
        $this->assertEquals(null, expect('42')->isIdenticalTo(42)->else(null));
        $this->assertEquals(42, expect(42)->isIdenticalTo(42)->else(null));
    }

    public function testIsNotIdenticalTo(): void
    {
        $this->assertEquals('foo', expect('abc')->isNotIdenticalTo('abc')->else('foo'));
        $this->assertEquals(null, expect('42')->isNotIdenticalTo('42')->else(null));
        $this->assertEquals('42', expect('42')->isNotIdenticalTo(42)->else(null));
        $this->assertEquals(null, expect(42)->isNotIdenticalTo(42)->else(null));
    }

    public function testIsBetween(): void
    {
        $this->assertEquals(7, expect(7)->isBetween(0, 8)->else(null));
        $this->assertEquals(7, expect(7)->isBetween(0, 7)->else(null));
        $this->assertEquals(0, expect(0)->isBetween(0, 7)->else(null));
        $this->assertEquals('nope', expect(12)->isBetween(15, 20)->else('nope'));
    }

    public function testhasLength(): void
    {
        $this->assertEquals('foo', expect('foo')->hasLength(3)->else('aye'));
        $this->assertEquals('nope', expect('foobar')->hasLength(4)->else('nope'));

        $this->assertEquals([1, 2, 3], expect([1, 2, 3])->hasLength(3)->else([]));
        $this->assertEquals([42, 23], expect([])->hasLength(2)->else([42, 23]));
    }

    public function testIsIn(): void
    {
        $this->assertEquals(42, expect(42)->isIn([1, 2, 23, 36, 42, 44, 48])->else(null));
        $this->assertEquals(42, expect(42)->isIn([1, 2, 23, 36, 42])->else(null));
        $this->assertEquals(null, expect(42)->isIn([1, 2, 23, 36])->else(null));
    }

    public function testIsKeyOf(): void
    {
        $this->assertEquals('foo', expect('foo')->isKeyOf(['a' => 23, 'foo' => 42])->else(null));
        $this->assertEquals(null, expect('foo')->isKeyOf(['a' => 23])->else(null));
    }

    public function testIsBelow(): void
    {
        $this->assertEquals(3, expect(3)->isBelow(4)->else(42));
        $this->assertEquals(42, expect(6)->isBelow(4)->else(42));
    }

    public function testIsAbove(): void
    {
        $this->assertEquals(42, expect(3)->isAbove(4)->else(42));
        $this->assertEquals(6, expect(6)->isAbove(4)->else(42));
    }

    public function testIsBelowOrEqual(): void
    {
        $this->assertEquals(23, expect(23)->isBelowOrEqual(23)->else(null));
        $this->assertEquals(23, expect(23)->isBelowOrEqual(42)->else(null));
        $this->assertEquals(null, expect(23)->isBelowOrEqual(22)->else(null));
    }

    public function testIsAboveOrEqual(): void
    {
        $this->assertEquals(42, expect(42)->isAboveOrEqual(42)->else(null));
        $this->assertEquals(42, expect(42)->isAboveOrEqual(23)->else(null));
        $this->assertEquals(null, expect(42)->isAboveOrEqual(256)->else(null));
    }

    public function testIsPositive(): void
    {
        $this->assertEquals(42, expect(-1)->isPositive()->else(42));
        $this->assertEquals(0, expect(0)->isPositive()->else(42));
    }

    public function testIsNegative(): void
    {
        $this->assertEquals(-1, expect(-1)->isNegative()->else(42));
        $this->assertEquals(42, expect(0)->isNegative()->else(42));
    }

    public function testIsEven(): void
    {
        $this->assertEquals(42, expect(42)->isEven()->else(23));
        $this->assertEquals(42, expect(23)->isEven()->else(42));
    }

    public function testIsOdd(): void
    {
        $this->assertEquals(23, expect(42)->isOdd()->else(23));
        $this->assertEquals(23, expect(23)->isOdd()->else(42));
    }

    public function testMatch(): void
    {
        $this->assertEquals('abc', expect('abc')->match('/a*b{1}c?d?/')->else('foo'));
        $this->assertEquals('foo', expect('ac')->match('/a*b{1}c?d?/')->else('foo'));
    }

    public function testThen(): void
    {
        $this->assertEquals('foo', expect(42)->isEven()->then('foo'));
        $this->assertEquals(42, expect(42)->isOdd()->then('foo'));
    }
}
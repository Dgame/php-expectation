# php-expectation

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Dgame/php-expectation/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Dgame/php-expectation/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Dgame/php-expectation/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Dgame/php-expectation/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Dgame/php-expectation/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Dgame/php-expectation/build-status/master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/35671c67-e23e-4a58-8d81-dcc47ed87b5b/mini.png)](https://insight.sensiolabs.com/projects/35671c67-e23e-4a58-8d81-dcc47ed87b5b)
[![StyleCI](https://styleci.io/repos/89742806/shield?branch=master)](https://styleci.io/repos/89742806)
[![Build Status](https://travis-ci.org/Dgame/php-expectation.svg?branch=master)](https://travis-ci.org/Dgame/php-expectation)

----

Bind expectations to your values and offer default values if the expectation don't apply.

## isInt
```php
$this->assertEquals(42, expect(42)->isInt()->else(23));
$this->assertEquals(1337, expect('foo')->isInt()->else(1337));
```

## isFloat
```php
$this->assertEquals(4.2, expect(4.2)->isFloat()->else(2.3));
$this->assertEquals(13.37, expect('foo')->isFloat()->else(13.37));
```

## isScalar
```php
$this->assertEquals('bar', expect('bar')->isScalar()->else('foo'));
$this->assertEquals(42, expect(42)->isScalar()->else('bar'));
```

## isNumeric
```php
$this->assertEquals(42, expect(42)->isNumeric()->else('foo'));
$this->assertEquals('1337', expect('1337')->isNumeric()->else('bar'));
```

## isString
```php
$this->assertEquals('foo', expect('foo')->isString()->else('bar'));
$this->assertEquals('bar', expect(42)->isString()->else('bar'));
```

## isBool
```php
$this->assertTrue(expect(true)->isBool()->else(false));
$this->assertFalse(expect(1)->isBool()->else(false));
```

## isArray
```php
$this->assertEquals([1, 2, 3], expect([1, 2, 3])->isArray()->else([]));
$this->assertEquals([2], expect('abc')->isArray()->else([2]));
$this->assertEquals([], expect(null)->isArray()->else([]));
```

## isObject
```php
$this->assertEquals($this, expect($this)->isObject()->else(null));
$this->assertEquals(null, expect(null)->isObject()->else(null));
$this->assertEquals(23, expect(42)->isObject()->else(23));
```

## isInstanceOf
```php
$this->assertEquals($this, expect($this)->isInstanceOf(self::class)->else(null));
$this->assertEquals(null, expect(new Exception())->isInstanceOf(self::class)->else(null));
$this->assertEquals(null, expect(null)->isInstanceOf(self::class)->else(null));
```

## isCallable
```php
$this->assertEquals('trim', expect('trim')->isCallable()->else(null));
$this->assertEquals(null, expect('empty')->isCallable()->else(null));
```

## isDir
```php
$this->assertEquals(__DIR__, expect(__DIR__)->isDir()->else('src'));
$this->assertEquals('src', expect('test')->isDir()->else('src'));
```

## isFile
```php
$this->assertEquals(__FILE__, expect(__FILE__)->isFile()->else(null));
$this->assertEquals(null, expect('src')->isFile()->else(null));
```

## isEmpty
```php
$this->assertEmpty(expect(null)->isEmpty()->else('abc'));
$this->assertNull(expect('abc')->isEmpty()->else(null));
```

## isNotEmpty
```php
$this->assertNotEmpty(expect(null)->isNotEmpty()->else('abc'));
$this->assertNotNull(expect('abc')->isNotEmpty()->else(null));
```

## isNull
```php
$this->assertNull(expect(null)->isNull()->else('abc'));
$this->assertEquals('foobar', expect('abc')->isNull()->else('foobar'));
```

## isNotNull
```php
$this->assertNotNull(expect(null)->isNotNull()->else('abc'));
$this->assertNull(expect(null)->isNotNull()->else(null));
```

## isTrue
```php
$this->assertTrue(expect(false)->isTrue()->else(true));
$this->assertTrue(expect(true)->isTrue()->else(false));
$this->assertFalse(expect(false)->isTrue()->else(false));
```

## isFalse
```php
$this->assertFalse(expect(false)->isFalse()->else(true));
$this->assertFalse(expect(true)->isFalse()->else(false));
$this->assertTrue(expect(true)->isFalse()->else(true));
```

## isEqual
```php
$this->assertEquals('abc', expect('abc')->isEqual('abc')->else('foo'));
$this->assertEquals('42', expect('42')->isEqual('42')->else(null));
$this->assertEquals(42, expect('42')->isEqual(42)->else(null));
```

## isNotEqual
```php
$this->assertEquals('foo', expect('abc')->isNotEqual('abc')->else('foo'));
$this->assertEquals(null, expect('42')->isNotEqual('42')->else(null));
$this->assertEquals(42, expect('42')->isEqual(42)->else(null));
```

## isIdenticalTo
```php
$this->assertEquals('abc', expect('abc')->isIdenticalTo('abc')->else('foo'));
$this->assertEquals('42', expect('42')->isIdenticalTo('42')->else(null));
$this->assertEquals(null, expect('42')->isIdenticalTo(42)->else(null));
$this->assertEquals(42, expect(42)->isIdenticalTo(42)->else(null));
```

## isNotIdenticalTo
```php
$this->assertEquals('foo', expect('abc')->isNotIdenticalTo('abc')->else('foo'));
$this->assertEquals(null, expect('42')->isNotIdenticalTo('42')->else(null));
$this->assertEquals('42', expect('42')->isNotIdenticalTo(42)->else(null));
$this->assertEquals(null, expect(42)->isNotIdenticalTo(42)->else(null));
```

## isBetween
```php
$this->assertEquals(7, expect(7)->isBetween(0, 8)->else(null));
$this->assertEquals(7, expect(7)->isBetween(0, 7)->else(null));
$this->assertEquals(0, expect(0)->isBetween(0, 7)->else(null));
$this->assertEquals('nope', expect(12)->isBetween(15, 20)->else('nope'));
```

## hasLength
```php
$this->assertEquals('foo', expect('foo')->hasLength(3)->else('aye'));
$this->assertEquals('nope', expect('foobar')->hasLength(4)->else('nope'));

$this->assertEquals([1, 2, 3], expect([1, 2, 3])->hasLength(3)->else([]));
$this->assertEquals([42, 23], expect([])->hasLength(2)->else([42, 23]));
```

## isIn
```php
$this->assertEquals(42, expect(42)->isIn([1, 2, 23, 36, 42, 44, 48])->else(null));
$this->assertEquals(42, expect(42)->isIn([1, 2, 23, 36, 42])->else(null));
$this->assertEquals(null, expect(42)->isIn([1, 2, 23, 36])->else(null));
```

## isKeyOf
```php
$this->assertEquals('foo', expect('foo')->isKeyOf(['a' => 23, 'foo' => 42])->else(null));
$this->assertEquals(null, expect('foo')->isKeyOf(['a' => 23])->else(null));
```

## isBelow
```php
$this->assertEquals(3, expect(3)->isBelow(4)->else(42));
$this->assertEquals(42, expect(6)->isBelow(4)->else(42));
```

## isAbove
```php
$this->assertEquals(42, expect(3)->isAbove(4)->else(42));
$this->assertEquals(6, expect(6)->isAbove(4)->else(42));
```

## isBelowOrEqual
```php
$this->assertEquals(23, expect(23)->isBelowOrEqual(23)->else(null));
$this->assertEquals(23, expect(23)->isBelowOrEqual(42)->else(null));
$this->assertEquals(null, expect(23)->isBelowOrEqual(22)->else(null));
```

## isAboveOrEqual
```php
$this->assertEquals(42, expect(42)->isAboveOrEqual(42)->else(null));
$this->assertEquals(42, expect(42)->isAboveOrEqual(23)->else(null));
$this->assertEquals(null, expect(42)->isAboveOrEqual(256)->else(null));
```

## isPositive
```php
$this->assertEquals(42, expect(-1)->isPositive()->else(42));
$this->assertEquals(0, expect(0)->isPositive()->else(42));
```

## isNegative
```php
$this->assertEquals(-1, expect(-1)->isNegative()->else(42));
$this->assertEquals(42, expect(0)->isNegative()->else(42));
```

## isEven
```php
$this->assertEquals(42, expect(42)->isEven()->else(23));
$this->assertEquals(42, expect(23)->isEven()->else(42));
```

## isOdd
```php
$this->assertEquals(23, expect(42)->isOdd()->else(23));
$this->assertEquals(23, expect(23)->isOdd()->else(42));
```

## match
```php
$this->assertEquals('abc', expect('abc')->match('/a*b{1}c?d?/')->else('foo'));
$this->assertEquals('foo', expect('ac')->match('/a*b{1}c?d?/')->else('foo'));
```

## then
```php
$this->assertEquals('foo', expect(42)->isEven()->then('foo'));
$this->assertEquals(42, expect(42)->isOdd()->then('foo'));
```

----

You don't like global functions? Use a static method:
```php
$this->assertEquals(42, Expect::that(42)->isInt()->else(null));
```

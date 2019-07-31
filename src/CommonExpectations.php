<?php

namespace Dgame\Expectation;

/**
 * Class CommonExpectations
 * @package Dgame\Expectation
 */
final class CommonExpectations
{
    use ConditionTrait;

    /**
     * CommonExpectations constructor.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param callable $callback
     *
     * @return CommonExpectations
     */
    public function is(callable $callback): self
    {
        return $this->approveIf($callback($this->value));
    }

    /**
     * @param callable $callback
     *
     * @return CommonExpectations
     */
    public function isNot(callable $callback): self
    {
        return $this->approveIf(!$callback($this->value));
    }

    /**
     * @return CommonExpectations
     */
    public function isEmpty(): self
    {
        return $this->approveIf(empty($this->value));
    }

    /**
     * @return CommonExpectations
     */
    public function isNotEmpty(): self
    {
        return $this->approveIf(!empty($this->value));
    }

    /**
     * @return CommonExpectations
     */
    public function isNull(): self
    {
        return $this->isIdenticalTo(null);
    }

    /**
     * @return CommonExpectations
     */
    public function isNotNull(): self
    {
        return $this->isNotIdenticalTo(null);
    }

    /**
     * @param mixed $value
     *
     * @return CommonExpectations
     */
    public function isEqual($value): self
    {
        return $this->approveIf($this->value == $value);
    }

    /**
     * @param mixed $value
     *
     * @return CommonExpectations
     */
    public function isNotEqual($value): self
    {
        return $this->approveIf($this->value != $value);
    }

    /**
     * @param mixed $value
     *
     * @return CommonExpectations
     */
    public function isIdenticalTo($value): self
    {
        return $this->approveIf($this->value === $value);
    }

    /**
     * @param mixed $value
     *
     * @return CommonExpectations
     */
    public function isNotIdenticalTo($value): self
    {
        return $this->approveIf($this->value !== $value);
    }

    /**
     * @return IntegerExpectations
     */
    public function isInt(): IntegerExpectations
    {
        return new IntegerExpectations($this->value);
    }

    /**
     * @return FloatExpectations
     */
    public function isFloat(): FloatExpectations
    {
        return new FloatExpectations($this->value);
    }

    /**
     * @return ScalarExpectations
     */
    public function isScalar(): ScalarExpectations
    {
        return new ScalarExpectations($this->value);
    }

    /**
     * @return NumericExpectations
     */
    public function isNumeric(): NumericExpectations
    {
        return new NumericExpectations($this->value);
    }

    /**
     * @return StringExpectations
     */
    public function isString(): StringExpectations
    {
        return new StringExpectations($this->value);
    }

    /**
     * @return BooleanExpectations
     */
    public function isBool(): BooleanExpectations
    {
        return new BooleanExpectations($this->value);
    }

    /**
     * @return ArrayExpectations
     */
    public function isArray(): ArrayExpectations
    {
        return new ArrayExpectations($this->value);
    }

    /**
     * @return ObjectExpectations
     */
    public function isObject(): ObjectExpectations
    {
        return new ObjectExpectations($this->value);
    }

    /**
     * @param mixed $object
     *
     * @return ObjectExpectations
     */
    public function isInstanceOf($object): ObjectExpectations
    {
        $expectation = new ObjectExpectations($this->value);

        return $expectation->isInstanceOf($object);
    }

    /**
     * @return CommonExpectations
     */
    public function isCallable(): self
    {
        return $this->is('is_callable');
    }

    /**
     * @return CommonExpectations
     */
    public function isDir(): self
    {
        return $this->is('is_dir');
    }

    /**
     * @return CommonExpectations
     */
    public function isFile(): self
    {
        return $this->is('is_file');
    }

    /**
     * @param float $lhs
     * @param float $rhs
     *
     * @return NumericExpectations
     */
    public function isBetween(float $lhs, float $rhs): NumericExpectations
    {
        $expectation = new NumericExpectations($this->value);

        return $expectation->isBetween($lhs, $rhs);
    }

    /**
     * @param float $value
     *
     * @return NumericExpectations
     */
    public function isBelow(float $value): NumericExpectations
    {
        $expectation = new NumericExpectations($this->value);

        return $expectation->isBelow($value);
    }

    /**
     * @param float $value
     *
     * @return NumericExpectations
     */
    public function isAbove(float $value): NumericExpectations
    {
        $expectation = new NumericExpectations($this->value);

        return $expectation->isAbove($value);
    }

    /**
     * @param float $value
     *
     * @return NumericExpectations
     */
    public function isBelowOrEqual(float $value): NumericExpectations
    {
        $expectation = new NumericExpectations($this->value);

        return $expectation->isBelowOrEqual($value);
    }

    /**
     * @param float $value
     *
     * @return NumericExpectations
     */
    public function isAboveOrEqual(float $value): NumericExpectations
    {
        $expectation = new NumericExpectations($this->value);

        return $expectation->isAboveOrEqual($value);
    }

    /**
     * @return NumericExpectations
     */
    public function isPositive(): NumericExpectations
    {
        $expectation = new NumericExpectations($this->value);

        return $expectation->isPositive();
    }

    /**
     * @return NumericExpectations
     */
    public function isNegative(): NumericExpectations
    {
        $expectation = new NumericExpectations($this->value);

        return $expectation->isNegative();
    }

    /**
     * @return IntegerExpectations
     */
    public function isEven(): IntegerExpectations
    {
        $expectation = new IntegerExpectations($this->value);

        return $expectation->isEven();
    }

    /**
     * @return IntegerExpectations
     */
    public function isOdd(): IntegerExpectations
    {
        $expectation = new IntegerExpectations($this->value);

        return $expectation->isOdd();
    }

    /**
     * @return BooleanExpectations
     */
    public function isTrue(): BooleanExpectations
    {
        $expectation = new BooleanExpectations($this->value);

        return $expectation->isTrue();
    }

    /**
     * @return BooleanExpectations
     */
    public function isFalse(): BooleanExpectations
    {
        $expectation = new BooleanExpectations($this->value);

        return $expectation->isFalse();
    }

    /**
     * @param string $pattern
     *
     * @return StringExpectations
     */
    public function match(string $pattern): StringExpectations
    {
        $expectation = new StringExpectations($this->value);

        return $expectation->match($pattern);
    }

    /**
     * @param array $values
     *
     * @return ArrayValueExpectations
     */
    public function isIn(array $values): ArrayValueExpectations
    {
        $expecation = new ArrayValueExpectations($this->value);

        return $expecation->isIn($values);
    }

    /**
     * @param array $values
     *
     * @return ArrayValueExpectations
     */
    public function isKeyOf(array $values): ArrayValueExpectations
    {
        $expecation = new ArrayValueExpectations($this->value);

        return $expecation->isKeyOf($values);
    }

    /**
     * @param int $length
     *
     * @return ArrayExpectations|StringExpectations
     */
    public function hasLength(int $length)
    {
        $expectation = new StringExpectations($this->value);
        if ($expectation->isApproved()) {
            return $expectation->hasLength($length);
        }

        $expecation = new ArrayExpectations($this->value);

        return $expecation->hasLength($length);
    }
}

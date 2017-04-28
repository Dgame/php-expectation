<?php

namespace Dgame\Expectation;

/**
 * Class Expectations
 * @package Dgame\Expectation
 */
final class Expectations
{
    /**
     * @var mixed
     */
    private $value;
    /**
     * @var bool
     */
    private $approved = true;

    /**
     * Expectations constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return Expectations
     */
    private function reject(): self
    {
        $this->approved = false;

        return $this;
    }

    /**
     * @param bool $condition
     *
     * @return Expectations
     */
    private function approveIf(bool $condition): self
    {
        $this->approved = $condition;

        return $this;
    }

    /**
     * @return bool
     */
    public function isApproved(): bool
    {
        return $this->approved;
    }

    /**
     * @param callable $callback
     *
     * @return Expectations
     */
    public function is(callable $callback): self
    {
        return $this->approveIf($callback($this->value));
    }

    /**
     * @param callable $callback
     *
     * @return Expectations
     */
    public function isNot(callable $callback): self
    {
        return $this->approveIf(!$callback($this->value));
    }

    /**
     * @return Expectations
     */
    public function isInt(): self
    {
        return $this->is('is_int');
    }

    /**
     * @return Expectations
     */
    public function isFloat(): self
    {
        return $this->is('is_float');
    }

    /**
     * @return Expectations
     */
    public function isScalar(): self
    {
        return $this->is('is_scalar');
    }

    /**
     * @return Expectations
     */
    public function isNumeric(): self
    {
        return $this->is('is_numeric');
    }

    /**
     * @return Expectations
     */
    public function isString(): self
    {
        return $this->is('is_string');
    }

    /**
     * @return Expectations
     */
    public function isBool(): self
    {
        return $this->is('is_bool');
    }

    /**
     * @return Expectations
     */
    public function isArray(): self
    {
        return $this->is('is_array');
    }

    /**
     * @return Expectations
     */
    public function isObject(): self
    {
        return $this->is('is_object');
    }

    /**
     * @param $object
     *
     * @return Expectations
     */
    public function isInstanceOf($object): self
    {
        if ($this->isObject()->isApproved()) {
            return $this->approveIf($this->value instanceof $object);
        }

        return $this;
    }

    /**
     * @return Expectations
     */
    public function isCallable(): self
    {
        return $this->is('is_callable');
    }

    /**
     * @return Expectations
     */
    public function isDir(): self
    {
        return $this->is('is_dir');
    }

    /**
     * @return Expectations
     */
    public function isFile(): self
    {
        return $this->is('is_file');
    }

    /**
     * @return Expectations
     */
    public function isIterable(): self
    {
        return $this->is('is_iterable');
    }

    /**
     * @return Expectations
     */
    public function isEmpty(): self
    {
        return $this->approveIf(empty($this->value));
    }

    /**
     * @return Expectations
     */
    public function isNotEmpty(): self
    {
        return $this->approveIf(!empty($this->value));
    }

    /**
     * @return Expectations
     */
    public function isNull(): self
    {
        return $this->isIdenticalTo(null);
    }

    /**
     * @return Expectations
     */
    public function isNotNull(): self
    {
        return $this->isNotIdenticalTo(null);
    }

    /**
     * @return Expectations
     */
    public function isTrue(): self
    {
        return $this->isIdenticalTo(true);
    }

    /**
     * @return Expectations
     */
    public function isFalse(): self
    {
        return $this->isIdenticalTo(false);
    }

    /**
     * @param $value
     *
     * @return Expectations
     */
    public function isEqual($value): self
    {
        return $this->approveIf($this->value == $value);
    }

    /**
     * @param $value
     *
     * @return Expectations
     */
    public function isNotEqual($value): self
    {
        return $this->approveIf($this->value != $value);
    }

    /**
     * @param $value
     *
     * @return Expectations
     */
    public function isIdenticalTo($value): self
    {
        return $this->approveIf($this->value === $value);
    }

    /**
     * @param $value
     *
     * @return Expectations
     */
    public function isNotIdenticalTo($value): self
    {
        return $this->approveIf($this->value !== $value);
    }

    /**
     * @param int $lhs
     * @param int $rhs
     *
     * @return Expectations
     */
    public function isBetween(int $lhs, int $rhs): self
    {
        if ($this->isNumeric()->isApproved()) {
            return $this->approveIf($this->value >= $lhs && $this->value <= $rhs);
        }

        return $this->reject();
    }

    /**
     * @param int $length
     *
     * @return Expectations
     */
    public function hasLength(int $length): self
    {
        if ($this->isString()->isApproved()) {
            return $this->approveIf(strlen($this->value) === $length);
        }

        if ($this->isArray()->isApproved()) {
            return $this->approveIf(count($this->value) === $length);
        }

        return $this->reject();
    }

    /**
     * @param array $values
     *
     * @return Expectations
     */
    public function isIn(array $values): self
    {
        return $this->approveIf(in_array($this->value, $values));
    }

    /**
     * @param array $values
     *
     * @return Expectations
     */
    public function isKeyOf(array $values): self
    {
        return $this->approveIf(array_key_exists($this->value, $values));
    }

    /**
     * @param int $value
     *
     * @return Expectations
     */
    public function isBelow(int $value): self
    {
        if ($this->isNumeric()->isApproved()) {
            return $this->approveIf($this->value < $value);
        }

        return $this->reject();
    }

    /**
     * @param int $value
     *
     * @return Expectations
     */
    public function isAbove(int $value): self
    {
        if ($this->isNumeric()->isApproved()) {
            return $this->approveIf($this->value > $value);
        }

        return $this->reject();
    }

    /**
     * @param int $value
     *
     * @return Expectations
     */
    public function isBelowOrEqual(int $value): self
    {
        if ($this->isNumeric()->isApproved()) {
            return $this->approveIf($this->value <= $value);
        }

        return $this->reject();
    }

    /**
     * @param int $value
     *
     * @return Expectations
     */
    public function isAboveOrEqual(int $value): self
    {
        if ($this->isNumeric()->isApproved()) {
            return $this->approveIf($this->value >= $value);
        }

        return $this->reject();
    }

    /**
     * @return Expectations
     */
    public function isPositive(): self
    {
        return $this->isAboveOrEqual(0);
    }

    /**
     * @return Expectations
     */
    public function isNegative(): self
    {
        return $this->isBelow(0);
    }

    /**
     * @return Expectations
     */
    public function isEven(): self
    {
        if ($this->isNumeric()->isApproved()) {
            return $this->approveIf(($this->value & 1) === 0);
        }

        return $this->reject();
    }

    /**
     * @return Expectations
     */
    public function isOdd(): self
    {
        if ($this->isNumeric()->isApproved()) {
            return $this->approveIf(($this->value & 1) === 1);
        }

        return $this->reject();
    }

    /**
     * @param string $pattern
     *
     * @return Expectations
     */
    public function match(string $pattern): self
    {
        if ($this->isString()->isApproved()) {
            return $this->approveIf(preg_match($pattern, $this->value) === 1);
        }

        return $this->reject();
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function then($value)
    {
        return $this->isApproved() ? $value : $this->value;
    }

    /**
     * @param $default
     *
     * @return mixed
     */
    public function else($default)
    {
        return $this->isApproved() ? $this->value : $default;
    }
}
<?php

namespace Dgame\Expectation;

/**
 * Class NumericExpectations
 * @package Dgame\Expectation
 */
class NumericExpectations extends ScalarExpectations
{
    /**
     * NumericExpectations constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        if ($this->isNumeric($value)) {
            parent::__construct($value);
        }
    }

    /**
     * @param $value
     *
     * @return bool
     */
    final protected function isNumeric($value): bool
    {
        return $this->approveIf(is_numeric($value))->isApproved();
    }

    /**
     * @param float $lhs
     * @param float $rhs
     *
     * @return NumericExpectations
     */
    public function isBetween(float $lhs, float $rhs): self
    {
        return $this->approveIf($this->value >= $lhs && $this->value <= $rhs);
    }

    /**
     * @param float $value
     *
     * @return NumericExpectations
     */
    public function isBelow(float $value): self
    {
        return $this->approveIf($this->value < $value);
    }

    /**
     * @param float $value
     *
     * @return NumericExpectations
     */
    public function isAbove(float $value): self
    {
        return $this->approveIf($this->value > $value);
    }

    /**
     * @param float $value
     *
     * @return NumericExpectations
     */
    public function isBelowOrEqual(float $value): self
    {
        return $this->approveIf($this->value <= $value);
    }

    /**
     * @param float $value
     *
     * @return NumericExpectations
     */
    public function isAboveOrEqual(float $value): self
    {
        return $this->approveIf($this->value >= $value);
    }

    /**
     * @return NumericExpectations
     */
    public function isPositive(): self
    {
        return $this->isAboveOrEqual(0);
    }

    /**
     * @return NumericExpectations
     */
    public function isNegative(): self
    {
        return $this->isBelow(0);
    }
}
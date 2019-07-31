<?php

namespace Dgame\Expectation;

/**
 * Class IntegerExpectations
 * @package Dgame\Expectation
 */
final class IntegerExpectations extends NumericExpectations
{
    /**
     * @param mixed $value
     *
     * @return int
     */
    protected function prepare($value): int
    {
        return (int) $value;
    }

    /**
     * @return IntegerExpectations
     */
    public function isEven(): self
    {
        return $this->approveIf(($this->value & 1) === 0);
    }

    /**
     * @return IntegerExpectations
     */
    public function isOdd(): self
    {
        return $this->approveIf(($this->value & 1) === 1);
    }
}

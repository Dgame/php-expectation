<?php

namespace Dgame\Expectation;

/**
 * Class FloatExpectations
 * @package Dgame\Expectation
 */
final class FloatExpectations extends NumericExpectations
{
    /**
     * @param mixed $value
     *
     * @return float
     */
    protected function prepare($value): float
    {
        return (float) $value;
    }
}

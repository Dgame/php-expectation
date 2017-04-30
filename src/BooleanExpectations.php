<?php

namespace Dgame\Expectation;

/**
 * Class BooleanExpectations
 * @package Dgame\Expectation
 */
final class BooleanExpectations extends ScalarExpectations
{
    /**
     * BooleanExpectations constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        if ($this->isBool($value)) {
            parent::__construct($value);
        }
    }

    /**
     * @param $value
     *
     * @return bool
     */
    private function isBool($value): bool
    {
        return $this->approveIf(is_bool($value))->isApproved();
    }

    /**
     * @return BooleanExpectations
     */
    public function isTrue(): self
    {
        return $this->approveIf($this->value === true);
    }

    /**
     * @return BooleanExpectations
     */
    public function isFalse(): self
    {
        return $this->approveIf($this->value === false);
    }
}
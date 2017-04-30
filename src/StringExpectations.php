<?php

namespace Dgame\Expectation;

/**
 * Class StringExpectations
 * @package Dgame\Expectation
 */
final class StringExpectations extends ScalarExpectations
{
    /**
     * StringExpectations constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        if ($this->isString($value)) {
            parent::__construct($value);
        }
    }

    /**
     * @param $value
     *
     * @return bool
     */
    private function isString($value): bool
    {
        return $this->approveIf(is_string($value))->isApproved();
    }

    /**
     * @param int $length
     *
     * @return StringExpectations
     */
    public function hasLength(int $length): self
    {
        return $this->approveIf(strlen($this->value) === $length);
    }

    /**
     * @param string $pattern
     *
     * @return StringExpectations
     */
    public function match(string $pattern): self
    {
        return $this->approveIf(preg_match($pattern, $this->value) === 1);
    }
}
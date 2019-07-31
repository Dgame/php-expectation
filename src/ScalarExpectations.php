<?php

namespace Dgame\Expectation;

/**
 * Class ScalarExpectations
 * @package Dgame\Expectation
 */
class ScalarExpectations
{
    use ConditionTrait;

    /**
     * ScalarExpectations constructor.
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        if ($this->isScalar($value)) {
            $this->value = $this->prepare($value);
        }
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    private function isScalar($value): bool
    {
        return $this->approveIf(is_scalar($value))->isApproved();
    }

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    protected function prepare($value)
    {
        return $value;
    }

    /**
     * @return ScalarExpectations
     */
    final public function isEmpty(): self
    {
        return $this->approveIf(empty($this->value));
    }

    /**
     * @return ScalarExpectations
     */
    final public function isNotEmpty(): self
    {
        return $this->approveIf(!empty($this->value));
    }

    /**
     * @param mixed $value
     *
     * @return ScalarExpectations
     */
    final public function isEqual($value): self
    {
        return $this->approveIf($this->value == $value);
    }

    /**
     * @param mixed $value
     *
     * @return ScalarExpectations
     */
    final public function isNotEqual($value): self
    {
        return $this->approveIf($this->value != $value);
    }

    /**
     * @param mixed $value
     *
     * @return ScalarExpectations
     */
    final public function isIdenticalTo($value): self
    {
        return $this->approveIf($this->value === $value);
    }

    /**
     * @param mixed $value
     *
     * @return ScalarExpectations
     */
    final public function isNotIdenticalTo($value): self
    {
        return $this->approveIf($this->value !== $value);
    }
}

<?php

namespace Dgame\Expectation;

/**
 * Class ArrayValueExpectations
 * @package Dgame\Expectation
 */
/**
 * Class ArrayValueExpectations
 * @package Dgame\Expectation
 */
final class ArrayValueExpectations
{
    use ConditionTrait;

    /**
     * ArrayValueExpectations constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @param array $values
     *
     * @return ArrayValueExpectations
     */
    public function isIn(array $values): self
    {
        return $this->approveIf(in_array($this->value, $values));
    }

    /**
     * @param array $values
     *
     * @return ArrayValueExpectations
     */
    public function isKeyOf(array $values): self
    {
        return $this->approveIf(array_key_exists($this->value, $values));
    }
}
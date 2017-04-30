<?php

namespace Dgame\Expectation;

/**
 * Class ObjectExpectations
 * @package Dgame\Expectation
 */
final class ObjectExpectations
{
    use ConditionTrait;

    /**
     * ObjectExpectations constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        if ($this->approveIf(is_object($value))->isApproved()) {
            $this->value = $value;
        }
    }

    /**
     * @param $object
     *
     * @return ObjectExpectations
     */
    public function isInstanceOf($object): self
    {
        return $this->approveIf($this->value instanceof $object);
    }
}
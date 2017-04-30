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
        if ($this->isObject($value)) {
            $this->value = $value;
        }
    }

    /**
     * @param $value
     *
     * @return bool
     */
    private function isObject($value): bool
    {
        return $this->approveIf(is_object($value))->isApproved();
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
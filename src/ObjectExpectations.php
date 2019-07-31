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
     * @param mixed $value
     */
    public function __construct($value)
    {
        if ($this->isObject($value)) {
            $this->value = $value;
        }
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    private function isObject($value): bool
    {
        return $this->approveIf(is_object($value))->isApproved();
    }

    /**
     * @param mixed $object
     *
     * @return ObjectExpectations
     */
    public function isInstanceOf($object): self
    {
        return $this->approveIf($this->value instanceof $object);
    }
}

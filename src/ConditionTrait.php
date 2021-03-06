<?php

namespace Dgame\Expectation;

/**
 * Trait ConditionTrait
 * @package Dgame\Expectation
 */
trait ConditionTrait
{
    /**
     * @var mixed
     */
    protected $value;
    /**
     * @var bool
     */
    private $approved = true;

    /**
     * @param bool $condition
     *
     * @return $this
     */
    final protected function approveIf(bool $condition): self
    {
        $this->approved = $this->approved && $condition;

        return $this;
    }

    /**
     * @return bool
     */
    public function isApproved(): bool
    {
        return $this->approved;
    }

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    public function then($value)
    {
        return $this->isApproved() ? $value : $this->value;
    }

    /**
     * @param mixed $default
     *
     * @return mixed
     */
    public function else($default)
    {
        return $this->isApproved() ? $this->value : $default;
    }
}

<?php

namespace Dgame\Expectation;

/**
 * Class ArrayExpectations
 * @package Dgame\Expectation
 */
final class ArrayExpectations
{
    use ConditionTrait;

    /**
     * ArrayExpectations constructor.
     *
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $this->isArray($value) ? $value : [];
    }

    /**
     * @param $value
     *
     * @return bool
     */
    private function isArray($value): bool
    {
        return $this->approveIf(is_array($value))->isApproved();
    }

    /**
     * @param int $length
     *
     * @return ArrayExpectations
     */
    public function hasLength(int $length): self
    {
        return $this->approveIf(count($this->value) === $length);
    }

    /**
     * @return ArrayExpectations
     */
    public function isEmpty(): self
    {
        return $this->approveIf(empty($this->value));
    }

    /**
     * @return ArrayExpectations
     */
    public function isNotEmpty(): self
    {
        return $this->approveIf(!empty($this->value));
    }

    /**
     * @param callable $callback
     *
     * @return ArrayExpectations
     */
    public function isAny(callable $callback): self
    {
        if (!$this->isApproved()) {
            return $this;
        }

        foreach ($this->value as $value) {
            if ($this->approveIf($callback($value))->isApproved()) {
                break;
            }
        }

        return $this;
    }

    /**
     * @param callable $callback
     *
     * @return ArrayExpectations
     */
    public function isAll(callable $callback): self
    {
        if (!$this->isApproved()) {
            return $this;
        }

        foreach ($this->value as $value) {
            if (!$this->approveIf($callback($value))->isApproved()) {
                break;
            }
        }

        return $this;
    }
}
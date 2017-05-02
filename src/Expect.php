<?php

namespace Dgame\Expectation;

/**
 * Class Expect
 * @package Dgame\Expectation
 */
final class Expect
{
    /**
     * @param $value
     *
     * @return CommonExpectations
     */
    public static function that($value): CommonExpectations
    {
        return new CommonExpectations($value);
    }
}
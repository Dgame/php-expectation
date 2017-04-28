<?php

namespace Dgame\Expectation;

/**
 * @param $value
 *
 * @return Expectations
 */
function expect($value): Expectations
{
    return new Expectations($value);
}
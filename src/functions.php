<?php

namespace Dgame\Expectation;

/**
 * @param $value
 *
 * @return CommonExpectations
 */
function expect($value): CommonExpectations
{
    return new CommonExpectations($value);
}
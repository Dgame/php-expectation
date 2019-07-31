<?php

namespace Dgame\Expectation;

/**
 * @param mixed $value
 *
 * @return CommonExpectations
 */
function expect($value): CommonExpectations
{
    return new CommonExpectations($value);
}

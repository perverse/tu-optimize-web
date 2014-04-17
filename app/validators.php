<?php

Validator::extend('arraymin', function($attribute, $value, $parameters)
{
    list($min_val) = $parameters;
    return (count($value) >= $min_val);
});

Validator::extend('arraymax', function($attribute, $value, $parameters)
{
    list($max_val) = $parameters;
    return (count($value) >= $max_val);
});

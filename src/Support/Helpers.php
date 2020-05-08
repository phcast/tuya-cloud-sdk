<?php

function getMillisecond()
{
    list($s1, $s2) = explode(' ', microtime());

    return (float) sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
}

function get_total_millisecond()
{
    return bcmul(microtime(true),1000,0);
}

function arrayFilter($array)
{
    return array_filter($array, function ($var) {
        return null !== $var && false !== $var && '' !== $var;
    });
}

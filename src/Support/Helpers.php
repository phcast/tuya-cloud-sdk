<?php

function getMillisecond()
{
    list($s1, $s2) = explode(' ', microtime());

    return (float) sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
}

function get_total_millisecond()
{
    $time = explode(' ', microtime());
    $time = $time[1].($time[0] * 1000);
    $time2 = explode('.', $time);
    $time = $time2[0];

    return (string) $time;
}

function arrayFilter($array)
{
    return array_filter($array, function ($var) {
        return null !== $var && false !== $var && '' !== $var;
    });
}

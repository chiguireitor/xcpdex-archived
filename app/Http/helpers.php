<?php

function toSatoshi($value)
{
    return bcmul($value, 100000000, 8);
}

function unSatoshi($originalValue)
{
    // Ideally - But I dont know which
    // assets are divisible when I run
    // this so the scientific notation
    // is a catch right now soo hacky
    // return bcdiv($value, 100000000, 8);

    $value = (float) ($originalValue / 100000000);
    if ( strpos($value, 'E-') !== false )
    {
        $value = $originalValue;
    }
    return $value;
}

function fixTimestamp($unix)
{
    return \Carbon\Carbon::createFromTimestamp(substr($unix, 0, 10))->toDateTimeString();
}
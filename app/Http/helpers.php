<?php

function toSatoshi($value)
{
    return (int) ($value * 100000000);
}

function unSatoshi($originalValue)
{
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
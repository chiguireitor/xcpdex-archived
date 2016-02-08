<?php

function toSatoshi($value)
{
    return (int) ($value * 100000000);
}

function unSatoshi($value)
{
    return (float) ($value / 100000000);
}

function fixTimestamp($unix)
{
    return \Carbon\Carbon::createFromTimestamp(substr($unix, 0, 10))->toDateTimeString();
}
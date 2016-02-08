<?php

function toSatoshi($value)
{
    return (int) ($value * 100000000);
}

function unSatoshi($value)
{
    return (int) ($value / 100000000);
}
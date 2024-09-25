<?php

function sanitize($str)
{
    return trim(htmlspecialchars($str));
}

function required($input)
{
    return !empty($input);
}

function minVal($input, $length)
{
    if (strlen($input) < $length) {
        return false; // this will return false if input les that 3
    }
    return true; 
}

function maxVal($input, $length)
{
    if (strlen($input) > $length) {
        return false;
    }
    return true;
}

function emaill($input)
{
    return filter_var($input, FILTER_VALIDATE_EMAIL);
}
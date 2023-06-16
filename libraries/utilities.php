<?php

function generateToken(): string
{
    $tokenLength = 60; 
    $bytes = random_bytes($tokenLength);
    $token = bin2hex($bytes);

    return $token;
}

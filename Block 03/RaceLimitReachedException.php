<?php
class RaceLimitReachedException extends Exception
{
    public function __construct($message, $code = 0, $prev = null)
    {
        parent::__construct($message, $code, $prev);
    }
}
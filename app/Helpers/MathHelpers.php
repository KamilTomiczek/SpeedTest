<?php

namespace App\Helpers;

class MathHelpers
{
    /**
     * @param float $number
     * @param int $multiplier
     * @return float
     */
    public static function multiply(float $number, int $multiplier): float
    {
        return ($number * $multiplier);
    }
}

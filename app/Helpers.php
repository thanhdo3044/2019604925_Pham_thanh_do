<?php
if (!function_exists('vn_format')) {
    /**
     * Format a number to Vietnamese currency format.
     *
     * @param  float|int  $price
     * @return string
     */
    function vn_format($price)
    {
        return number_format($price, 0, ",", ".");
    }
}
?>
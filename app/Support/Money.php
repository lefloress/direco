<?php namespace Direco\Support;

use Illuminate\Support\Facades\Config;

class Money {

    public static function format($number)
    {
        return number_format($number, 2, ',', '.');
    }

    public static function percentage($partial, $total)
    {
        return 100 - intval($partial * 100 / $total);
    }

    public static function getWithoutIva($amount)
    {
        return $amount / (1 + Config::get('config_iva', 12) / 100);
    }

} 
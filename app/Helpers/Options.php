<?php namespace Direco\Helpers;

class Options {

    public static function withEmpty(array $list)
    {
        return array('' => 'Seleccione:') + $list;
    }

}
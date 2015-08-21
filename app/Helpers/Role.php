<?php namespace Direco\Helpers;

class Role {

    const USER = 'user';
    const ADMIN = 'admin';

    public static function getList()
    {
        return array(
            static::USER,
            static::ADMIN
        );
    }

} 
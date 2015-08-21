<?php namespace Direco\Helpers;

class Estatus {

    const ACTIVO = 'A';
    const EN_ESPERA = 'E';
    const INACTIVO = 'I';
    const SUSPENDIDO = 'S';
    const REACTIVACION = 'R';

    const PUBLICADO = 'publicado';
    const BORRADOR = 'borrador';
    const TODOS = false;

    public static function getList()
    {
        return array(
            static::ACTIVO,
            static::EN_ESPERA,
            static::INACTIVO,
            static::SUSPENDIDO,
            static::REACTIVACION
        );
    }

}
<?php namespace Direco\Entities;

use Direco\Base\Entity;

class Banco extends Entity {

    protected $table = 'bancos';

    // - Attributes

    public function getIdAttribute()
    {
        return $this->attributes['BCO_CODIGO'];
    }

    public function getNombreAttribute()
    {
        return $this->attributes['BCO_DESCRI'];
    }

} 
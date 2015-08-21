<?php namespace Direco\Entities;

use Direco\Base\Entity;

class Municipio extends Entity {

    protected $table = 'dpmunicipios';

    public function estado()
    {
        return $this->belongsTo(Estado::getClass(), 'id_estado');
    }

    public function parroquias()
    {
        return $this->hasMany(Parroquia::getClass(), 'id_municipio');
    }

} 
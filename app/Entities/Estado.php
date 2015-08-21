<?php namespace Direco\Entities;

use Direco\Base\Entity;

class Estado extends Entity {

    protected $table = 'dpestado';

    public function municipios()
    {
        return $this->hasMany(Municipio::getClass(), 'id_estado');
    }

    public function parroquias()
    {
        return $this->hasMany(Parroquia::getClass(), 'id_estado');
    }

} 
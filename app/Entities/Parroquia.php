<?php namespace Direco\Entities;

use Direco\Base\Entity;

class Parroquia extends Entity {

    protected $table = 'dpparroquias';

    public function estado()
    {
        return $this->belongsTo(Estado::getClass(), 'id_estado');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::getClass(), 'id_municipio');
    }

} 
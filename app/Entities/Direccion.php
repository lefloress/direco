<?php namespace Direco\Entities;

use Direco\Base\Entity;

class Direccion extends Entity {

    protected $table = 'direcciones';

    public function usuario()
    {
        return $this->belongsTo(Usuario::getClass(), 'id_usuario');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::getClass(), 'id_municipio');
    }

    public function parroquia()
    {
        return $this->belongsTo(Parroquia::getClass(), 'id_parroquia');
    }

} 
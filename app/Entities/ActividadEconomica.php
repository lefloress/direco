<?php namespace Direco\Entities;

use Direco\Base\Entity;

class ActividadEconomica extends Entity {

    protected $table = 'actividades_economicas';

    // - Attributes

    public function getIdAttribute()
    {
        return $this->attributes['id'];
    }

    public function getNombreAttribute()
    {
        return $this->attributes['nombre'];
    }
} 
<?php namespace Direco\Entities;

use Direco\Base\Entity;
use Illuminate\Support\Str;

class Modelo extends Entity {

    protected $table = 'webmodelo';
    protected $primaryKey = 'MOD_ID';

    // - Relationships

    public function marca()
    {
        return $this->belongsTo(Marca::getClass(), 'MOD_CODMAR', 'MAV_CODIGO');
    }

    public function motores()
    {
        return $this->hasMany(Motor::getClass(), 'MOT_MOD_ID');
    }

    // - Attributes

    // ID
    public function getIdAttribute()
    {
        return $this->attributes['MOD_ID'];
    }

    // descripcion
    public function getDescripcionAttribute()
    {
        return $this->attributes['MOD_DESCRI'];
    }

    // id marca
    public function getIdMarcaAttribute()
    {
        return $this->attributes['MOD_CODMAR'];
    }

    // slug
    public function getSlugAttribute()
    {
        // Slug column is not populated, that's why we need to generate this
        return Str::slug($this->getDescripcionAttribute());
        //return $this->attributes['MOD_SLUG'];
    }

} 
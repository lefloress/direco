<?php namespace Direco\Entities;

use Direco\Base\Entity;
use Illuminate\Support\Str;

class Grupo extends Entity {

    protected $table = 'webgru';
    protected $primaryKey = 'GRU_CODIGO';

    // - Relationships

    public function divisiones()
    {
        return $this->hasMany(Division::getClass(), 'DIV_GRU_ID');
    }

    // - Attributes

    // ID
    public function getIdAttribute()
    {
        return $this->attributes['GRU_CODIGO'];
    }

    // descripcion
    public function getDescripcionAttribute()
    {
        return $this->attributes['GRU_DESCRI'];
    }

    // slug
    public function getSlugAttribute()
    {
        // Slug column is not populated, that's why we need to generate this
        return Str::slug($this->getDescripcionAttribute());
        //return $this->attributes['GRU_SLUG'];
    }

} 
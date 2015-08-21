<?php namespace Direco\Entities;

use Direco\Base\Entity;

use Illuminate\Support\Str;

class Division extends Entity {

    protected $table = 'webdivision';
    protected $primaryKey = 'DIV_ID';

    // - Relationships

    public function grupo()
    {
        return $this->belongsTo(Grupo::getClass(), 'DIV_GRU_ID');
    }

    public function piezas()
    {
        return $this->hasMany(Pieza::getClass(), 'PZA_DIV_ID');
    }

    // - Attributes

    // ID
    public function getIdAttribute()
    {
        return $this->attributes['DIV_ID'];
    }

    // descripcion
    public function getDescripcionAttribute()
    {
        return $this->attributes['DIV_DESCRI'];
    }

    // id grupo
    public function getIdGrupoAttribute()
    {
        return $this->attributes['DIV_GRU_ID'];
    }

    // slug
    public function getSlugAttribute()
    {
        // Slug column is not populated, that's why we need to generate this
        return Str::slug($this->getDescripcionAttribute());
        //return $this->attributes['DIV_SLUG'];
    }

    // destacado
    public function getDestacadoAttribute()
    {
        return $this->attributes['DIV_DESTAC'];
    }

} 
<?php namespace Direco\Entities;

use Direco\Base\Entity;
use Illuminate\Support\Str;

class Pieza extends Entity {

    protected $table = 'webpieza';
    protected $primaryKey = 'PZA_ID';

    // - Relationships

    public function division()
    {
        return $this->belongsTo(Division::getClass(), 'PZA_DIV_ID');
    }

    public function items()
    {
        return $this->belongsTo(Inventario::getClass(), 'INV_PZA_ID');
    }

    // - Attributes

    // ID
    public function getIdAttribute()
    {
        return $this->attributes['PZA_ID'];
    }

    // descripcion
    public function getDescripcionAttribute()
    {
        return $this->attributes['PZA_DESCRI'];
    }

    // id division
    public function getIdDivisionAttribute()
    {
        return $this->attributes['PZA_DIV_ID'];
    }

    // slug
    public function getSlugAttribute()
    {
        // Slug column is not populated, that's why we need to generate this
        return Str::slug($this->getDescripcionAttribute());
        //return $this->attributes['PZA_SLUG'];
    }

    // - Presenters (maybe we'll extract them to another class later)

    // url
    public function getUrlAttribute(Motor $motor, Modelo $modelo = null, Marca $marca = null)
    {
        if (is_null($modelo)) { $modelo = $motor->modelo; }
        if (is_null($marca)) { $marca = $modelo->marca; }

        return route('pieza', [
            'piezaSlug'  => $this->slug,
            'marcaSlug'  => $marca->slug,
            'modeloSlug' => $modelo->slug,
            'motorSlug'  => $motor->slug,
            'piezaId'    => $this->id,
            'motorId'    => $motor->id
        ]);
    }


} 
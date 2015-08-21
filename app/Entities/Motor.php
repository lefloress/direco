<?php namespace Direco\Entities;

use Direco\Base\Entity;
use Illuminate\Support\Str;

class Motor extends Entity {

    protected $table = 'webmotor';
    protected $primaryKey = 'MOT_ID';

    // - Relationships

    public function modelo()
    {
        return $this->belongsTo(Modelo::getClass(), 'MOT_MOD_ID', 'MOD_ID');
    }

    public function items()
    {
        return $this->belongsToMany(Inventario::getClass(), 'webequiv', 'EQUI_MOTOR', 'EQUI_CODIG');
    }

    // - Attributes

    // ID
    public function getIdAttribute()
    {
        return $this->attributes['MOT_ID'];
    }

    // descripcion
    public function getDescripcionAttribute()
    {
        return $this->attributes['MOT_DESCRI'];
    }

    // id modelo
    public function getIdModeloAttribute()
    {
        return $this->attributes['MOT_MOD_ID'];
    }

    // slug
    public function getSlugAttribute()
    {
        // Slug column is not populated, that's why we need to generate this
        return Str::slug($this->getDescripcionAttribute());
        //return $this->attributes['MOT_SLUG'];
    }

    // - Presenters (maybe we'll extract them to another class later)

    // url
    public function getUrlAttribute(Modelo $modelo = null, Marca $marca = null)
    {
        if (is_null($modelo)) { $modelo = $this->modelo; }
        if (is_null($marca)) { $marca = $modelo->marca; }

        return route('motor', [
            'marcaSlug'  => $marca->slug,
            'modeloSlug' => $modelo->slug,
            'motorSlug'  => $this->slug,
            'motorId'    => $this->id
        ]);
    }

} 
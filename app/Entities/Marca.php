<?php namespace Direco\Entities;

use Direco\Base\Entity;
use Direco\Support\Image;
use Illuminate\Support\Str;

class Marca extends Entity {

    protected $table = 'webmarveh';
    protected $primaryKey = 'MAV_CODIGO';

    // - Relationships

    public function modelos()
    {
        return $this->hasMany(Modelo::getClass(), 'MOD_CODMAR');
    }

    // - Attributes

    // ID
    public function getIdAttribute()
    {
        return $this->attributes['MAV_CODIGO'];
    }

    // nombre
    public function getNombreAttribute()
    {
        return $this->attributes['MAV_NOMBRE'];
    }

    // slug
    public function getSlugAttribute()
    {
        // Slug column is not populated, that's why we need to generate this
        return Str::slug($this->getNombreAttribute());
        //return $this->attributes['MAV_SLUG'];
    }

    // destacado
    public function getDestacadoAttribute()
    {
        return $this->attributes['MAV_DESTAC'];
    }

    // - Presenters (maybe we'll extract them to another class later)

    // logo
    public function getLogoAttribute()
    {
        $image = $this->slug . '.png';
        return new Image('marca', $image, 'nologo.gif');
    }

    public function getUrlAttribute()
    {
        return route('marca', [$this->slug, $this->id]);
    }

} 
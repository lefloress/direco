<?php namespace Direco\Entities;

use Direco\Base\Entity;
use Direco\Support\ImageWithThumbnail;
use Direco\Support\Money;
use Illuminate\Support\Str;

class Inventario extends Entity {

    protected $table = 'webinv';
    protected $primaryKey = 'INV_CODIGO';

    // - Relationships

    public function pieza()
    {
        return $this->belongsTo(Pieza::getClass(), 'INV_PZA_ID');
    }

    public function motores()
    {
        return $this->belongsToMany(Motor::getClass(), 'webequiv', 'EQUI_CODIG', 'EQUI_MOTOR');
    }

    // - Attributes

    // ID
    public function getIdAttribute()
    {
        return $this->attributes['INV_CODIGO'];
    }

    public function getCodigoAttribute()
    {
        return $this->getIdAttribute();
    }

    // descripcion
    public function getDescripcionAttribute()
    {
        return $this->attributes['INV_DESCRI'];
    }

    // id pieza
    public function getIdPiezaAttribute()
    {
        return $this->attributes['INV_PZA_ID'];
    }

    // imagenes
    public function getImagenesAttribute()
    {
        return [
            $this->getImagen1Attribute(),
            $this->getImagen2Attribute(),
            $this->getImagen3Attribute(),
            $this->getImagen4Attribute()
        ];
    }

    public function getImagen1Attribute()
    {
        return $this->buildImageAttribute(1);
    }

    public function getImagen2Attribute()
    {
        return $this->buildImageAttribute(2);
    }

    public function getImagen3Attribute()
    {
        return $this->buildImageAttribute(3);
    }

    public function getImagen4Attribute()
    {
        return $this->buildImageAttribute(4);
    }

    // Status
    public function getStatusAttribute()
    {
        return $this->attributes['INV_STATUS'];
    }

    // destacado
    public function getDestacadoAttribute()
    {
        return $this->attributes['INV_DESTAC'];
    }

    // slug
    public function getSlugAttribute()
    {
        // Slug column is not populated, that's why we need to generate this
        return Str::slug($this->getDescripcionAttribute());
        //return $this->attributes['INV_SLUG'];
    }

    // existe
    public function getExisteAttribute()
    {
        return $this->attributes['INV_EXISTE'];
    }

    // precio
    public function getPrecioAttribute()
    {
        return $this->attributes['INV_PRECIO'];
    }

    // tiene descuento
    public function getHasDescuento()
    {
        $pd = $this->getDescuentoAttribute();
        return $pd != 0 && $pd != 100;
    }

    // porcentaje descuento
    public function getDescuentoAttribute()
    {
        return Money::percentage(
            $this->getPrecioPromocionAttribute(),
            $this->getPrecioAttribute()
        );
    }

    public function getPrecioActualAttribute()
    {
        return $this->getPromocionAttribute() ?
            $this->getPrecioPromocionAttribute()
            : $this->getPrecioAttribute();
    }

    // promocion
    public function getPromocionAttribute()
    {
        return $this->attributes['INV_PROMOC'];
    }

    public function getPrecioPromocionAttribute()
    {
        return $this->attributes['INV_PREPRO'];
    }

    protected function buildImageAttribute($number)
    {
        return new ImageWithThumbnail(
            'productos/img' . $number,
            'productos/th' . $number,
            $this->attributes['INV_IMAGE' . $number]
        );
    }

    // Presenters

    public function getUrlAttribute()
    {
        return route('item', [
            $this->getSlugAttribute(),
            $this->getIdAttribute()
        ]);
    }

    public function getShowPrecioActualAttribute()
    {
        return Money::format($this->getPrecioActualAttribute());
    }

    public function getPrecioActualSinIvaAttribute()
    {
        return Money::getWithoutIva($this->getPrecioActualAttribute());
    }

    public function getShowPrecioActualSinIvaAttribute()
    {
        return Money::format($this->getPrecioActualSinIvaAttribute());
    }

}
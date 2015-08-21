<?php namespace Direco\Entities;

use Direco\Base\Entity;

class PedidoDireccion extends Entity {

    protected $table = 'pedidos_dir';

    // - Relationships

    public function pedido()
    {
        return $this->belongsTo(Pedido::getClass(), 'DIR_NUMERO');
    }

    // - Attributes

    public function getPedidoId()
    {
        return $this->attributes['DIR_NUMERO'];
    }

    /**
     * Avenida / Calle / Esquina / Carrera:
     */
    public function getDireccion1Attribute()
    {
        return $this->attributes['DIR_DIR1'];
    }

    /**
     * Edificio / Residencia / Quinta / Local:
     */
    public function getDireccion2Attribute()
    {
        return $this->attributes['DIR_DIR2'];
    }

    /**
     * Piso / Nivel / Apartamento / Oficina:
     */
    public function getDireccion3Attribute()
    {
        return $this->attributes['DIR_DIR3'];
    }

    /**
     * Urbanización / Zona / Sector:
     */
    public function getDireccion4Attribute()
    {
        return $this->attributes['DIR_DIR4'];
    }

    /**
     * Punto de referencia
     */
    public function getDireccion5Attribute()
    {
        return $this->attributes['DIR_DIR5'];
    }

    /**
     * Persona de Contacto
     */
    public function getContactoAttribute()
    {
        return $this->attributes['DIR_PERSON'];
    }

    /**
     * Telefono Habitación
     * Ejem +58-241-1234567
     */
    public function getTelefonoAttribute()
    {
        return $this->attributes['DIR_TELEFO'];
    }

    /**
     * Teléfono Celular
     * Ejem +58-414-1415441
     */
    public function getCelularAttribute()
    {
        return $this->attributes['DIR_CELULA'];
    }

    /**
     * Estado ID es el nombre del Estado
     * @return string
     */
    public function getEstadoAttribute()
    {
        return $this->attributes['DIR_ESTADO'];
    }

    /**
     * Municipio ID es el nombre del Municipio
     * @return string
     */
    public function getMunicipioAttribute()
    {
        return $this->attributes['DIR_MUNICI'];
    }

    /**
     * Parroquia ID es el nombre de la Parroquia
     * @return string
     */
    public function getParroquiaAttribute()
    {
        return $this->attributes['DIR_PARROQ'];
    }

} 
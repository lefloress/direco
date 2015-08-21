<?php namespace Direco\Entities;

use Direco\Base\Entity;

class PedidoItem extends Entity {

    protected $table = 'pedidos_det';

    // - Relationships

    public function pedido()
    {
        return $this->belongsTo(Pedido::getClass(), 'MOV_DOCUME');
    }

    public function item()
    {
        return $this->belongsTo(Inventario::getClass(), 'MOV_CODIGO');
    }

    // - Attributes

    /**
     * número del pedido
     */
    public function getPedidoIdAttribute()
    {
        return $this->attributes['MOV_DOCUME'];
    }

    /**
     * código del artículo
     */
    public function getItemIdAttribute()
    {
        return $this->attributes['MOV_CODIGO'];
    }

    /**
     * codigo unidad de medida
     *
     */
    public function getUnidadMedidaAttribute()
    {
        return $this->attributes['MOV_UNDMED'];
    }

    /**
     * cantidad por unidad de medida.
     * Valor por defecto uno (1).
     * Se utilizá para identificar cantidad compuestas,
     * Ejem 1 CAJA de 12 PZA, este campo tendrá el valor de 12
     */
    public function getCantidadUnidadAttribute()
    {
        return $this->attributes['MOV_CXUND'];
    }

    /**
     * cantidad de artículos
     */
    public function getCantidadAttribute()
    {
        return $this->attributes['MOV_CANTID'];
    }

    /**
     * Tasa de IVA GN 12.00
     * Tasa de IVA, este campo debe ser agregado en la tabla de artículos.
     * Donde se indicará la tasa de IVA cuando se suba la información.
     */
    public function getIvaAttribute()
    {
        return $this->attributes['MOV_IVA'];
    }

    /**
     * Precio del artículo - Monto de Impuesto
     * Precio del artículo, debe desglosar el monto de IVA.
     * Ejemplo: 3000 Bs Precio de Venta 2678,59 Bs Precio sin IVA
     */
    public function getPrecioAttribute()
    {
        return $this->attributes['MOV_PRECIO'];
    }

    /**
     * Total Renglon: MOV_CANTID*MOV_PRECIO
     * Total del Renglon, se utiliza para totalizar el artículo.
     */
    public function getTotalAttribute()
    {
        return $this->attributes['MOV_TOTAL'];
    }

    /**
     * 0 Por exportar / 1 Exportado
     * Indicador de registro (Exportado Si / No)
     */
    public function getExportarAttribute()
    {
        return $this->attributes['MOV_EXPDAT'];
    }

} 
<?php namespace Direco\Entities;

use Direco\Base\Entity;

class Pedido extends Entity {

    protected $table = 'pedidos';

    // - Relationships

    public function usuario()
    {
        return $this->belongsTo(Usuario::getClass(), 'id_usuario');
    }

    public function direccion()
    {
        return $this->hasOne(Direccion::getClass(), 'id_direccion');
    }

    public function items()
    {
        return $this->hasMany(PedidoItem::getClass(), 'id_pedido');
    }

    // - Attributes

    /**
     * Numero de pedido
     * Rif del Cliente
     */
    public function getIdAttribute()
    {
        return $this->attributes['DOC_NUMERO'];
    }

    /**
     * Codigo del Cliente
     * correlativo - Ej: 0000000001
     */
    public function getUsuarioIdAttribute()
    {
        return $this->attributes['DOC_CODIGO'];
    }

    /**
     * fecha del pedido
     * aaaa/mm/dd
     */
    public function getFechaAttribute()
    {
        return $this->attributes['DOC_FECHA'];
    }

    /**
     * hora del pedido
     * 00:00:01 al 23:59:59
     */
    public function getHoraAttribute()
    {
        return $this->attributes['DOC_HORA'];
    }

    /**
     * plazo (dias de vigencia del documento)
     * Dias de Plazo (parametrizable)
     */
    public function getPlazoAttribute()
    {
        return $this->attributes['DOC_PLAZO'];
    }

    /**
     * Fecha de Vencimiento del pedido
     * DOC_FECHA + PLAZO
     */
    public function getFechaVencimientoAttribute()
    {
        return $this->attributes['DOC_FCHVEN'];
    }

    /**
     * Tipo de Despacho
     * Valores: T (Tienda) D (Domicilio)
     */
    public function getTipoDespachoAttribute()
    {
        return $this->attributes['DOC_TIPDES'];
    }

    /**
     * Estados del documento
     * van a ir cambiando según se vaya comprobando
     * cada etápa de proceso de ventas.
     *
     * Valores:
     * PE (Pendiente)
     * VP (Verificación de Pago)
     * FV (Facturación de venta)
     * DV (Devolución de Venta)
     * EM (Empaquetando)
     * DE (Despachado (Viajando))
     */
    public function getEstadoAttribute()
    {
        return $this->attributes['DOC_ESTADO'];
    }

    /**
     * Base Imponible
     * Base neta
     */
    public function getSubtotalAttribute()
    {
        return $this->attributes['DOC_BASNET'];
    }

    /**
     * Monto de IVA
     */
    public function getIvaAttribute()
    {
        return $this->attributes['DOC_MTOIVA'];
    }

    /**
     * Total documento
     * Base neta + IVA
     */
    public function getTotalAttribute()
    {
        return $this->attributes['DOC_NETO'];
    }

    /**
     * Indicador de registro (Exportado Si / No)
     * 0 Por exportar / 1 Exportado
     */
    public function getExportarAttribute()
    {
        return $this->attributes['DOC_EXPDAT'];
    }

} 
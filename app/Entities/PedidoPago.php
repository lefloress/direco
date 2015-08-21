<?php namespace Direco\Entities;

use Direco\Base\Entity;

class PedidoPago extends Entity
{

    protected $table = 'pedidos_fp';

    // - Relationships

    public function pedido()
    {
        return $this->belongsTo(Pedido::getClass(), 'REC_NUMERO');
    }

    // - Attributes

    /**
     * número del pedido
     */
    public function getPedidoIdAttribute()
    {
        return $this->attributes['REC_NUMERO'];
    }

    /**
     * ITEM del registro
     * item incremental.
     * Es posible incluir más de un (1) registro de Pago por cada pedido.
     * 0001,0002,000N Y se reinicia para cada nuevo registro de pago.
     * Se puede liminar a uno 4 o 5 formas de pago por documento
     * (debe ser parametrizable esta cantidad)
     */
    public function getIdAttribute()
    {
        return $this->attributes['REC_ITEM'];
    }

    /**
     * Tipo de Transacción
     * Valores:
     * TRA (transferencia Bancaria)
     * DEP (deposito bancario)
     */
    public function getTipoAttribute()
    {
        return $this->attributes['REC_TIPO'];
    }

    /**
     * Codigo del Banco, FK con tabla bancos
     */
    public function getBancoIdAttribute()
    {
        return $this->attributes['REC_CODBCO'];
    }

    /**
     * Numero de Cuenta Bancaria
     */
    public function getCuentaAttribute()
    {
        return $this->attributes['REC_CUENTA'];
    }

    /**
     * Fecha de registro de la transacción
     */
    public function getFechaAttribute()
    {
        return $this->attributes['REC_FECHA'];
    }

    /**
     * Numero de Transacción bancaria
     * Numero de Deposito o Transferencia
     */
    public function getNumeroAttribute()
    {
        return $this->attributes['REC_NUMTRA'];
    }

    /**
     * Monto de la Transacción
     */
    public function getMontoAttribute()
    {
        return $this->attributes['REC_MONTO'];
    }

    /**
     * Estado de la Transacción
     * Valores:
     * V (Verificando con el banco)
     * R (rechazado) A (Aprobado)
     */
    public function getEstadoAttribute()
    {
        return $this->attributes['REC_ESTADO'];
    }

    /**
     * Motivo en caso que sea rechazada la transacción
     * Motivos Ejem R (rechazado) motivo: Rechazado por el Banco.
     */
    public function getMotivoAttribute()
    {
        return $this->attributes['REC_MOTIVO'];
    }

}
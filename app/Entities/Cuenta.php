<?php namespace Direco\Entities;

use Direco\Base\Entity;

class Cuenta extends Entity {

    protected $table = 'cuentas_ban';

    public function getBancoIdAttribute()
    {
        return $this->attributes['CTA_CODBAN'];
    }

    public function getCodigoAttribute()
    {
        return $this->attributes['CTA_CODIGO'];
    }

    public function getActivaAttribute()
    {
        return $this->attributes['CTA_ACTIVA'];
    }

} 
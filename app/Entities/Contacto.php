<?php namespace Direco\Entities;

use Direco\Base\Entity;

class Contacto extends Entity {

    protected $table = 'contactos';  

    protected $fillable = array('nombre', 'correo', 'telefono', 'empresa', 'mensaje');

}

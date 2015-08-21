<?php namespace Direco\Entities;

use Direco\Base\Entity;

class Contenido extends Entity {

    protected $table = 'contenido';
    public $timestamps = false;

    protected $fillable = array(
        'titulo',
        'imagen',
        'contenido',
        'orden',
        'slug_url',
        'meta_description',
        'estatus',
        'fecha'
    );

}

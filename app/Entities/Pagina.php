<?php namespace Direco\Entities;

use Direco\Base\Entity;

class Pagina extends Entity {

    protected $table = 'paginas';
    public $timestamps = false;

    protected $fillable = array(
        'titulo',
        'seccion',
        'slug_url',
        'estatus',
        'orden',
        'contenido'
    );

}

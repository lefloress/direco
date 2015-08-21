<?php

return array(

    'menu' => array(
        'home'  => [
            'title' => 'Inicio',
            'route' => 'home'
        ],
        'nosotros'   => [
            'route'  => 'paginas.show',
            'params' => ['pagina' => 'nosotros']
        ],
        'noticias'   => [
            //'route' => 'noticias'
            'url' => 'noticias'
        ],
        'servicios'   => [
            'route'  => 'paginas.show',
            'params' => ['pagina' => 'servicios']
        ],
        'informacion'   => [
            'route'  => 'paginas.show',
            'params' => ['pagina' => 'informacion']
        ],
        'catalogo'   => [
            'title' => 'Catálogo',
            'route' => 'marcas'
        ],
        'contactos'   => [
            'title' => 'Contáctanos',
            'url' => 'contactanos'
        ],
    )

);

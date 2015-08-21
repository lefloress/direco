<?php

return array(

    'menu' => array(
        'usuarios'  => [
            'title' => 'Usuarios',
            'route' => 'admin.usuarios.index'
        ],
        'pedidos'   => [
            'title' => 'Pedidos',
            //'route' => 'admin.pedidos.index'
            'url' => '#'
        ],
        'paginas'   => [
            'title' => 'Paginas',
            'url'   => '#',
            'submenu' => [
                'nosotros'    => [
                    'route' => 'admin.paginas.index',
                    'params' => ['section' => 'nosotros']
                ],
                'informacion' => [
                    'route' => 'admin.paginas.index',
                    'params' => ['section' => 'informacion']
                ],
                'servicios'   => [
                    'route' => 'admin.paginas.index',
                    'params' => ['section' => 'servicios']
                ]
            ]
        ],
        'contenido'  => [
            'title' => 'Contenido',
            'url'   => '#',
            'submenu' => [
                'noticias'    => [
                    'route' => 'admin.contenido.index',
                    'params' => ['noticias']
                ],
                'promociones' => [
                    'route' => 'admin.contenido.index',
                    'params' => ['promociones']
                ]
            ]
        ],
        'contactos' => [
            'title' => 'Contactos',
            'route' => 'admin.contactos.index'
        ],
    )

);

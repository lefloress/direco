<?php

$router->get('', [
    'uses' => 'DashboardController@index',
    'as'   => 'admin.dashboard'
]);

$router->post('usuarios/cambiar-clave/{id}', 'UsersController@cambiarClave');

$router->resource('usuarios', 'UsersController');

// Paginas
$router->get('paginas/{section}', [
    'as'   => 'admin.paginas.index',
    'uses' => 'PagesController@index'
]);
$router->get('paginas/{section}/create', [
    'as'   => 'admin.paginas.create',
    'uses' => 'PagesController@create'
]);
$router->post('paginas/{section}/store', [
    'as'   => 'admin.paginas.store',
    'uses' => 'PagesController@store'
]);
$router->get('paginas/{section}/{id}', [
    'as'   => 'admin.paginas.show',
    'uses' => 'PagesController@show'
]);
$router->get('paginas/{section}/{id}/edit', [
    'as'   => 'admin.paginas.edit',
    'uses' => 'PagesController@edit'
]);
$router->put('paginas/{section}/{id}', [
    'as'   => 'admin.paginas.update',
    'uses' => 'PagesController@update'
]);
$router->delete('paginas/{section}/{id}', [
    'as'   => 'admin.paginas.destroy',
    'uses' => 'PagesController@destroy'
]);

// Contenido (Noticias y Promociones)
$router->get('contenido/{content}', [
    'as'   => 'admin.contenido.index',
    'uses' => 'ContentController@index'
]);
$router->get('contenido/{content}/create', [
    'as'   => 'admin.contenido.create',
    'uses' => 'ContentController@create'
]);
$router->post('contenido/{content}/store', [
    'as'   => 'admin.contenido.store',
    'uses' => 'ContentController@store'
]);
$router->get('contenido/{content}/{id}', [
    'as'   => 'admin.contenido.show',
    'uses' => 'ContentController@show'
]);
$router->get('contenido/{content}/{id}/edit', [
    'as'   => 'admin.contenido.edit',
    'uses' => 'ContentController@edit'
]);
$router->put('contenido/{content}/{id}', [
    'as'   => 'admin.contenido.update',
    'uses' => 'ContentController@update'
]);
$router->delete('contenido/{content}/{id}', [
    'as'   => 'admin.contenido.destroy',
    'uses' => 'ContentController@destroy'
]);

$router->resource('contactos', 'ContactosController');
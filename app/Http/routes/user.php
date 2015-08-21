<?php

// Auth
$router->get('logout', 'AuthController@logout');

// Perfil
$router->get('perfil-de-usuario', [
    'as'   => 'profile',
    'uses' => 'ProfileController@index'
]);
$router->get('perfil-de-usuario/editar', [
    'as'   => 'profile.edit',
    'uses' => 'ProfileController@edit'
]);
$router->put('perfil-de-usuario/editar', [
    'as'   => 'profile.update',
    'uses' => 'ProfileController@update'
]);
$router->get('usuario/cambiar-clave', [
    'as'   => 'password.edit',
    'uses' => 'ProfileController@changePassword'
]);
$router->put('usuario/cambiar-clave', [
    'as'   => 'password.update',
    'uses' => 'ProfileController@updatePassword'
]);

// Pedidos

$router->get('finalizar-pedido', [
    'as'   => 'orders.index',
    'uses' => 'OrdersController@index'
]);
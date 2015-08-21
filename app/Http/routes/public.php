<?php

// Home

$router->get('/', [
    'as'   => 'home',
    'uses' => 'HomeController@index'
]);

// Login

$router->get('login', 'AuthController@login');
$router->post('login', 'AuthController@auth');

$router->controller('recuperar-contrasena', 'PasswordController');

// Paginas
$router->get('{section}/{url?}', [
    'as'   => 'paginas.show',
    'uses' => 'PagesController@show'
]);

// Contenido (Noticias y Promociones)
$router->get('{content}', [
    'as'   => 'contenido.index',
    'uses' => 'ContentController@index'
]);
$router->get('{content}/{url}', [
    'as'   => 'contenido.show',
    'uses' => 'ContentController@show'
]);

// Contacto
$router->get('contactanos', 'ContactController@index');
$router->post('contactanos', 'ContactController@store');

// Catalogo

$router->get('/repuestos', [
    'as'   => 'marcas',
    'uses' => 'MarcasController@index'
]);

$router->get('/repuestos-para-{slug}/{id}' ,[
	'as'   => 'marca',
	'uses' => 'MarcasController@show'
]);

$router->get('/repuestos-para-{marcaSlug}/{modeloSlug}/{motorSlug}/{motorId}' ,[
	'as'   => 'motor',
	'uses' => 'MotoresController@show'
]);

$router->get('/{piezaSlug}/{marcaSlug}/{modeloSlug}/{motorSlug}/{piezaId}/{motorId}' ,[
    'as'   => 'pieza',
    'uses' => 'PiezasController@show'
]);

$router->get('{itemSlug}/{id}', [
    'as'   => 'item',
    'uses' => 'ItemsController@show'
]);

// Registro
$router->get('/registro', [
    'as'   => 'register',
    'uses' => 'RegisterController@index'
]);

$router->post('/registro', [
    'as'   => 'register.save',
    'uses' => 'RegisterController@register'
]);

$router->get('/registro/confirmacion/{id}/{token}', [
    'as'   => 'register.confirmation',
    'uses' => 'RegisterController@confirmation'
]);

$router->controller('combos', 'CombosController');

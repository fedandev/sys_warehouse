<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();


//Gets
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('ajustes/get', 'AjusteController@getData');
Route::get('provincias/{id}','ProvinciasController@getProvincias');
Route::get('categorias/subs/{id}', 'CategoriaController@getHijos');
Route::get('ListaCaracteristicas/','CaracteristicaController@getCaracteristicas');
Route::get('detalle_caracteristica/{id}','Caracteristicas_detalleController@getDetalleCaracteristica');
Route::get('ListaMarcas/','MarcaController@getMarcas');

//Pots
Route::post('productos/combinacion','ProductoController@CreoCombinaciones');



//Rutas Generales
Route::resource('ajustes', 'AjusteController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('menus', 'MenuController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('pais', 'PaisController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('marcas', 'MarcaController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('clientes', 'ClienteController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('provincias', 'ProvinciasController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('localidades', 'LocalidadController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('productos', 'ProductoController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('grupo_atributos', 'Grupo_atributoController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('atributos', 'AtributoController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('grupos_caracteristicas', 'CaracteristicaController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('caracteristicas_detalles', 'Caracteristicas_detalleController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('categorias', 'CategoriaController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);


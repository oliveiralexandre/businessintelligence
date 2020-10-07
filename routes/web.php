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

//*** SITE ***

Route::get('/', 'PaginasController@index');
Route::get('/destaques/{destaque}', 'PaginasController@destaque');
Route::get('/blog', 'PaginasController@noticias');
Route::get('/teste', 'PaginasController@teste');
Route::get('/apple', 'PaginasController@apple');
Route::get('/servicos', 'PaginasController@servicos');
Route::get('/servicos/{servico}', 'PaginasController@servico');
Route::get('/sobre', 'PaginasController@sobre');
Route::get('/contato', 'PaginasController@contato');
Route::get('/obrigado', 'PaginasController@obrigado');
Route::get('/noticias', 'BlogController@index');
Route::get('/noticias/{post}', 'BlogController@post');
Route::post('/posts/{post}/comment', 'BlogController@comment')->middleware('auth');


 //*** PAINEL ADMINISTRAÇÃO ***

Auth::routes();
Route::get('/profile', 'Auth\\ProfileController@index')->middleware('auth');

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'HomeController@index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::resource('/posts', 'PostController');
    Route::put('/posts/{post}/publish', 'PostController@publish')->middleware('admin');
    Route::resource('/categories', 'CategoryController', ['except' => ['show']]);
    Route::resource('/tags', 'TagController', ['except' => ['show']]);
    Route::resource('/comments', 'CommentController', ['only' => ['index', 'destroy']]);
    Route::resource('/users', 'UserController', ['middleware' => 'admin', 'only' => ['index', 'destroy']]);
    
    //***SOBRE***

	Route::get('/sobre',['as'=>'admin.sobre', 'uses'=>'AboutController@index']);
	Route::get('/sobre/editar/{id}',['as'=>'admin.sobre.editar', 'uses'=>'AboutController@editar']);
    Route::put('/sobre/atualizar/{id}',['as'=>'admin.sobre.atualizar', 'uses'=>'AboutController@atualizar']);
    
    //***SERVIÇOS***
    
	Route::get('/servicos',['as'=>'admin.servicos', 'uses'=>'ServicosController@index']);
	Route::get('/servicos/editar/{id}',['as'=>'admin.servicos.editar', 'uses'=>'ServicosController@editar']);
	Route::put('/servicos/atualizar/{id}',['as'=>'admin.servicos.atualizar', 'uses'=>'ServicosController@atualizar']);
    

    //***Destaques***
    
    Route::resource('/destaques', 'DestaquesController');
	Route::get('/destaques',['as'=>'admin.destaques', 'uses'=>'DestaquesController@index']);
	Route::get('/destaques/editar/{id}',['as'=>'admin.destaques.editar', 'uses'=>'DestaquesController@editar']);
	Route::put('/destaques/atualizar/{id}',['as'=>'admin.destaques.atualizar', 'uses'=>'DestaquesController@atualizar']);
});

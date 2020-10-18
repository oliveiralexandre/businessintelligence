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
//Route::get('/destaques/{destaque}', 'PaginasController@destaque');

Route::get('/blog', 'PaginasController@blog');

//Route::get('/servicos', 'PaginasController@servicos');
//Route::get('/servicos/{servico}', 'PaginasController@servico');
//Route::get('/sobre', 'PaginasController@sobre');
//Route::get('/contato', 'PaginasController@contato');
Route::get('/obrigado', 'PaginasController@obrigado');
//Route::get('/noticias', 'BlogController@index');
Route::get('/blog/{blog}', 'BlogController@blog');
//Route::post('/blogs/{post}/comment', 'BlogController@comment')->middleware('auth');


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

    //***blog***

	Route::get('/blog',['as'=>'admin.blog', 'uses'=>'BlogController@index']);
	Route::get('/blog/adicionar',['as'=>'admin.blog.adicionar', 'uses'=>'BlogController@adicionar']);
	Route::post('/blog/salvar',['as'=>'admin.blog.salvar', 'uses'=>'BlogController@salvar']);
	Route::get('/blog/editar/{id}',['as'=>'admin.blog.editar', 'uses'=>'BlogController@editar']);
	Route::put('/blog/atualizar/{id}',['as'=>'admin.blog.atualizar', 'uses'=>'BlogController@atualizar']);
	Route::get('/blog/deletar/{id}',['as'=>'admin.blog.deletar', 'uses'=>'BlogController@deletar']);

	 //***Categoria***

	Route::get('/categoria',['as'=>'admin.categoria', 'uses'=>'CategoriaController@index']);
	Route::get('/categoria/adicionar',['as'=>'admin.categoria.adicionar', 'uses'=>'CategoriaController@adicionar']);
	Route::post('/categoria/salvar',['as'=>'admin.categoria.salvar', 'uses'=>'CategoriaController@salvar']);
	Route::get('/categoria/editar/{id}',['as'=>'admin.categoria.editar', 'uses'=>'CategoriaController@editar']);
	Route::put('/categoria/atualizar/{id}',['as'=>'admin.categoria.atualizar', 'uses'=>'CategoriaController@atualizar']);
	Route::get('/categoria/deletar/{id}',['as'=>'admin.categoria.deletar', 'uses'=>'CategoriaController@deletar']);


});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	
});


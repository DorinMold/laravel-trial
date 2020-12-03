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


Route::get('/', function () {
    return view('welcome'); 
});
 
*/

Route::group(['middleware'=> ['web']], function(){
    Route::get('/blog/{slug}', ['as'=>'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
    Route::get('/', 'HomeController@index');
    Route::get('/vizualizeaza', 'HomeController@vizualizeaza');
    //Route::get('/pagina/{info}', 'HomeController@reflux');
    
    Route::get('/despre', 'HomeController@despre')->name('posts.despre');
    Route::get('/contact', 'HomeController@contact');
    Route::post('/contact', 'HomeController@postContact'); // EMAIL
    Route::get('/utilizatori/{id}', 'HomeController@utilizatori')->name('dev');
    Route::get('/venetic', 'HomeController@venetic');
    Route::get('/colectii', 'HomeController@colectii')->name('colectii');
    Route::get('/creare', 'HomeController@createnew')->name('posts.create');
    Route::post('/salvare', 'HomeController@salvare')->name('posts.salvare');
    Route::get('/dev', 'HomeController@devmarketerall');
    Route::get('/posts', 'HomeController@index')->name('posts.index');
    Route::get('/post/editare/{post}', 'HomeController@editare')->name('posts.editare');
    Route::get('/post/{show}', 'HomeController@arata')->name('posts.show');
    Route::post('/comentarii/{mes_id}', [ 'uses' => 'ComentariuController@store', 'as' => 'comentarii.store']);
    Route::get('/comentarii/{id}/edit', ['uses' => 'ComentariuController@edit', 'as' => 'comentarii.editare']);
    Route::put('/comentarii/{id}', ['uses' => 'ComentariuController@update', 'as' => 'comentarii.actualizare']);
    //diferenta intre delete si destroy este cat de permanenta este stergerea
    Route::get('/comentarii/{id}/sterge', ['uses' => 'ComentariuController@sterge', 'as' => 'comentarii.sterge']);

    Route::delete('comentarii/{id}', ['uses' => 'ComentariuController@destroy', 'as' => 'comentarii.distrugere' ]);
    Route::post('/post/actualizare/{show}', 'HomeController@actualizare')->name('post.actualizare');
    Route::delete('/post/stergere/{post}', 'HomeController@stergere')->name('posts.stergere');
    //RESOURCE RESOURCE RESOURCE RESOURCE RESOURCE RESOURCE RESOURCE RESOURCE
    Route::resource('/categories', 'CategoryController', ['except' => [ 'create' ]]); // "only" in loc de except
    //Route::get('/{hhh}', 'HomeController@despre')->name('posts.despre');
    Route::get('/caterinca/{hhh}', 'HomeController@despre')->name('posts.despre');
    Route::get('/categories', 'CategoryController@index')->name('categories.index');
    Route::resource('/tags', 'TagController', ['except' => ['create']]);
    Route::resource('/comentarii', 'ComentariuController', ['except' => ['store', 'destroy', 'edit']]);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

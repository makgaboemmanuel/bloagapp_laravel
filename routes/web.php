<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('blog.index');
}); */

Route::get('/', ['uses' => 'BlogController@index',
                 'as' => 'blog'
] );


Route::get('/blog/{post}', [
        'uses' => 'BlogController@show',
        'as' => 'blog.show' ]
);

/* user added code  */
Route::get('/category/{category}', [
    'uses' => 'BlogController@category',
    'as' => 'category' ]
);

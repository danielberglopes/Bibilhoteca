<?php
namespace App\Http\Middleware;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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


Route::match([ 'get',  'post'], '/', [Controller::class, 'login']);

Route::resource('products', ProductsController::class, )->middleware('admin');

Route::get('/index', function(){
    return view ('index');
});

Route::prefix('posts')->group(function () {
    Route::get('index', [PostsController::class, 'index']);
    Route::post('store', [PostsController::class, 'store']);
    Route::post('edit', [PostsController::class, 'edit']);
    Route::match(['get', 'post'], '/auth', [Controller::class, 'auth'])->name('auth.uer');
    Route::delete('destroy', [PostsController::class, 'destroy']);
})->middleware('admin');

Route::match(['get', 'post'], '/osuario', [Controller::class, 'Admin'])->middleware('osuario');

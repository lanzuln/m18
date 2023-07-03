<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get( '/', function () {
// 	return view( 'welcome' );
// } );

Route::get( '/', [ postController::class, 'index' ] );
Route::get( '/category/{categoryId}/postCount', [ postController::class, 'getPostCountByCategory' ] );
Route::delete( '/posts/{id}/delete', [ PostController::class, 'deletePost' ] );
Route::get( '/posts/getSoftDeleted', [ PostController::class, 'getSoftDeletedPosts' ] );
Route::get( '/categories/{id}/latest-post', [ CategoryController::class, 'getLatestPost' ] );
Route::get('/categories/latest-post', [CategoryController::class, 'index']);
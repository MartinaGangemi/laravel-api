<?php

use App\Http\Controllers\API\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('posts', function (){
//     $posts = Post ::all();
//     return response()->jsnon([
//         'status_code'=>200,
//         'posts'=>$posts,
//     ]);
// });


Route::get('posts', 'API\PostController@index');
Route::get('categories', 'API\CategoryController@index');
Route::get('tags', 'API\TagController@index');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    $user = App\Models\User::latest()->first();
    if(!$user){
        $data = ["message" => "No user found. Please run `sail db:seed` first."];
        return response()->json($data, 404);
    }
    return redirect()->route('profile', ['user' => $user]);
});


Route::get('/profile/{user}', [UserProfileController::class, 'show'])->name('profile');

Route::get('/posts', [PostController::class, 'all'])->name('posts');
Route::post('/posts', [PostController::class, 'save'])->name('save_post');
Route::post('/posts/update/{post_id}', [PostController::class, 'update'])->name('update_post');
Route::get('/posts/add', [PostController::class, 'add'])->name('add_post');
Route::get('/posts/edit/{post_id}', [PostController::class, 'edit'])->name('edit_post');
Route::get('/posts/{post_id}', [PostController::class, 'get'])->name('post');


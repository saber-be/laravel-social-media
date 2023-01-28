<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
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

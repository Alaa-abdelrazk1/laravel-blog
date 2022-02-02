<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Postcontroller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\post;
use App\Models\User;

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
Route::get('/posts',[Postcontroller::class,'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create',[Postcontroller::class,'create'])->name('posts.create')->middleware('auth');
Route::post('/posts',[Postcontroller::class,'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/{post}/edit',[Postcontroller::class,'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update')->middleware('auth');
Route::get('/posts/{post}',[Postcontroller::class,'show'])->name('posts.show')->middleware('auth');
Route::delete('/posts/{post}',[Postcontroller::class,'destroy'])->name('posts.destroy');

Auth::routes();
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');


Route::get('/auth2/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google');


Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
    $user = User::where('github_id', $githubUser->id)->first();
    if ($user) {
        $user->update([
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    }

    Auth::login($user,true);

    return redirect()->route('posts.index');
    // $user->token
});

Route::get('/auth2/callback', function () {
    $googleUser = Socialite::driver('google')->user();
    $user = User::where('google_id', $googleUser->id)->first();
    if ($user) {
        $user->update([
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
    }

    Auth::login($user,true);

    return redirect()->route('posts.index');
    // $user->token
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

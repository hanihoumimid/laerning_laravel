<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = [];

    if (auth()->check()){
    $posts = auth()->user()->userCoolposts()->latest()->get();
    }
    // $posts = Post::where(column: 'user_id', auth()->id())->get();
    return view('home', ['posts' => $posts]);
});


Route::post('/register',[UserController::class, 'register']);

Route::post('/logout', [UserController::class,'logout']);

Route::post('login', [UserController::class,'login']);

Route::post('/create-post', [PostController::class, 'createPost']);

Route::get('/edit-post/{post}', action: [PostController::class,'showEditScreen']);

Route::put('/edit-post/{post}', action: [PostController::class,'actuallyUpdatePost']);

Route::delete('/delete-post/{post}', action: [PostController::class,'deletePost']);
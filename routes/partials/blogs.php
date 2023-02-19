<?php

use App\Http\Controllers\BlogsController;
use Illuminate\Support\Facades\Route;


Route::view('/create-blog-view','partials.create-blog-view')->name('create-blog-view');

Route::get('/edit-blog-view/{id}',[BlogsController::class,'editBlogView'])->name('edit-blog-view');

Route::post('/save-blog',[BlogsController::class,'createBlog'])->name('save-blog');

Route::post('/edit-blog/{id}',[BlogsController::class,'editBlogById'])->name('edit-blog');

Route::get('/delete-blog/{id}',[BlogsController::class,'deleteBlogById'])->name('delete-blog');

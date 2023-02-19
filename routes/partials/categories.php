<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;


Route::get('/create-categories-view',[CategoriesController::class,'createCategoriesView'])->name('create-categories-view');

Route::post('/save-categorie',[CategoriesController::class,'saveCategorie'])->name('save-categorie');

Route::get('/delete-categorie/{id}',[CategoriesController::class,'deleteCategorieById'])->name('delete-categorie');

Route::post('update-categorie/{id}',[CategoriesController::class,'updateCategorieById'])->name('update-categorie');
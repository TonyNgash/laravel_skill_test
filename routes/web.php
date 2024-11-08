<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyFormController;


// Route::get('/', function () {
//     return view('my_form');
// });

Route::get('/', [MyFormController::class, "showForm"]);
Route::post('/save-form', [MyFormController::class,"saveForm"]);

Route::get('/show-edit-form/{id}',[MyFormController::class,"showEditForm"]);
Route::post('/save-edited-form',[MyFormController::class,"saveEditedForm"]);
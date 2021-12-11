<?php

use App\Http\Controllers\AddUserToElasticController;
use Illuminate\Support\Facades\Route;

Route::post('/add_user_to_elastic', AddUserToElasticController::class);

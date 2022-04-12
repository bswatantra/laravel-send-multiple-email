<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMailController;

Route::get('/', SendMailController::class);

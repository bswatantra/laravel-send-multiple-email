<?php

use App\Models\User;
use App\Notifications\SendMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMailController;


// Route::get('/', function () {

// 	$users = User::all();

// 	foreach ($users as $key => $user) {
// 		$user->notify(new SendMail($user));
// 	}
// 	// return view('welcome');
// 	return 'main sent.';
// });



Route::get('/', SendMailController::class);

<?php

use App\Models\User;
use App\Notifications\SendMail;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

	$users = User::all();

	foreach ($users as $key => $user) {
		$user->notify(new SendMail());
	}
	// return view('welcome');
	return 'main sent.';
});

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SendMail;
use Illuminate\Support\Facades\Http;

class SendMailController extends Controller
{
	public function __invoke()
	{

		// return User::data;
		// cal api and get data form api with HTTP client
		// $response = Http:::retry(3, 100)->get('http://worldlink.com/users');
		$users = User::all();

		$users->each(function ($user, $key) {
			// $user->notify(new SendMail($user, 'welcome'));
			$user->notify((new SendMail($user, 'welcome'))->delay(5));
		});
		return 'mail sent.';
	}
}

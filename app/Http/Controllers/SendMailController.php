<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SendMail;

class SendMailController extends Controller
{
	public function __invoke()
	{
		$users = User::all();

		$users->each(function ($user, $key) {
			// $user->notify(new SendMail($user, 'welcome'));
			$user->notify((new SendMail($user, 'welcome'))->delay(5));
		});
		return 'mail sent.';
	}
}

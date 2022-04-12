<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SendMail;

class SendMailController extends Controller
{
	public function __invoke()
	{
		$users = User::all();
		foreach ($users as $user) {
			$user->notify(new SendMail($user));
		}
		return 'mail sent.';
	}
}

<?php

namespace App\Http\Controllers;

use App\Notifications\SendMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;

class SendMailController extends Controller
{
	public function __invoke()
	{
		$data =  request()->all();
		$type = $data['type'];
		unset($data['type']);
		foreach ($data['users'] as $user) {
			// Notification::send($user, new SendMail($user, lcfirst($type)));

			Notification::route('mail', $user['email'])->notify(new SendMail($user, $type));
		}
		return response()->json(['message' => 'Mail added to queue.'], 200);
	}



	public function validate_attributes($user)
	{
		// dd($user);
		request()->validate($user, [
			'username' => 'required',
			'email' => 'required|email',
		]);
	}
}

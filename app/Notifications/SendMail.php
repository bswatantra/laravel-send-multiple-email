<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendMail extends Notification implements ShouldQueue
{
	use Queueable;

	public $tries = 3; // Max tries
	public $timeout = 15; // Timeout seconds

	public $user;
	public $type;


	/**
	 * Create a new notification instance.
	 *
	 * @return void
	 */
	public function __construct($user, $type)
	{
		$this->user = $user;
		$this->type = $type;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function via($notifiable)
	{
		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable)
	{
		// return (new MailMessage)
		// 	->line('The introduction to the notification.')
		// 	->action('Notification Action', url('/'))
		// 	->line('Thank you for using our application!');

		return (new MailMessage)->view('emails.' . $this->type, ['user' => $this->user]);
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return array
	 */
	public function toArray($notifiable)
	{
		return [
			'user' => $this->user
		];
	}

	public function failed()
	{
		info('This job has failed.');
	}
}

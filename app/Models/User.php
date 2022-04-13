<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	const data = [
		[
			'type' => 'welcome',
			[
				'name' => 'Swatantra',
				'email' => 'swatantra@gmail.com',
				'mobile' => 9845477440,
				'address' => 'kathmandu'
			],
			[
				'name' => 'Aron',
				'email' => 'arun@gmail.com',
				'mobile' => 9845477440,
				'address' => 'kathmandu'
			],
		],
		[
			'type' => 'expired',
			[
				'name' => 'Swatantra',
				'email' => 'swatantra@gmail.com',
				'mobile' => 9845477440,
				'address' => 'kathmandu',
				'activated_at' => '2022-02-01',
				'expired_at' => '2022-02-30',
			],
			[
				'name' => 'Aron',
				'email' => 'arun@gmail.com',
				'mobile' => 9845477440,
				'address' => 'kathmandu',
				'activated_at' => '2022-02-01',
				'expired_at' => '2022-02-30',
			],
		],
		[
			'type' => 'suspended',
			[
				'name' => 'Swatantra',
				'email' => 'swatantra@gmail.com',
				'mobile' => 9845477440,
				'address' => 'kathmandu',
				'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, perspiciatis.'
			],
			[
				'name' => 'Aron',
				'email' => 'arun@gmail.com',
				'mobile' => 9845477440,
				'address' => 'kathmandu',
				'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, perspiciatis.'
			],
		],

	];
}

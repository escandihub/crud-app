<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

class LoginProvidersController extends Controller
{
	public function redirectToProvider($provider)
	{
		$validated = $this->validateProvider($provider);
		if (!is_null($validated)) {
			return $validated;
		}
		return Socialite::driver($provider)
			->stateless()
			->redirect();
	}

	public function handleProviderCallback($provider)
	{
        \Log::info('manejandro autentificacion');;
		$validated = $this->validateProvider($provider);
		if (!is_null($validated)) {
			return $validated;
		}
		try {
			$user = Socialite::driver($provider)
				->stateless()
				->user();
		} catch (ClientException $exception) {
			return response()->json(
				[
					"error" => "Credenciales invalidas",
				],
				422
			);
		}
		$userCreated = User::findOrCreate(
			[
				"email" => $user->getEmail(),
			],
			[
				"email_verified_at" => now(),
				"name" => $user->getName(),
				// 'avatar' => $user->getAvatar
			]
		);
		$userCreated->providers()->updateOrCreate(
			[
				"provider" => $provider,
				"provider_id" => $user->getId(),
			],
			[
				"avatar" => $user->getAvatar(),
			]
		);

		$token = $userCreated->createToken("token-prov")->plainTextToken;
		return response()->json(
			[
				"token" => $token,
				"user" => $userCreated,
			],
			200
		);
	}

	public function validateProvider($provider)
	{
		if (!in_array($provider, ["facebook"])) {
			return response()->json(
				[
					"error" => "Por favor, registrese usando facebook",
				],
				200
			);
		}
	}
}

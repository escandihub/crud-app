<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use GuzzleHttp\Exception\ClientException;

class LoginProvidersController extends Controller
{
	public function redirectToProvider($provider)
	{
		$validated = $this->validateProvider($provider);
		if (!is_null($validated)) {
			return $validated;
		}
		return [
			'url' => Socialite::driver($provider)
			->stateless()
			->redirect()->getTargetUrl()];
	}

	public function handleProviderCallback($provider)
	{
		$validated = $this->validateProvider($provider);
		if (!is_null($validated)) {
			return $validated;
		}
		try {
			$user = Socialite::driver($provider)->stateless()->user();
		} catch (ClientException $exception) {
			return response()->json(
				[
					"error" => "Credenciales invalidas",
				],
				422
			);
		}
		$userCreated = User::firstOrCreate(
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
		
		return view('Oauth.callback', [
			"token" => $token
		]);
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
		if (!in_array($provider, ["facebook", "github"])) {
			return response()->json(
				[
					"error" => "Por favor, registrese usando facebook, github",
				],
				200
			);
		}
	}
}

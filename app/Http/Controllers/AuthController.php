<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function login(Request $request)
	{
		$request->validate([
			"email" => "required|email",
			"password" => "required",
		]);
		$user = User::where("email", $request->email)->first();
		if (!$user || !Hash::check($request->password, $user->password)) {
			throw ValidationException::withMessages([
				"email" => ["Las credenciales son incorrectas."],
			]);
		}

		return response()->json([
			'token' => $user->createToken($user->name)->plainTextToken,
			'user' => $user
		], 200);
	}

	public function logout(Request $request)
	{
		return $request->user()->tokens()->delete();
	}
}

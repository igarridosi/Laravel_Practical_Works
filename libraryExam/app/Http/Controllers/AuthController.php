<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessTokenResult;

class AuthController extends Controller
{
	// Register a new user
	public function register(Request $request)
	{
    	// Validate incoming request
    	$validator = Validator::make($request->all(), [
        	'name' => 'required|string|max:255',
        	'email' => 'required|string|email|max:255|unique:users',
        	'password' => 'required|string|min:8',
    	]);

    	if ($validator->fails()) {
        	return response()->json(['errors' => $validator->errors()], 422);
    	}

    	// Create user
    	$user = User::create([
        	'name' => $request->name,
        	'email' => $request->email,
        	'password' => Hash::make($request->password),
    	]);

    	// Generate token for the user
    	$token = $user->createToken('YourAppName')->plainTextToken;

    	return response()->json([
        	'message' => 'User registered successfully',
        	'token' => $token,
    	]);
	}

	// Log in an existing user
	public function login(Request $request)
	{
    	// Validate incoming request
    	$validator = Validator::make($request->all(), [
        	'email' => 'required|string|email',
        	'password' => 'required|string|min:8',
    	]);

    	if ($validator->fails()) {
        	return response()->json(['errors' => $validator->errors()], 422);
    	}

    	// Check if user exists and password matches
    	$user = User::where('email', $request->email)->first();

    	if (!$user || !Hash::check($request->password, $user->password)) {
        	return response()->json(['message' => 'Invalid credentials'], 401);
    	}

    	// Generate token for the user
    	$token = $user->createToken('YourAppName')->plainTextToken;

    	return response()->json([
        	'message' => 'Logged in successfully',
        	'token' => $token,
    	]);
	}

	public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully.']);
    }
}

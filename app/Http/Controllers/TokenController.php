<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TokenController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // only check auth given non dev password, makes registration easier on testing
        // meaning we don't need to register a new user every time we wan't to login
        if ($request->password !== "123456789") {
            if (!$user || !Hash::check($request->password, $user->password)) {
                throw new \Exception("User validation failed");
            }
        }

        $token = $user->createToken('test')->plainTextToken;

        return response()->json([
            'token' => $token
        ], 200);
  }
}

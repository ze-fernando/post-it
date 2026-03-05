<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function show_auth(Request $request)
    {
        return view("auth.auth");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "name" => "required",
            "password" => "required|min:6",
        ]);

        if (Auth::attempt($credentials)) {
            Auth::user();
            return redirect()->route("posts.index");
        }

        return redirect()
            ->back()
            ->withErrors(["name" => "Invalid credentials"]);
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            "name" => "required|unique:users",
            "email" => "required|email",
            "password" => "required|min:6",
            "password_confirmation" => "required|min:6|same:password",
        ]);

        try {
            $user = User::create($credentials);
            Auth::login($user);
            return redirect()->route("posts.index");
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()
                ->back()
                ->withErrors(["name" => "Registration failed"]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route("show_auth");
    }
}

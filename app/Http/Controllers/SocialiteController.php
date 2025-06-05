<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback(Request $request)
    {
        try {
            $googleuser = Socialite::driver('google')->user();
            $user = User::where('google_id', $googleuser->getId())->first();
            if ($user) {
                Auth::login($user);
                return redirect()->route('dashboard')->with('status', 'Logged in successfully!');
            } else {
                // If user does not exist, create a new user
                $newuser = User::create([
                    'name' => $googleuser->getName(),
                    'email' => $googleuser->getEmail(),
                    'google_id' => $googleuser->getId(),
                    'password' => bcrypt('password'),
                ]);
            }
            if ($newuser) {
                Auth::login($newuser);
                return redirect()->route('dashboard')->with('status', 'Logged in successfully!');
            }

        } catch (\Exception $e) {
            return redirect()->route('login')->with('status', 'Failed to login with Google: ');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleAuthentication()
    {

        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)->first();





            $formattedName = preg_replace('/\s+/', '_', $googleUser->getName());

            if ($user) {
                Auth::login($user);
                return redirect()->route('user.dashboard');
            } else {
                $userData = User::create([
                    'name' => $googleUser->name,
                    'username' => User::generateUniqueUsername($formattedName),
                    'email' => $googleUser->email,
                    'password' => Hash::make('Abc@1234'),
                    'google_id' => $googleUser->id,
                ]);
            }

            if ($userData) {
                Auth::login($userData);
                return redirect()->route('user.dashboard');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    //    ---------------------------- Facebook Login --------------------------

    public function facebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookAuthentication()
    {

        try {
            $facebookUser = Socialite::driver('facebook')->user();

            $user = User::where('facebook_id', $facebookUser->id)->first();





            $formattedName = preg_replace('/\s+/', '_', $facebookUser->getName());

            if ($user) {
                Auth::login($user);
                return redirect()->route('user.dashboard');
            } else {
                $userData = User::create([
                    'name' => $facebookUser->name,
                    'username' => User::generateUniqueUsername($formattedName),
                    'email' => $facebookUser->email,
                    'password' => Hash::make('Abc@1234'),
                    'facebook_id' => $facebookUser->id,
                ]);
            }

            if ($userData) {
                Auth::login($userData);
                return redirect()->route('user.dashboard');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}

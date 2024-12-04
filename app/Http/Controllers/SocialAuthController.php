<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->stateless()->user();

        // Find or create a user
        $user = User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName(),
                'password' => bcrypt(str_random(16)), // Dummy password
                'provider_id' => $socialUser->getId(),
                'provider' => $provider,
            ]
        );

        // Log in the user
        Auth::login($user);

        return redirect('/home'); // Redirect to your desired location
    }
}

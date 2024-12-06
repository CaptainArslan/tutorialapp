<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        try {
            if ($provider === 'facebook') {
                return Socialite::driver($provider)
                    ->scopes(['email']) // Request email permission
                    ->redirect();
            } else {
                // Default redirect for other providers
                return Socialite::driver($provider)->redirect();
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Failed to connect to ' . ucfirst($provider) . ': ' . $e->getMessage());
        }
    }


    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->stateless()->user();

        // Generate a random password
        $password = Str::random(10);

        // Find or create a user
        $user = User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName(),
                'password' => Hash::make($password), // Dummy password
                'provider_id' => $socialUser->getId(),
                'provider' => $provider,
            ]
        );

        // Log in the user
        Auth::login($user);

        return to_route('dashboard'); // Redirect to your desired location
    }
}

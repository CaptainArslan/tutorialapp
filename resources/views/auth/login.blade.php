<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}

    {{-- theme login --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="{{ route('dashboard') }}" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        {{-- <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="22"> --}}
                                        <x-application-dark-logo class="" height="22" />
                                    </span>
                                </a>

                                <a href="{{ route('dashboard') }}" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <x-application-light-logo class="" height="22" />
                                    </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3">
                                {{ __('Enter your email address and password to access dashboard.') }}
                            </p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <x-input-label for="email-address" :value="__('Email Address')" class="form-label" />
                                <x-text-input id="email-address" type="email" name="email" :value="old('email')"
                                    required autofocus autocomplete="email"
                                    placeholder="{{ __('Enter your email') }}" />
                                <x-input-error :messages="$errors->get('email')" class="" />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="password" :value="__('Password')" class="form-label" />
                                <div class="input-group input-group-merge">
                                    <x-text-input type="password" id="password" name="password" required
                                        placeholder="{{ __('Enter your password') }}" />
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked
                                        name="remember">
                                    <label class="form-check-label"
                                        for="checkbox-signin">{{ __('Remember me') }}</label>
                                </div>
                            </div>

                            <div class="text-center d-grid">
                                <x-primary-button type="submit">
                                    {{ __('Log in') }}
                                </x-primary-button>
                            </div>

                        </form>

                        <div class="text-center">
                            <h5 class="mt-3 text-muted">Sign in with</h5>
                            <ul class="social-list list-inline mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);"
                                        class="social-list-item border-primary text-primary"><i
                                            class="mdi mdi-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                            class="mdi mdi-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ route('social.login', 'github') }}"
                                        class="social-list-item border-secondary text-secondary">
                                        <i class="mdi mdi-github"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
                @if (Route::has('password.request'))
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p>
                                <a href="auth-recoverpw.html"
                                    class="text-white-50 ms-1">{{ __('Forgot your password?') }}</a>
                            </p>
                            <p class="text-white-50">{{ __('Don\'t have an account?') }}
                                <a href="{{ route('register') }}" class="text-white ms-1">
                                    <b>{{ __('Sign Up') }}</b>
                                </a>
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-guest-layout>

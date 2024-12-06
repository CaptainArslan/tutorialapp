<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="card bg-pattern">
                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="{{ route('dashboard') }}" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <x-application-dark-logo height="22" />
                                    </span>
                                </a>
                                <a href="{{ route('dashboard') }}" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <x-application-light-logo height="22" />
                                    </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3">
                                {{ __('Don\'t have an account? Create your account, it takes less than a minute') }}
                            </p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <x-input-label for="name" :value="__('Name')" class="form-label" />
                                <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus
                                    autocomplete="name" class="form-control" placeholder="{{ __('Enter your name') }}" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Email Address')" class="form-label" />
                                <x-text-input id="email" type="email" name="email" :value="old('email')" required
                                    autocomplete="email" class="form-control" placeholder="{{ __('Enter your email') }}" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <x-input-label for="password" :value="__('Password')" class="form-label" />
                                <div class="input-group input-group-merge">
                                    <x-text-input id="password" type="password" name="password" required
                                        autocomplete="new-password" class="form-control"
                                        placeholder="{{ __('Enter your password') }}" />
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />
                                <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                                    required autocomplete="new-password" class="form-control"
                                    placeholder="{{ __('Confirm your password') }}" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                    <label class="form-check-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                </div>
                            </div>
                            <div class="text-center d-grid">
                                <x-primary-button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </x-primary-button>
                            </div>
                        </form>
                        <div class="text-center">
                        <h5 class="mt-3 text-muted">Sign In with</h5>
                        <ul class="social-list list-inline mt-3 mb-0">
                        </ul>
                        {{-- <li class="list-inline-item">
                                    <a href="{{ route('social.login', 'facebook') }}" class="social-list-item border-primary text-primary">
                                        <i class="mdi mdi-facebook"></i>
                                    </a>
                                </li> --}}
                                <li class="list-inline-item">
                                    <a href="{{ route('social.login', 'google') }}"
                                        class="social-list-item border-danger text-danger">
                                        <i class="mdi mdi-google"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ route('social.login', 'github') }}"
                                        class="social-list-item border-secondary text-secondary">
                                        <i class="mdi mdi-github"></i>
                                    </a>
                                </li>
                        </div>    
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
                <div class="text-center mt-3">
                            <p class="text-muted">
                                {{ __('Already have an account?') }}
                                <a href="{{ route('login') }}" class="text-white ms-1">
                                    <b>{{ __('Sign In') }}</b>
                                </a>
                            </p>
                        </div>
            </div>
        </div>
    </div>
</x-guest-layout>

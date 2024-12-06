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
                                {{ __('Enter your email address and we\'ll send you an email with instructions to reset your password.') }}
                            </p>
                        </div>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Email')" class="form-label" />
                                <x-text-input id="email" type="email" name="email" :value="old('email')" required
                                    autofocus class="form-control" placeholder="{{ __('Enter your email address') }}" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="text-center d-grid">
                                <x-primary-button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </x-primary-button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <p class="text-muted">
                                {{ __('Back to') }}
                                <a href="{{ route('login') }}" class="text-primary ms-1">
                                    <b>{{ __('Log in') }}</b>
                                </a>
                            </p>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>
        </div>
    </div>
</x-guest-layout>

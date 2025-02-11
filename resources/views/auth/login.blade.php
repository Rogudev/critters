<x-guest-layout>
    <div class="container kalam-regular">
            <div class="row">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
            </div>

            <div class="row">
                <div class="px-4 py-2 rounded bg-white">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" class="form-control" type="email" name="email"
                                value="{{ old('email') }}" required autofocus autocomplete="username">
                            <div class="invalid-feedback d-block">
                                @foreach ($errors->get('email') as $error)
                                    <span>{{ $error }}</span><br>
                                @endforeach
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" class="form-control" type="password" name="password" required
                                autocomplete="current-password">
                            <div class="invalid-feedback d-block">
                                @foreach ($errors->get('password') as $error)
                                    <span>{{ $error }}</span><br>
                                @endforeach
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label for="remember_me" class="form-check-label">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <button type="submit" class="btn btn-primary ms-3">
                                {{ __('Log in') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>





</x-guest-layout>

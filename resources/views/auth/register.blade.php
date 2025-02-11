<x-guest-layout>
    
    <div class="px-4 py-2 rounded bg-white kalam-regular">
        <form method="POST" action="{{ route('register') }}">
            @csrf
        
            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                <div class="invalid-feedback d-block">
                    @foreach ($errors->get('name') as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            </div>
        
            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                <div class="invalid-feedback d-block">
                    @foreach ($errors->get('email') as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            </div>
        
            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                <div class="invalid-feedback d-block">
                    @foreach ($errors->get('password') as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            </div>
        
            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                <div class="invalid-feedback d-block">
                    @foreach ($errors->get('password_confirmation') as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
            </div>
        
            <div class="d-flex justify-content-between align-items-center">
                <a class="btn btn-link p-0" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
        
                <button type="submit" class="btn btn-primary ms-3">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
        
    </div>

</x-guest-layout>

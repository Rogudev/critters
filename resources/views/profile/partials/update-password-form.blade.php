<section>
    <header>
        <h2 class="h4 text-dark">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
            <div class="invalid-feedback d-block">
                @foreach ($errors->updatePassword->get('current_password') as $error)
                    <span>{{ $error }}</span><br>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
            <div class="invalid-feedback d-block">
                @foreach ($errors->updatePassword->get('password') as $error)
                    <span>{{ $error }}</span><br>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
            <div class="invalid-feedback d-block">
                @foreach ($errors->updatePassword->get('password_confirmation') as $error)
                    <span>{{ $error }}</span><br>
                @endforeach
            </div>
        </div>

        <div class="d-flex align-items-center gap-2">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-muted mb-0"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

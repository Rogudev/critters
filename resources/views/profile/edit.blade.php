<x-app-layout>
    <div class="container">

        <x-slot name="header">
            <h2 class="fw-semibold fs-4 text-dark">
                {{ __('Profile') }}
            </h2>
        </x-slot>

        <div class="py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</x-app-layout>

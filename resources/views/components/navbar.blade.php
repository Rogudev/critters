<nav class="navbar navbar-expand-lg bg-body-tertiary nav-vh">
    <div class="container-fluid">
        <a class="ms-4" href="/"><img src="/media/logo/logo-light.png" alt="" class="img-fluid"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto kalam-light">
                <a class="nav-link fs-5 mx-3" aria-current="page" href="{{ route('critters.all') }}">Use the
                    crittopedia</a>

                @if (Route::has('login'))
                    @auth
                        <a class="nav-link fs-5 mx-3" aria-current="page" href="{{ url('/profile') }}">Profile</a>

                        <a class="nav-link fs-5 mx-3" aria-current="page" href="{{ route('critters.register') }}">Register a
                            critter</a>

                        <a class="nav-link fs-5 mx-3" aria-current="page" href="{{ route('critters.myRegisters') }}">My
                            registrations</a>
                    @else
                        <a class="nav-link fs-5 mx-3" aria-current="page" href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a class="nav-link fs-5 mx-3" aria-current="page" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth

                @endif

                <a class="nav-link fs-5 mx-3" aria-current="page" href="{{ route('howToUse') }}">How to use</a>

                @if (Route::has('login'))
                    @auth
                        <a class="nav-link fs-5 mx-3" aria-current="page" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                @endif

            </div>
        </div>
    </div>
</nav>

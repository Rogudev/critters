<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('components.head')

<body>

    @include('components.navbar')
    
    <main class="container-fluid min-main-vh pt-5"
        style="background-image: url('/media/bg/appBg.png'); background-repeat: no-repeat; background-size: cover">
        
        {{ $slot }}

    </main>

</body>

</html>

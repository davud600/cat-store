<!DOCTYPE html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('head')
    <title>Cat Store</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <x-header />

    <div id="portal" class="relative">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <x-alert error="{{ $error }}" />
        @endforeach
        @endif

        @if (session('status'))
        <x-alert error="{{ session('status') }}" />
        @endif
    </div>

    <main class="overflow-x-hidden bg-neutral-900">
        @yield('content')
    </main>

    <x-footer />
</body>

</html>
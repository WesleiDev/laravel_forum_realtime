<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <header>
        @include('layouts.default.header')
    </header>

    <main>
        <section id="app">
            @yield('content')
        </section>
    </main>

    <div id="loader">
        <loader></loader>
    </div>
    @include('layouts.default.footer')


    @component('layouts.default.bodyscript')
        @yield('scripts')
    @endcomponent
</body>

</html>
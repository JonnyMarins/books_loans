<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="w-[90%] mx-auto">
    <header class="flex justify-between p-4">
        <span class="text-3xl font-semibold">Library Management</span>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="/books">Books</a></li>
                <li><a href="/authors">Authors</a></li>
                <li><a href="/loans">Loans</a></li>
            </ul>
        </nav>
    </header>
    <main id="main-container">
        @yield('content')
    </main>
</body>

</html>

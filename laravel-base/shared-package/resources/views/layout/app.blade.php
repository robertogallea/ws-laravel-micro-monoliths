<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Demo Micro Monoliti - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
</head>
<body class="bg-gray-50 text-gray-900">
<!-- Header -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">Demo Micro Monoliti</h1>
        @guest
        <nav class="space-x-4">
            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
        </nav>
        @endguest
        @auth
            <nav class="space-x-4">
                <a href="#" class="text-gray-600 hover:text-gray-900">{{ auth()->user()->name }}</a>
                <a href="{{ route('logout') }}" class="text-gray-600 hover:text-gray-900">Logout</a>
            </nav>
        @endauth
    </div>
</header>

<!-- Layout principale -->
<div class="flex min-h-screen max-w-7xl mx-auto px-4 mt-6 space-x-6">
    <!-- Sidebar -->
    <x:main-menu/>

    <!-- Contenuto principale -->
    <main class="flex-1">
        <div class="bg-white p-6 rounded-xl shadow-sm">
            <h2 class="text-2xl font-bold mb-4">@yield('title')</h2>
            <div>
            @yield('content')
            </div>
        </div>
    </main>
</div>

<!-- Footer -->
<footer class="mt-10 border-t py-6 text-center text-sm text-gray-500">
    © 2025 Il Tuo Nome. Tutti i diritti riservati.
</footer>
</body>
</html>

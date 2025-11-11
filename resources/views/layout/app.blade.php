<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>@yield('page_title') - Laravel Micro-Monoliths @ {{ gethostname() }}</title>

    <!-- Tailwind da CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bg: '#fcfcfd',
                        ink: '#111216',
                        muted: '#e9ebef',
                        card: '#ffffff',
                        'neon-pink': '#ff35b8',
                        'neon-green': '#00ffa3',
                        'electric-blue': '#2fb7ff',
                        'acid-yellow': '#eaff00',
                    }
                }
            }
        }
    </script>
    <style>
        :root {
            --neon-pink: #ff35b8;
            --neon-green: #00ffa3;
            --electric-blue: #2fb7ff;
            --acid-yellow: #eaff00;
        }

        .glow-neon {
            box-shadow: 0 0 16px var(--neon-pink), 0 0 32px var(--electric-blue);
        }
    </style>
</head>
<body class="bg-bg text-ink antialiased min-h-screen flex flex-col">
<!-- HEADER con menu -->
<header class="sticky top-0 z-40 bg-bg/80 backdrop-blur border-b border-muted/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="#" class="flex items-center gap-2 font-semibold tracking-tight">
                <span class="size-3 rounded-full bg-neon-pink shadow-[0_0_12px] shadow-neon-pink/70"></span>
                <span>Laravel <span class="text-neon-pink">Micro</span><span class="text-electric-blue">Monoliths</span></span>
            </a>
            <nav class="hidden md:flex items-center gap-6 text-sm">
                <a class="hover:text-neon-pink transition-colors" href="/users">Utenti</a>
                <a class="hover:text-electric-blue transition-colors" href="/products">Prodotti</a>
                <a class="hover:text-neon-green transition-colors" href="/orders">Ordini</a>
            </nav>
            <span class="text-xs">{{ gethostname() }}</span>
            @guest
                <a href="/login"
                   class="hidden md:inline-flex items-center rounded-full px-4 py-2 text-sm font-medium bg-ink text-bg hover:bg-lime-800 transition-colors">Login</a>
            @endguest
            @auth
                <div class="flex flex-row items-center space-x-4">
                    <div>{{ auth()->user()->name }}</div>
                    <form method="post" action="/logout">
                        @csrf
                        <button type="submit"
                                class="hidden md:inline-flex items-center rounded-full px-4 py-2 text-sm font-medium bg-ink text-bg hover:bg-electric-blue transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</header>

<!-- CONTENITORE CON TABELLA (GRID) -->
<main class="flex-1 flex items-start justify-center p-8">
    <div class="w-full max-w-5xl bg-card rounded-3xl shadow-lg border border-muted/70 p-8">
        <header class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h1 class="text-2xl font-bold tracking-tight">@yield('title')</h1>
        </header>

        <!-- Struttura grid per la "tabella" -->
        @yield('content')
    </div>
</main>
<footer class="text-center">{{ gethostname() }}</footer>
</body>
</html>

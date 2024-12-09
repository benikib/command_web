<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta and links remain the same -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connexion</title>
    <!-- Other necessary links -->
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-r from-blue-50 to-blue-100 dark:from-neutral-900 dark:to-neutral-800 flex items-center justify-center min-h-screen">

    <!-- Page Content -->
    <main class="w-full max-w-md p-4">
        <div class="bg-white/80 backdrop-blur-sm border border-gray-200 rounded-2xl shadow-lg dark:bg-neutral-800/80 dark:border-neutral-700">
            <div class="p-8">
                <!-- En-tête -->
                <div class="mb-8 text-center">
                    <img src="{{ asset('path/to/your/logo.png') }}" alt="Logo" class="h-12 mx-auto mb-4">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Connexion</h1>
                    <p class="mt-3 text-gray-600 dark:text-gray-300">
                        Pas encore de compte ?
                        <a class="text-blue-600 hover:text-blue-700 font-semibold transition-colors dark:text-blue-400"
                           href="{{ route('register') }}">
                            Créer un compte
                        </a>
                    </p>
                </div>

                <!-- Messages d'erreur -->
                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="mb-4 p-4 rounded-lg bg-red-50 dark:bg-red-900/50 border border-red-200 dark:border-red-800">
                        <div class="text-sm text-red-600 dark:text-red-400">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Formulaire de connexion -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Adresse email
                        </label>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-neutral-700 dark:border-neutral-600 dark:text-white dark:focus:ring-blue-400"
                               required
                               autofocus>
                    </div>

                    <!-- Mot de passe -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Mot de passe
                        </label>
                        <input type="password"
                               id="password"
                               name="password"
                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-neutral-700 dark:border-neutral-600 dark:text-white dark:focus:ring-blue-400"
                               required>
                    </div>

                    <!-- Options supplémentaires -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox"
                                   id="remember_me"
                                   name="remember"
                                   class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-neutral-600 dark:bg-neutral-700">
                            <label for="remember_me" class="ml-2 text-sm text-gray-600 dark:text-gray-300">
                                Se souvenir de moi
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-600 hover:text-blue-700 dark:text-blue-400 hover:underline"
                               href="{{ route('password.request') }}">
                                Mot de passe oublié ?
                            </a>
                        @endif
                    </div>

                    <!-- Bouton de connexion -->
                    <button type="submit"
                            class="w-full py-3 px-4 text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-800">
                        Se connecter
                    </button>
                </form>

                <!-- Séparateur -->



            </div>
        </div>
    </main>


</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta and links remain the same -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>inscription</title>
    <!-- Other necessary links -->
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-r from-blue-50 to-blue-100 dark:from-neutral-900 dark:to-neutral-800 flex items-center justify-center min-h-screen">

    <main class="w-full max-w-2xl p-4">
        <div class="bg-white/80 backdrop-blur-sm border border-gray-200 rounded-2xl shadow-lg dark:bg-neutral-800/80 dark:border-neutral-700">
            <div class="p-8">
                <!-- Logo ou Image (optionnel) -->
                <div class="mb-8 text-center">
                    <img src="{{ asset('path/to/your/logo.png') }}" alt="Logo" class="h-12 mx-auto mb-4">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Créer un compte</h1>
                    <p class="mt-3 text-gray-600 dark:text-gray-300">
                        Déjà un compte ?
                        <a class="text-blue-600 hover:text-blue-700 font-semibold transition-colors dark:text-blue-400" href="{{ route('login') }}">
                            Connexion
                        </a>
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    <!-- Les champs de formulaire -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nom</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-neutral-700 dark:border-neutral-600 dark:text-white dark:focus:ring-blue-400"
                                required>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-neutral-700 dark:border-neutral-600 dark:text-white dark:focus:ring-blue-400"
                                required>
                        </div>

                        <!-- Grade -->
                        <div>
                            <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Grade</label>
                            <input type="text" id="grade" name="grade"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-neutral-700 dark:border-neutral-600 dark:text-white dark:focus:ring-blue-400"
                                required>
                        </div>

                        <!-- Filière -->
                        <div>
                            <label for="filiere" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Filière</label>
                            <input type="text" id="filiere" name="filiere"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-neutral-700 dark:border-neutral-600 dark:text-white dark:focus:ring-blue-400"
                                required>
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Mot de passe</label>
                            <input type="password" id="password" name="password"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-neutral-700 dark:border-neutral-600 dark:text-white dark:focus:ring-blue-400"
                                required>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Confirmer le mot de passe</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-neutral-700 dark:border-neutral-600 dark:text-white dark:focus:ring-blue-400"
                                required>
                        </div>
                    </div>

                    <!-- Terms -->
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="remember-me" name="remember-me"
                            class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-neutral-600 dark:bg-neutral-700">
                        <label for="remember-me" class="text-sm text-gray-600 dark:text-gray-300">
                            J'accepte les <a href="#" class="text-blue-600 hover:underline dark:text-blue-400">conditions d'utilisation</a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full py-3 px-4 text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-800">
                        S'inscrire
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

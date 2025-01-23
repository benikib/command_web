<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://preline.co/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Discover the difference that a professionally crafted website can make for your business.">

    <meta name="twitter:site" content="@preline">
    <meta name="twitter:creator" content="@preline">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Agency Demo Template Tailwind CSS | Preline UI, crafted with Tailwind CSS">
    <meta name="twitter:description"
        content="Discover the difference that a professionally crafted website can make for your business.">
    <meta name="twitter:image" content="https://preline.co/assets/img/og-image.png">

    <meta property="og:url" content="https://preline.co/">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Preline">
    <meta property="og:title" content="Agency Demo Template Tailwind CSS | Preline UI, crafted with Tailwind CSS">
    <meta property="og:description"
        content="Discover the difference that a professionally crafted website can make for your business.">
    <meta property="og:image" content="https://preline.co/assets/img/og-image.png">

    <!-- Title -->
    <title>pvs</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://preline.co/favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Theme Check and Update -->
    <script>
        const html = document.querySelector('html');
        const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || (localStorage.getItem('hs_theme') === 'auto' && !window.matchMedia('(prefers-color-scheme: dark)').matches);
        const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || (localStorage.getItem('hs_theme') === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);

        if (isLightOrAuto && html.classList.contains('dark')) html.classList.remove('dark');
        else if (isDarkOrAuto && html.classList.contains('light')) html.classList.remove('light');
        else if (isDarkOrAuto && !html.classList.contains('dark')) html.classList.add('dark');
        else if (isLightOrAuto && !html.classList.contains('light')) html.classList.add('light');
    </script>

    <!-- CSS Preline -->
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
</head>

<body class="bg-neutral-900">
    <!-- ========== HEADER ========== -->
    <header class="fixed w-full top-0 z-50 bg-neutral-900/80 backdrop-blur-xl border-b border-neutral-800">
        <nav class="max-w-[85rem] w-full mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a class="flex-none text-xl font-semibold text-white" href="/" aria-label="PVS">
                    <div class="flex items-center gap-x-3">
                        <svg class="w-8 h-8 text-yellow-400" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>PVs</span>
                    </div>
                </a>
                <!-- End Logo -->

                <!-- Navigation -->
                <div class="hidden md:flex md:items-center md:gap-x-8">
                    <a class="text-sm text-gray-300 hover:text-white transition" href="#features">
                        Fonctionnalités
                    </a>
                    <a class="text-sm text-gray-300 hover:text-white transition" href="#about">
                        À propos
                    </a>
                    <a class="text-sm text-gray-300 hover:text-white transition" href="#contact">
                        Contact
                    </a>
                </div>
                <!-- End Navigation -->

                <!-- Auth Buttons -->
                @if (Route::has('login'))
                    <div class="flex items-center gap-x-4">
                        @auth
                            <a href="{{ url('/commandes.index') }}"
                                class="inline-flex items-center gap-x-2 py-2 px-4 text-sm font-medium text-gray-900 bg-yellow-400 rounded-lg hover:bg-yellow-300 transition">
                                Tableau de bord
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                                    <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-white transition">
                                Connexion
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="inline-flex items-center gap-x-2 py-2 px-4 text-sm font-medium text-gray-900 bg-yellow-400 rounded-lg hover:bg-yellow-300 transition">
                                    Inscription
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
                <!-- End Auth Buttons -->

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button type="button"
                        class="hs-collapse-toggle flex items-center gap-x-2 text-sm font-medium text-gray-300 hover:text-white"
                        data-hs-collapse="#navbar-collapse-mobile" aria-controls="navbar-collapse-mobile"
                        aria-label="Toggle navigation">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path class="hs-collapse-open:hidden" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path class="hs-collapse-open:block hidden" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!-- End Mobile Menu Button -->
            </div>

            <!-- Mobile Menu -->
            <div id="navbar-collapse-mobile" class="hidden md:hidden mt-4">
                <div class="flex flex-col gap-y-4 py-4">
                    <a class="text-sm text-gray-300 hover:text-white transition" href="#features">
                        Fonctionnalités
                    </a>
                    <a class="text-sm text-gray-300 hover:text-white transition" href="#about">
                        À propos
                    </a>
                    <a class="text-sm text-gray-300 hover:text-white transition" href="#contact">
                        Contact
                    </a>
                </div>
            </div>
            <!-- End Mobile Menu -->
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        <!-- Hero -->
        <div class="bg-neutral-900">
            <div class="max-w-5xl mx-auto px-4 xl:px-0 pt-24 lg:pt-32 pb-24">
                <h1 class="font-semibold text-white text-5xl md:text-6xl">
                    <span class="text-yellow-400">Gestion des Procès-verbaux d'Examens:</span>
                    Une Solution Complète pour la Surveillance
                </h1>
                <div class="max-w-4xl">
                    <p class="mt-5 text-white text-lg">
                        Notre plateforme offre une solution intégrée pour la gestion des procès-verbaux d'examens
                        universitaires.
                        Simplifiez la documentation, le suivi et l'analyse de vos surveillances d'examens avec nos
                        outils
                        spécialement conçus pour les établissements d'enseignement supérieur.
                    </p>

                    <!-- Boutons d'action -->
                    <div class="mt-8 flex flex-wrap gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="inline-flex items-center px-6 py-3 bg-yellow-400 text-gray-900 font-medium rounded-lg hover:bg-yellow-300 transition">
                                Accéder au tableau de bord
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('register') }}"
                                class="inline-flex items-center px-6 py-3 bg-yellow-400 text-gray-900 font-medium rounded-lg hover:bg-yellow-300 transition">
                                Commencer maintenant
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Fonctionnalités -->
        <div class="bg-neutral-800 py-16">
            <div class="max-w-5xl mx-auto px-4 xl:px-0">
                <h2 class="text-3xl font-bold text-white mb-12">Nos Fonctionnalités Principales</h2>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Carte 1 -->
                    <div class="bg-neutral-800 p-6 rounded-lg">
                        <div class="text-yellow-400 mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-white text-xl font-semibold mb-2">Gestion Simplifiée</h3>
                        <p class="text-neutral-400">Créez et gérez facilement vos procès-verbaux d'examens en quelques
                            clics.</p>
                    </div>

                    <!-- Carte 2 -->
                    <div class="bg-neutral-800 p-6 rounded-lg">
                        <div class="text-yellow-400 mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-white text-xl font-semibold mb-2">Suivi en Temps Réel</h3>
                        <p class="text-neutral-400">Surveillez l'avancement et générez des rapports détaillés
                            instantanément.</p>
                    </div>

                    <!-- Carte 3 -->
                    <div class="bg-neutral-800 p-6 rounded-lg">
                        <div class="text-yellow-400 mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <h3 class="text-white text-xl font-semibold mb-2">Sécurité Avancée</h3>
                        <p class="text-neutral-400">Protection des données et gestion sécurisée des accès utilisateurs.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Case Stories -->

        <!-- Testimonials -->

        <!-- End Testimonials -->
        <!-- Contact -->
        <div class="bg-neutral-900" id="contact">
            <div class="max-w-5xl px-4 xl:px-0 py-16 lg:py-24 mx-auto">
                <!-- Title -->
                <div class="max-w-3xl mb-12">
                    <h2 class="text-white font-semibold text-3xl md:text-4xl mb-4">Contactez-nous</h2>
                    <p class="text-gray-200">Nous sommes là pour répondre à vos questions et vous accompagner dans la
                        mise en place de notre solution.</p>
                </div>
                <!-- End Title -->

                <!-- Grid -->
                <div class="grid md:grid-cols-2 gap-x-12 gap-y-12">
                    <!-- Contact Form -->
                    <div class="bg-neutral-800/50 p-6 rounded-xl">
                        <form>
                            <div class="space-y-6">
                                <!-- Name Input -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-200 mb-2">Nom
                                        complet</label>
                                    <input type="text" id="name"
                                        class="block w-full px-4 py-3 bg-neutral-700/50 border-0 rounded-lg text-white placeholder-neutral-300 focus:ring-2 focus:ring-yellow-400"
                                        placeholder="Votre nom">
                                </div>

                                <!-- Email Input -->
                                <div>
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-200 mb-2">Email</label>
                                    <input type="email" id="email"
                                        class="block w-full px-4 py-3 bg-neutral-700/50 border-0 rounded-lg text-white placeholder-neutral-300 focus:ring-2 focus:ring-yellow-400"
                                        placeholder="vous@exemple.com">
                                </div>

                                <!-- University Input -->
                                <div>
                                    <label for="university"
                                        class="block text-sm font-medium text-gray-200 mb-2">Université</label>
                                    <input type="text" id="university"
                                        class="block w-full px-4 py-3 bg-neutral-700/50 border-0 rounded-lg text-white placeholder-neutral-300 focus:ring-2 focus:ring-yellow-400"
                                        placeholder="Nom de votre université">
                                </div>

                                <!-- Message Input -->
                                <div>
                                    <label for="message"
                                        class="block text-sm font-medium text-gray-200 mb-2">Message</label>
                                    <textarea id="message" rows="4"
                                        class="block w-full px-4 py-3 bg-neutral-700/50 border-0 rounded-lg text-white placeholder-neutral-300 focus:ring-2 focus:ring-yellow-400 resize-none"
                                        placeholder="Votre message..."></textarea>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit"
                                    class="w-full inline-flex justify-center items-center px-6 py-3 bg-yellow-400 hover:bg-yellow-300 text-gray-900 font-medium rounded-lg transition-colors">
                                    Envoyer le message
                                    <svg class="ml-2 w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M5 12h14M12 5l7 7-7 7" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Contact Information -->
                    <div class="space-y-8">
                        <!-- Address -->
                        <div class="flex gap-x-5">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center w-12 h-12 bg-neutral-800/50 rounded-lg">
                                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-white mb-2">Notre adresse</h3>
                                <p class="text-gray-200">
                                    Lemba, Kinshasa<br>
                                    République Démocratique du Congo
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex gap-x-5">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center w-12 h-12 bg-neutral-800/50 rounded-lg">
                                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-white mb-2">Email</h3>
                                <a href="mailto:contact@pvs.com" class="text-gray-200 hover:text-white transition">
                                    contact@pvs.com
                                </a>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex gap-x-5">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center w-12 h-12 bg-neutral-800/50 rounded-lg">
                                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-white mb-2">Téléphone</h3>
                                <a href="tel:+243000000000" class="text-gray-200 hover:text-white transition">
                                    +243 00 000 00 00
                                </a>
                            </div>
                        </div>

                        <!-- Support Hours -->
                        <div class="flex gap-x-5">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center w-12 h-12 bg-neutral-800/50 rounded-lg">
                                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-white mb-2">Heures de support</h3>
                                <p class="text-gray-200">
                                    Lundi - Vendredi: 8h00 - 17h00<br>
                                    Samedi: 9h00 - 13h00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Grid -->
            </div>
        </div>
        <!-- End Contact -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <!-- ========== FOOTER ========== -->

    <!-- ========== END FOOTER ========== -->





    <!-- JS PLUGINS -->
    <!-- Required plugins -->
    <script src="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.js"></script>

    <!-- JS INITIALIZATIONS -->
    <script>
        (function () {
            function textareaAutoHeight(el, offsetTop = 0) {
                el.style.height = 'auto';
                el.style.height = `${el.scrollHeight + offsetTop}px`;
            }

            (function () {
                const textareas = [
                    '#hs-tac-message'
                ];

                textareas.forEach((el) => {
                    const textarea = document.querySelector(el);
                    const overlay = textarea.closest('.hs-overlay');

                    if (overlay) {
                        const { element } = HSOverlay.getInstance(overlay, true);

                        element.on('open', () => textareaAutoHeight(textarea, 3));
                    } else textareaAutoHeight(textarea, 3);

                    textarea.addEventListener('input', () => {
                        textareaAutoHeight(textarea, 3);
                    });
                });
            })();
        })()
    </script>
</body>

</html>

<DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
        <link rel="canonical" href="https://preline.co/">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description"
            content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">

        <meta name="twitter:site" content="@preline">
        <meta name="twitter:creator" content="@preline">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Tailwind CSS Admin Template | Preline UI, crafted with Tailwind CSS">
        <meta name="twitter:description"
            content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">
        <meta name="twitter:image" content="https://preline.co/assets/img/og-image.png">

        <meta property="og:url" content="https://preline.co/">
        <meta property="og:locale" content="en_US">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Preline">
        <meta property="og:title" content="Tailwind CSS Admin Template | Preline UI, crafted with Tailwind CSS">
        <meta property="og:description"
            content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">
        <meta property="og:image" content="https://preline.co/assets/img/og-image.png">

        <!-- Title -->
        <title>pvs</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="../../favicon.ico">

        <!-- Font -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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

        <!-- Apexcharts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.min.css">
        <style type="text/css">
            .apexcharts-tooltip.apexcharts-theme-light {
                background-color: transparent !important;
                border: none !important;
                box-shadow: none !important;
            }

            .dt-layout-row:has(.dt-search),
            .dt-layout-row:has(.dt-length),
            .dt-layout-row:has(.dt-paging) {
                display: none !important;
            }
        </style>

        <!-- CSS Preline -->
        <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gray-50 dark:bg-neutral-900">





        <!-- Page Content -->
        <main>
            <div class="w-full lg:ps-64">
                <div class="p-5 sm:p-6 space-y-4 sm:space-y-6">
                    @yield('content')
                </div>
            </div>
        </main>
        </div>
        @include('layouts.script')
    </body>

    </html>

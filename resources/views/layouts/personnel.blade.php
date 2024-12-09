<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PVS - Gestion des Examens</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Base */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #111827;
            color: #e5e7eb;
        }

        /* Animations */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-in {
            animation: slideIn 0.3s ease-out forwards;
        }

        /* Cards */
        .card {
            background: #1f2937;
            border: 1px solid #374151;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.4);
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #1f2937;
        }

        ::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }

        /* Navigation */
        .nav-link {
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Tables */
        .table-row {
            transition: all 0.2s ease;
        }

        .table-row:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        /* Buttons */
        .btn {
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        /* Charts */
        .chart-container {
            position: relative;
            margin: auto;
            height: 80vh;
            width: 100%;
            background-color: #1f2937;
            border: 1px solid #374151;
            border-radius: 0.5rem;
            padding: 1rem;
        }

        /* Inputs and Forms */
        input, select, textarea {
            background-color: #1f2937;
            border-color: #374151;
            color: #e5e7eb;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #3b82f6;
            ring-color: #3b82f6;
        }

        /* Buttons */
        .btn-primary {
            background-color: #3b82f6;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2563eb;
        }
    </style>
</head>

<body class="bg-gray-900 text-gray-100">
    <div class="min-h-screen">
        @include('layouts.menu')
        @include('layouts.side')

        <!-- Main Content -->
        <main class="animate-slide-in">
            <div class="w-full lg:ps-64">
                <div class="p-6 space-y-6">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    @include('layouts.script')

    <script>
        // Theme Toggle
        function toggleTheme() {
            const html = document.querySelector('html');
            const isDark = html.classList.contains('dark');

            html.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'light' : 'dark');
        }

        // Initialize Theme
        const theme = localStorage.getItem('theme') || 'light';
        document.querySelector('html').classList.add(theme);

        // Add animations to cards
        document.querySelectorAll('.card').forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.classList.add('animate-slide-in');
        });
    </script>
</body>
</html>

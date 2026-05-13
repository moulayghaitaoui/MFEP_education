<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة الإدارة العليا - منصة التكوين المهني')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8fafc;
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        [x-cloak] { display: none !important; }
    </style>
    @stack('styles')
</head>
<body class="antialiased text-slate-800 overflow-x-hidden" x-data="{ sidebarOpen: true, notificationsOpen: false }">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative">
            
            @yield('navbar')

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto custom-scrollbar">
                @yield('content')
            </main>
        </div>

        <!-- Quick Menu -->
        <x-admin-quick-menu />
    </div>

    <!-- Scripts -->
    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>
</html>

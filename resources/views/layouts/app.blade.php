<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'منصة وزارة التكوين والتعليم المهنيين')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Tajawal', 'Inter', sans-serif;
            background-color: #f1f5f9;
        }
        .sidebar-gradient {
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        [x-cloak] { display: none !important; }
    </style>
    @stack('styles')
</head>
<body class="antialiased text-slate-800 overflow-x-hidden" x-data="{ sidebarOpen: true, notificationsOpen: false }">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'w-72' : 'w-20'" class="transition-all duration-300 ease-in-out">
            @if(request()->is('direction*'))
                <x-direction-sidebar />
            @elseif(request()->is('teacher*'))
                <x-teacher-sidebar />
            @elseif(request()->is('student*'))
                <x-student-sidebar />
            @else
                <x-sidebar />
            @endif
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative">
            <!-- Navbar -->
            <x-navbar />

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-10 space-y-8 bg-[#f8fafc]">
                <div class="max-w-[1600px] mx-auto">
                    @yield('content')
                </div>
            </main>
            
            <!-- Footer -->
            <footer class="bg-white border-t border-slate-200 py-4 px-10 text-right text-xs text-slate-400 flex justify-between items-center">
                <span>&copy; {{ date('Y') }} مركز التحكم الرقمي - وزارة التكوين والتعليم المهنيين</span>
                <div class="flex gap-4">
                    <span class="flex items-center gap-1"><span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span> النظام يعمل بكفاءة</span>
                    <span>الإصدار 2.4.0-pro</span>
                </div>
            </footer>
        </div>

        <!-- Notifications Panel (Alpine.js) -->
        <div x-show="notificationsOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="fixed inset-y-0 left-0 w-96 bg-white shadow-2xl z-[60] border-r border-slate-200"
             x-cloak>
            <x-notifications-panel />
        </div>
        
        <!-- Overlay -->
        <div x-show="notificationsOpen" @click="notificationsOpen = false" class="fixed inset-0 bg-slate-900/20 backdrop-blur-sm z-[55]" x-cloak></div>
    </div>

    <!-- Scripts -->
    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'فضاء المتربص - منصة التكوين المهني')</title>
    
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
        
        .student-gradient {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
        }
    </style>
    @stack('styles')
</head>
<body class="antialiased text-slate-800 overflow-x-hidden" x-data="{ sidebarOpen: true, notificationsOpen: false }">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Component -->
        <x-student-sidebar-new />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative">
            
            <!-- Navbar Component -->
            <x-student-navbar />

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-4 md:p-8 lg:p-12 space-y-10 custom-scrollbar">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>

        <!-- Notifications Panel -->
        <div x-show="notificationsOpen" 
             x-cloak
             @click.away="notificationsOpen = false"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="fixed inset-y-0 left-0 w-80 md:w-96 bg-white shadow-2xl z-[60] border-r border-slate-100">
            <div class="p-8 border-b border-slate-100 flex items-center justify-between">
                <h3 class="text-xl font-black text-slate-900 tracking-tight">التنبيهات</h3>
                <button @click="notificationsOpen = false" class="text-slate-400 hover:text-slate-600"><i data-lucide="x" class="w-6 h-6"></i></button>
            </div>
            <div class="p-4 space-y-4">
                <div class="p-4 bg-blue-50 rounded-2xl border border-blue-100">
                    <p class="text-xs font-bold text-blue-600 mb-1">تنبيه كورس جديد</p>
                    <p class="text-sm font-black text-slate-900">تمت إضافة درس جديد في وحدة Laravel</p>
                    <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase">منذ 5 دقائق</p>
                </div>
            </div>
        </div>
        
        <!-- Overlay -->
        <div x-show="notificationsOpen" x-cloak class="fixed inset-0 bg-slate-900/20 backdrop-blur-sm z-[55]"></div>
    </div>

    <!-- Scripts -->
    <script>
        lucide.createIcons();
    </script>
    @stack('scripts')
</body>
</html>

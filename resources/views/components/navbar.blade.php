<header class="h-20 bg-white/90 backdrop-blur-md border-b border-slate-200 sticky top-0 z-40 flex items-center justify-between px-6 lg:px-10">
    <!-- Left: Collapse and Search -->
    <div class="flex items-center gap-6">
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 text-slate-500 hover:bg-slate-100 rounded-xl transition-all">
            <i :data-lucide="sidebarOpen ? 'menu' : 'maximize'" class="w-6 h-6"></i>
        </button>
        
        <div class="relative hidden lg:block group">
            <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute right-4 top-1/2 -translate-y-1/2 group-focus-within:text-blue-600 transition-colors"></i>
            <input type="text" placeholder="البحث في كامل النظام (المديريات، المعاهد، السجلات)..." 
                   class="bg-slate-100 border-none rounded-2xl pr-12 pl-4 py-3 text-[13px] font-medium w-[450px] focus:ring-4 focus:ring-blue-500/10 focus:bg-white transition-all outline-none">
            <div class="absolute left-3 top-1/2 -translate-y-1/2 flex items-center gap-1">
                <span class="text-[10px] font-bold text-slate-400 border border-slate-200 px-1.5 py-0.5 rounded bg-white">CTRL</span>
                <span class="text-[10px] font-bold text-slate-400 border border-slate-200 px-1.5 py-0.5 rounded bg-white">K</span>
            </div>
        </div>
    </div>

    <!-- Right: Stats, Notifications, Profile -->
    <div class="flex items-center gap-4">
        <!-- System Health Quick Glance -->
        <div class="hidden xl:flex items-center gap-4 ml-8">
            <div class="flex flex-col items-end">
                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest">تحميل المعالج</span>
                <div class="flex items-center gap-2 mt-0.5">
                    <div class="w-24 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-emerald-500 w-[24%]"></div>
                    </div>
                    <span class="text-xs font-bold text-slate-700">24%</span>
                </div>
            </div>
        </div>

        <!-- Notifications Toggle -->
        <div class="relative">
            <button @click="notificationsOpen = !notificationsOpen" 
                    class="p-3 text-slate-500 hover:bg-slate-100 rounded-2xl transition-all relative group">
                <i data-lucide="bell" class="w-6 h-6 group-hover:rotate-12 transition-transform"></i>
                <span class="absolute top-3 left-3 w-3 h-3 bg-red-500 rounded-full border-4 border-white animate-pulse"></span>
            </button>
        </div>

        <!-- Language -->
        <button class="p-3 text-slate-500 hover:bg-slate-100 rounded-2xl transition-all font-bold text-xs">
            FR
        </button>

        <div class="h-10 w-[1px] bg-slate-200 mx-2"></div>

        <!-- Super Admin Profile -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="flex items-center gap-3 p-1.5 pr-4 hover:bg-slate-100 rounded-2xl transition-all border border-transparent hover:border-slate-200">
                <div class="flex flex-col items-end">
                    <span class="text-xs font-extrabold text-slate-900 tracking-tight">أمين بن خليفة</span>
                    <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded-full uppercase tracking-tighter">مدير النظام الأعلى</span>
                </div>
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-slate-800 to-slate-950 flex items-center justify-center text-white shadow-xl shadow-slate-900/20 border-2 border-white">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
            </button>
            
            <!-- Profile Dropdown -->
            <div x-show="open" @click.away="open = false" 
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="absolute left-0 mt-2 w-56 bg-white rounded-2xl shadow-2xl border border-slate-100 py-2 z-50"
                 x-cloak>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50">
                    <i data-lucide="user" class="w-4 h-4"></i> حسابي
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50">
                    <i data-lucide="settings" class="w-4 h-4"></i> الإعدادات
                </a>
                <div class="h-[1px] bg-slate-100 my-2 mx-4"></div>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-bold text-red-600 hover:bg-red-50">
                    <i data-lucide="log-out" class="w-4 h-4"></i> تسجيل الخروج
                </a>
            </div>
        </div>
    </div>
</header>

<header class="bg-white/80 backdrop-blur-md border-b border-slate-100 py-4 px-10 flex items-center justify-between sticky top-0 z-40">
    <div class="flex items-center gap-6">
        <button @click="sidebarOpen = !sidebarOpen" class="text-slate-400 hover:text-slate-900 transition-colors">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
        <div class="relative hidden md:block">
            <i data-lucide="search" class="w-4 h-4 absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
            <input type="text" placeholder="البحث عن دروس، كورسات..." class="bg-slate-100 border-none rounded-2xl pr-12 pl-6 py-2.5 text-sm font-bold w-72 focus:ring-4 focus:ring-blue-600/10 transition-all outline-none">
        </div>
    </div>

    <div class="flex items-center gap-6">
        <button @click="notificationsOpen = true" class="relative p-2 text-slate-400 hover:text-blue-600 transition-all">
            <i data-lucide="bell" class="w-6 h-6"></i>
            <span class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full border-2 border-white animate-pulse"></span>
        </button>
        
        <div class="h-8 w-[1px] bg-slate-100 mx-2"></div>
        
        <div class="flex items-center gap-4">
            <div class="text-left hidden lg:block">
                <p class="text-xs font-black text-slate-900 leading-tight">محمد بن علي</p>
                <p class="text-[9px] font-bold text-blue-600 uppercase tracking-widest mt-0.5">متربص • السنة الثانية</p>
            </div>
            <div class="w-10 h-10 rounded-2xl bg-slate-900 flex items-center justify-center text-white shadow-lg shadow-slate-900/20">
                <i data-lucide="user" class="w-5 h-5"></i>
            </div>
        </div>
    </div>
</header>

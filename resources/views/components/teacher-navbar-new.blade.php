<header class="bg-white border-b border-slate-200 py-4 px-12 flex items-center justify-between sticky top-0 z-40">
    <div class="flex items-center gap-8">
        <button @click="sidebarOpen = !sidebarOpen" class="text-slate-400 hover:text-indigo-900 transition-all">
            <i data-lucide="align-right" class="w-6 h-6"></i>
        </button>
        <div class="hidden md:flex items-center gap-3">
             <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-[9px] font-black uppercase tracking-widest">الدورة الحالية</span>
             <h2 class="text-xs font-black text-slate-800">أساسيات تطوير الويب المتقدم (Node.js & Laravel)</h2>
        </div>
    </div>

    <div class="flex items-center gap-6">
        <!-- Search -->
        <div class="relative hidden xl:block">
            <i data-lucide="search" class="w-4 h-4 absolute right-4 top-1/2 -translate-y-1/2 text-slate-300"></i>
            <input type="text" placeholder="البحث في الدروس أو الطلاب..." class="bg-slate-50 border border-slate-100 rounded-2xl pr-12 pl-6 py-2.5 text-xs font-bold w-64 focus:ring-4 focus:ring-indigo-600/10 transition-all outline-none">
        </div>

        <!-- Notifications -->
        <button @click="teacherNotificationsOpen = true" class="relative p-2.5 bg-slate-50 text-slate-400 hover:text-indigo-600 rounded-2xl border border-slate-100 transition-all group">
            <i data-lucide="bell-ring" class="w-5 h-5 group-hover:animate-bounce"></i>
            <span class="absolute top-2.5 right-2.5 w-2.5 h-2.5 bg-rose-500 rounded-full border-2 border-white"></span>
        </button>
        
        <!-- User -->
        <div class="flex items-center gap-4 bg-slate-50 px-4 py-2 rounded-2xl border border-slate-100 cursor-pointer hover:bg-white transition-all">
             <div class="text-left">
                <p class="text-[10px] font-black text-slate-900 leading-tight">د. سمير بوزيد</p>
                <p class="text-[8px] font-bold text-indigo-600 uppercase tracking-[0.2em] mt-0.5">أستاذ محاضر</p>
             </div>
             <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center text-white shadow-lg shadow-indigo-600/30">
                <i data-lucide="user-cog" class="w-5 h-5"></i>
             </div>
        </div>
    </div>
</header>

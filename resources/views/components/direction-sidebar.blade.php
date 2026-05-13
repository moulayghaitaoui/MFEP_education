@props(['role' => 'admin'])

<aside :class="sidebarOpen ? 'w-80' : 'w-20'" class="gov-gradient text-white flex-shrink-0 flex flex-col h-full transition-all duration-300 relative shadow-2xl z-50 overflow-hidden">
    <!-- Collapse Toggle Button -->
    <button @click="sidebarOpen = !sidebarOpen" class="absolute -left-3 top-24 w-6 h-6 bg-gov-gold rounded-full flex items-center justify-center shadow-lg hover:bg-gov-gold-light transition-colors z-50">
        <i :data-lucide="sidebarOpen ? 'chevron-right' : 'chevron-left'" class="w-4 h-4 text-white"></i>
    </button>

    <!-- Brand / Logo -->
    <div class="p-6 border-b border-white/10 flex items-center gap-3 overflow-hidden">
        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg flex-shrink-0 overflow-hidden">
            <img src="/assets/logo.png" alt="Logo" class="w-8 h-8 object-contain" onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Seal_of_Algeria.svg/1024px-Seal_of_Algeria.svg.png';">
        </div>
        <div class="flex flex-col whitespace-nowrap transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">
            <span class="font-black text-lg leading-tight tracking-tight text-white">المديرية الولائية</span>
            <span class="text-[10px] text-gov-gold-light font-black uppercase tracking-widest">تسيير إقليمي</span>
        </div>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1 custom-scrollbar">
        <!-- Overview -->
        <div class="mb-4">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">لوحة التحكم</p>
            <x-sidebar-item icon="layout-dashboard" label="الرئيسية" active="{{ request()->routeIs('direction.dashboard') }}" href="{{ route('direction.dashboard') }}" />
        </div>
        
        <!-- Academic Management -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">التسيير البيداغوجي</p>
            <x-sidebar-item icon="school" label="إدارة المعاهد" href="#" />
            <x-sidebar-item icon="users-round" label="إدارة الأفواج" active="{{ request()->routeIs('direction.groups') }}" href="{{ route('direction.groups') }}" />
            <x-sidebar-item icon="calendar-days" label="الجداول الزمنية" active="{{ request()->routeIs('direction.schedules') }}" href="{{ route('direction.schedules') }}" />
        </div>
        
        <!-- Tracking -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">المتابعة والرقابة</p>
            <x-sidebar-item icon="fingerprint" label="سجلات الحضور" active="{{ request()->routeIs('direction.attendance') }}" href="{{ route('direction.attendance') }}" />
            <x-sidebar-item icon="user-cog" label="متابعة الأساتذة" href="#" />
            <x-sidebar-item icon="graduation-cap" label="متابعة المتربصين" href="#" />
        </div>
        
        <!-- Results & Reports -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">النتائج والتقارير</p>
            <x-sidebar-item icon="clipboard-list" label="نتائج الاختبارات" active="{{ request()->routeIs('direction.exams') }}" href="{{ route('direction.exams') }}" />
            <x-sidebar-item icon="file-spreadsheet" label="التقارير والإحصائيات" active="{{ request()->routeIs('direction.reports') }}" href="{{ route('direction.reports') }}" />
        </div>

        <!-- Notifications -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <x-sidebar-item icon="bell" label="الإشعارات" href="#" />
        </div>
    </nav>

    <!-- User Profile Summary (Bottom) -->
    <div class="p-4 bg-slate-900/50 border-t border-white/10 mt-auto">
        <a href="{{ route('login') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-rose-300 hover:bg-rose-500 hover:text-white transition-all group mb-4">
            <i data-lucide="log-out" class="w-5 h-5"></i>
            <span x-show="sidebarOpen" class="text-xs font-black uppercase tracking-widest">تسجيل الخروج</span>
        </a>
        <div x-show="sidebarOpen" class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-gov-green flex items-center justify-center text-[10px] font-bold">DZ</div>
            <div class="flex flex-col">
                <span class="text-[11px] font-bold">مديرية ولاية سطيف</span>
                <span class="text-[9px] text-slate-500 font-bold">متصل الآن</span>
            </div>
        </div>
    </div>
</aside>

@props(['role' => 'admin'])

<aside class="sidebar-gradient text-white flex-shrink-0 flex flex-col h-full transition-all duration-300 relative shadow-2xl z-50">
    <!-- Collapse Toggle Button -->
    <button @click="sidebarOpen = !sidebarOpen" class="absolute -left-3 top-24 w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center shadow-lg hover:bg-blue-500 transition-colors z-50">
        <i :data-lucide="sidebarOpen ? 'chevron-right' : 'chevron-left'" class="w-4 h-4"></i>
    </button>

    <!-- Brand / Logo -->
    <div class="p-6 border-b border-white/10 flex items-center gap-3 overflow-hidden">
        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
            <i data-lucide="building" class="text-blue-900 w-6 h-6"></i>
        </div>
        <div class="flex flex-col whitespace-nowrap transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">
            <span class="font-bold text-lg leading-tight tracking-tight text-white">المديرية الولائية</span>
            <span class="text-[10px] text-blue-300/80 font-bold uppercase tracking-widest">تسيير ولائي</span>
        </div>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1 custom-scrollbar">
        <!-- Overview -->
        <div class="mb-4">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">لوحة التحكم</p>
            <x-sidebar-item icon="layout-dashboard" label="الرئيسية" active="{{ request()->routeIs('direction.dashboard') }}" :collapsed="!sidebarOpen" href="{{ route('direction.dashboard') }}" />
        </div>
        
        <!-- Academic Management -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">التسيير البيداغوجي</p>
            <x-sidebar-item icon="school" label="إدارة المعاهد" :collapsed="!sidebarOpen" href="#" />
            <x-sidebar-item icon="users-round" label="إدارة الأفواج" active="{{ request()->routeIs('direction.groups') }}" :collapsed="!sidebarOpen" href="{{ route('direction.groups') }}" />
            <x-sidebar-item icon="calendar-days" label="الجداول الزمنية" active="{{ request()->routeIs('direction.schedules') }}" :collapsed="!sidebarOpen" href="{{ route('direction.schedules') }}" />
        </div>
        
        <!-- Tracking -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">المتابعة والرقابة</p>
            <x-sidebar-item icon="fingerprint" label="سجلات الحضور" active="{{ request()->routeIs('direction.attendance') }}" :collapsed="!sidebarOpen" href="{{ route('direction.attendance') }}" />
            <x-sidebar-item icon="user-cog" label="متابعة الأساتذة" :collapsed="!sidebarOpen" href="#" />
            <x-sidebar-item icon="graduation-cap" label="متابعة المتربصين" :collapsed="!sidebarOpen" href="#" />
        </div>
        
        <!-- Results & Reports -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">النتائج والتقارير</p>
            <x-sidebar-item icon="clipboard-list" label="نتائج الاختبارات" active="{{ request()->routeIs('direction.exams') }}" :collapsed="!sidebarOpen" href="{{ route('direction.exams') }}" />
            <x-sidebar-item icon="file-spreadsheet" label="التقارير والإحصائيات" active="{{ request()->routeIs('direction.reports') }}" :collapsed="!sidebarOpen" href="{{ route('direction.reports') }}" />
        </div>

        <!-- Notifications -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <x-sidebar-item icon="bell" label="الإشعارات" :collapsed="!sidebarOpen" href="#" />
        </div>
    </nav>

    <!-- User Profile Summary (Bottom) -->
    <div class="p-4 bg-slate-900/50 border-t border-white/10" x-show="sidebarOpen">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-[10px] font-bold">DZ</div>
            <div class="flex flex-col">
                <span class="text-[11px] font-bold">مديرية ولاية سطيف</span>
                <span class="text-[9px] text-slate-500">متصل الآن</span>
            </div>
        </div>
    </div>
</aside>

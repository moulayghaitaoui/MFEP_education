<aside class="sidebar-gradient text-white flex-shrink-0 flex flex-col h-full transition-all duration-300 relative shadow-2xl z-50">
    <!-- Collapse Toggle Button -->
    <button @click="sidebarOpen = !sidebarOpen" class="absolute -left-3 top-24 w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center shadow-lg hover:bg-blue-500 transition-colors z-50">
        <i :data-lucide="sidebarOpen ? 'chevron-right' : 'chevron-left'" class="w-4 h-4"></i>
    </button>

    <!-- Brand / Logo -->
    <div class="p-6 border-b border-white/10 flex items-center gap-3 overflow-hidden">
        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
            <i data-lucide="shield-check" class="text-slate-900 w-6 h-6"></i>
        </div>
        <div class="flex flex-col whitespace-nowrap transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">
            <span class="font-bold text-lg leading-tight tracking-tight text-white">MFEP Pro</span>
            <span class="text-[10px] text-blue-300/80 font-bold uppercase tracking-widest">الإدارة العليا</span>
        </div>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1 custom-scrollbar">
        <!-- Overview -->
        <div class="mb-4">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">الرئيسية</p>
            <x-sidebar-item icon="monitor" label="مركز التحكم" active="{{ request()->routeIs('admin.dashboard') }}" :collapsed="!sidebarOpen" href="{{ route('admin.dashboard') }}" />
            <x-sidebar-item icon="activity" label="مراقبة النظام" :collapsed="!sidebarOpen" />
        </div>
        
        <!-- Management -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">إدارة الموارد</p>
            <x-sidebar-item icon="map" label="إدارة المديريات" :collapsed="!sidebarOpen" />
            <x-sidebar-item icon="landmark" label="إدارة المعاهد" :collapsed="!sidebarOpen" />
            <x-sidebar-item icon="users" label="إدارة المستخدمين" :collapsed="!sidebarOpen" />
            <x-sidebar-item icon="book-marked" label="إدارة التخصصات" :collapsed="!sidebarOpen" />
        </div>
        
        <!-- Reports -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">البيانات</p>
            <x-sidebar-item icon="bar-chart-big" label="التقارير الوطنية" active="{{ request()->routeIs('admin.reports') }}" :collapsed="!sidebarOpen" href="{{ route('admin.reports') }}" />
            <x-sidebar-item icon="pie-chart" label="الإحصائيات العامة" :collapsed="!sidebarOpen" />
        </div>
        
        <!-- Configuration -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">النظام</p>
            <x-sidebar-item icon="settings-2" label="إعدادات المنصة" active="{{ request()->routeIs('admin.settings') }}" :collapsed="!sidebarOpen" href="{{ route('admin.settings') }}" />
            <x-sidebar-item icon="key" label="الأمان والتراخيص" :collapsed="!sidebarOpen" />
            <x-sidebar-item icon="terminal" label="سجلات النظام" :collapsed="!sidebarOpen" />
        </div>
    </nav>

    <!-- App Version / Status -->
    <div class="p-4 bg-slate-900/50 border-t border-white/10" x-show="sidebarOpen">
        <div class="flex items-center justify-between text-[10px] font-bold text-slate-500 uppercase tracking-tighter">
            <span>Server: DZ-AL-01</span>
            <span class="text-emerald-500">Online</span>
        </div>
    </div>
</aside>

<aside class="gov-gradient text-white flex-shrink-0 flex flex-col h-full transition-all duration-300 relative shadow-2xl z-50">
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
            <span class="font-black text-lg leading-tight tracking-tight text-white">قطاع التكوين</span>
            <span class="text-[10px] text-gov-gold-light font-black uppercase tracking-widest">الإدارة العليا</span>
        </div>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1 custom-scrollbar">
        <!-- Overview -->
        <div class="mb-4">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">الرئيسية</p>
            <x-sidebar-item icon="monitor" label="مركز التحكم" active="{{ request()->routeIs('admin.dashboard') }}" href="{{ route('admin.dashboard') }}" />
            <x-sidebar-item icon="activity" label="مراقبة النظام" />
        </div>
        
        <!-- Management -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">إدارة الموارد</p>
            <x-sidebar-item icon="map" label="إدارة المديريات" />
            <x-sidebar-item icon="landmark" label="إدارة المعاهد" />
            <x-sidebar-item icon="users" label="إدارة المستخدمين" />
            <x-sidebar-item icon="book-marked" label="إدارة التخصصات" />
        </div>
        
        <!-- Reports -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">البيانات</p>
            <x-sidebar-item icon="bar-chart-big" label="التقارير الوطنية" active="{{ request()->routeIs('admin.reports') }}" href="{{ route('admin.reports') }}" />
            <x-sidebar-item icon="pie-chart" label="الإحصائيات العامة" />
        </div>
        
        <!-- Configuration -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">النظام</p>
            <x-sidebar-item icon="settings-2" label="إعدادات المنصة" active="{{ request()->routeIs('admin.settings') }}" href="{{ route('admin.settings') }}" />
            <x-sidebar-item icon="key" label="الأمان والتراخيص" />
            <x-sidebar-item icon="terminal" label="سجلات النظام" />
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

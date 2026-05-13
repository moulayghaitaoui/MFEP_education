<aside class="sidebar-gradient text-white flex-shrink-0 flex flex-col h-full transition-all duration-300 relative shadow-2xl z-50">
    <!-- Collapse Toggle Button -->
    <button @click="sidebarOpen = !sidebarOpen" class="absolute -left-3 top-24 w-6 h-6 bg-indigo-600 rounded-full flex items-center justify-center shadow-lg hover:bg-indigo-500 transition-colors z-50">
        <i :data-lucide="sidebarOpen ? 'chevron-right' : 'chevron-left'" class="w-4 h-4"></i>
    </button>

    <!-- Brand / Logo -->
    <div class="p-6 border-b border-white/10 flex items-center gap-3 overflow-hidden">
        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
            <i data-lucide="book-open" class="text-indigo-900 w-6 h-6"></i>
        </div>
        <div class="flex flex-col whitespace-nowrap transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">
            <span class="font-bold text-lg leading-tight tracking-tight text-white">فضاء الأستاذ</span>
            <span class="text-[10px] text-indigo-300/80 font-bold uppercase tracking-widest">منصة التميز الرقمي</span>
        </div>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1 custom-scrollbar">
        <!-- Overview -->
        <div class="mb-4">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">الرئيسية</p>
            <x-sidebar-item icon="layout-dashboard" label="لوحة التحكم" active="{{ request()->routeIs('teacher.dashboard') }}" :collapsed="!sidebarOpen" href="{{ route('teacher.dashboard') }}" />
        </div>
        
        <!-- Teaching Management -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">إدارة التعليم</p>
            <x-sidebar-item icon="calendar-clock" label="إنشاء حصة" active="{{ request()->routeIs('teacher.sessions') }}" :collapsed="!sidebarOpen" href="{{ route('teacher.sessions') }}" />
            <x-sidebar-item icon="file-up" label="رفع درس" active="{{ request()->routeIs('teacher.lessons') }}" :collapsed="!sidebarOpen" href="{{ route('teacher.lessons') }}" />
            <x-sidebar-item icon="clipboard-list" label="إنشاء اختبار" active="{{ request()->routeIs('teacher.quizzes') }}" :collapsed="!sidebarOpen" href="{{ route('teacher.quizzes') }}" />
        </div>
        
        <!-- Students & Results -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">الطلبة والنتائج</p>
            <x-sidebar-item icon="users" label="قائمة الطلبة" active="{{ request()->routeIs('teacher.students') }}" :collapsed="!sidebarOpen" href="{{ route('teacher.students') }}" />
            <x-sidebar-item icon="graduation-cap" label="نتائج الاختبارات" active="{{ request()->routeIs('teacher.results') }}" :collapsed="!sidebarOpen" href="{{ route('teacher.results') }}" />
        </div>

        <!-- Social & Support -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <x-sidebar-item icon="message-square" label="الرسائل والإشعارات" :collapsed="!sidebarOpen" href="#" />
            <x-sidebar-item icon="help-circle" label="مركز المساعدة" :collapsed="!sidebarOpen" href="#" />
        </div>
    </nav>

    <!-- User Profile Summary (Bottom) -->
    <div class="p-4 bg-slate-900/50 border-t border-white/10" x-show="sidebarOpen">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-[10px] font-bold">PT</div>
            <div class="flex flex-col">
                <span class="text-[11px] font-bold">أ. توفيق بوزيد</span>
                <span class="text-[9px] text-slate-500">خبير في تكنولوجيا الويب</span>
            </div>
        </div>
    </div>
</aside>

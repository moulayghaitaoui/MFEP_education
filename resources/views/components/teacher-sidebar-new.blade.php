<aside :class="sidebarOpen ? 'w-80' : 'w-20'" class="gov-gradient text-white flex-shrink-0 flex flex-col h-full transition-all duration-300 relative shadow-2xl z-50 overflow-hidden">
    <!-- Brand -->
    <div class="p-8 flex items-center gap-4 overflow-hidden border-b border-white/5">
        <div class="w-12 h-12 bg-white rounded-3xl flex items-center justify-center shadow-xl flex-shrink-0 rotate-3 overflow-hidden">
            <img src="/assets/logo.png" alt="Logo" class="w-8 h-8 object-contain" onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Seal_of_Algeria.svg/1024px-Seal_of_Algeria.svg.png';">
        </div>
        <div class="flex flex-col whitespace-nowrap transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">
            <span class="font-black text-xl tracking-tighter uppercase italic">فضاء الأستاذ</span>
            <span class="text-[9px] text-gov-gold font-black uppercase tracking-[0.3em]">وزارة التكوين المهني</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 py-10 px-6 space-y-3 overflow-y-auto custom-scrollbar">
        <p x-show="sidebarOpen" class="text-[10px] font-black text-gov-gold uppercase tracking-[0.3em] px-4 mb-4">القائمة الرئيسية</p>
        
        <x-teacher-sidebar-item-new icon="layout-grid" label="لوحة التحكم" href="{{ route('teacher.dashboard') }}" :active="request()->routeIs('teacher.dashboard')" />
        <x-teacher-sidebar-item-new icon="book-open" label="إدارة الدروس" href="{{ route('teacher.lessons') }}" :active="request()->routeIs('teacher.lessons')" />
        <x-teacher-sidebar-item-new icon="plus-circle" label="إنشاء درس" href="{{ route('teacher.create-lesson') }}" :active="request()->routeIs('teacher.create-lesson')" />
        <x-teacher-sidebar-item-new icon="calendar-days" label="إدارة الحصص" href="{{ route('teacher.sessions') }}" :active="request()->routeIs('teacher.sessions')" />
        <x-teacher-sidebar-item-new icon="clipboard-list" label="الاختبارات" href="{{ route('teacher.quizzes') }}" :active="request()->routeIs('teacher.quizzes')" />
        <x-teacher-sidebar-item-new icon="users" label="متابعة المتربصين" href="{{ route('teacher.students') }}" :active="request()->routeIs('teacher.students')" />
        <x-teacher-sidebar-item-new icon="bar-chart-big" label="النتائج والتقييم" href="{{ route('teacher.results') }}" :active="request()->routeIs('teacher.results')" />
        <x-teacher-sidebar-item-new icon="folder-open" label="الملفات والموارد" href="{{ route('teacher.resources') }}" :active="request()->routeIs('teacher.resources')" />
    </nav>

    <!-- Logout -->
    <div class="px-6 py-4">
        <a href="{{ route('login') }}" class="flex items-center gap-4 px-6 py-4 rounded-[24px] text-rose-300 hover:bg-rose-500 hover:text-white transition-all group overflow-hidden">
            <i data-lucide="log-out" class="w-5 h-5 flex-shrink-0"></i>
            <span x-show="sidebarOpen" class="text-[11px] font-black uppercase tracking-widest whitespace-nowrap">تسجيل الخروج</span>
        </a>
    </div>

    <!-- Support -->
    <div class="p-6 border-t border-white/5 mt-auto" x-show="sidebarOpen">
        <div class="bg-white/5 p-5 rounded-[30px] border border-white/5">
             <p class="text-[10px] font-black text-gov-gold uppercase mb-2">مركز المساعدة</p>
             <p class="text-xs text-white/60 mb-4 leading-relaxed font-bold">هل تواجه مشكلة في رفع المحتوى؟</p>
             <button class="w-full py-3 bg-gov-gold text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-gov-gold-light transition-all">تواصل معنا</button>
        </div>
    </div>
</aside>

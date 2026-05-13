<aside :class="sidebarOpen ? 'w-72' : 'w-20'" class="gov-gradient text-white flex-shrink-0 flex flex-col h-full transition-all duration-300 relative shadow-2xl z-50 overflow-hidden">
    <!-- Collapse Toggle -->
    <button @click="sidebarOpen = !sidebarOpen" class="absolute -left-3 top-24 w-6 h-6 bg-gov-gold rounded-full flex items-center justify-center shadow-lg hover:bg-gov-gold-light transition-colors z-50">
        <i :data-lucide="sidebarOpen ? 'chevron-right' : 'chevron-left'" class="w-4 h-4 text-white"></i>
    </button>

    <!-- Brand -->
    <div class="p-8 flex items-center gap-4 overflow-hidden border-b border-white/5">
        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center shadow-xl flex-shrink-0 overflow-hidden">
            <img src="/assets/logo.png" alt="Logo" class="w-8 h-8 object-contain" onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Seal_of_Algeria.svg/1024px-Seal_of_Algeria.svg.png';">
        </div>
        <div class="flex flex-col whitespace-nowrap transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">
            <span class="font-black text-lg tracking-tighter uppercase leading-none">فضاء المتربص</span>
            <span class="text-[9px] text-gov-gold font-black uppercase tracking-[0.2em] mt-1">وزارة التكوين المهني</span>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 py-8 px-4 space-y-2 overflow-y-auto custom-scrollbar">
        <x-student-sidebar-item icon="layout-dashboard" label="لوحة التحكم" href="{{ route('student.dashboard') }}" :active="request()->routeIs('student.dashboard')" />
        <x-student-sidebar-item icon="book-open" label="كورساتي" href="{{ route('student.courses') }}" :active="request()->routeIs('student.courses')" />
        <x-student-sidebar-item icon="monitor-play" label="مشاهدة الدرس" href="{{ route('student.lesson', ['id' => 1]) }}" :active="request()->routeIs('student.lesson')" />
        <x-student-sidebar-item icon="clipboard-check" label="الاختبارات" href="{{ route('student.quizzes', ['id' => 1]) }}" :active="request()->routeIs('student.quizzes')" />
        <x-student-sidebar-item icon="bar-chart-3" label="النتائج" href="{{ route('student.results') }}" :active="request()->routeIs('student.results')" />
        <x-student-sidebar-item icon="award" label="الشهادات" href="{{ route('student.certificates') }}" :active="request()->routeIs('student.certificates')" />
    </nav>

    <!-- Account -->
    <div class="p-6 mt-auto border-t border-white/5" x-show="sidebarOpen">
        <div class="bg-white/5 p-4 rounded-3xl flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gov-gold flex items-center justify-center font-black text-xs text-white">MB</div>
            <div class="flex flex-col">
                <span class="text-[11px] font-black">محمد بن علي</span>
                <span class="text-[9px] text-white/50 font-bold">تقني سامي في البرمجة</span>
            </div>
        </div>
    </div>
</aside>

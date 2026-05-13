<aside class="sidebar-gradient text-white flex-shrink-0 flex flex-col h-full transition-all duration-300 relative shadow-2xl z-50">
    <!-- Collapse Toggle Button -->
    <button @click="sidebarOpen = !sidebarOpen" class="absolute -left-3 top-24 w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center shadow-lg hover:bg-blue-500 transition-colors z-50">
        <i :data-lucide="sidebarOpen ? 'chevron-right' : 'chevron-left'" class="w-4 h-4"></i>
    </button>

    <!-- Brand / Logo -->
    <div class="p-6 border-b border-white/10 flex items-center gap-3 overflow-hidden">
        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
            <i data-lucide="graduation-cap" class="text-blue-900 w-6 h-6"></i>
        </div>
        <div class="flex flex-col whitespace-nowrap transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0'">
            <span class="font-bold text-lg leading-tight tracking-tight text-white">فضاء المتربص</span>
            <span class="text-[10px] text-blue-300/80 font-bold uppercase tracking-widest">مستقبلك يبدأ هنا</span>
        </div>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1 custom-scrollbar">
        <!-- Overview -->
        <div class="mb-4">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">القائمة</p>
            <x-sidebar-item icon="layout-dashboard" label="لوحة التحكم" active="{{ request()->routeIs('student.dashboard') }}" :collapsed="!sidebarOpen" href="{{ route('student.dashboard') }}" />
            <x-sidebar-item icon="book-open" label="كورساتي" active="{{ request()->routeIs('student.courses') }}" :collapsed="!sidebarOpen" href="{{ route('student.courses') }}" />
        </div>
        
        <!-- Learning & Skills -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">التعلم والمهارات</p>
            <x-sidebar-item icon="monitor-play" label="مواصلة التعلم" :collapsed="!sidebarOpen" href="{{ route('student.learning', ['id' => 1]) }}" />
            <x-sidebar-item icon="clipboard-check" label="الاختبارات" :collapsed="!sidebarOpen" href="{{ route('student.quiz', ['id' => 1]) }}" />
        </div>
        
        <!-- Achievements -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <p x-show="sidebarOpen" class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-extrabold px-4 mb-2">إنجازاتي</p>
            <x-sidebar-item icon="award" label="الشهادات" active="{{ request()->routeIs('student.certificates') }}" :collapsed="!sidebarOpen" href="{{ route('student.certificates') }}" />
            <x-sidebar-item icon="file-spreadsheet" label="النتائج" active="{{ request()->routeIs('student.results') }}" :collapsed="!sidebarOpen" href="{{ route('student.results') }}" />
        </div>

        <!-- Account -->
        <div class="mb-4 pt-4 border-t border-white/5">
            <x-sidebar-item icon="user-circle" label="الملف الشخصي" :collapsed="!sidebarOpen" href="#" />
            <x-sidebar-item icon="help-circle" label="مركز المساعدة" :collapsed="!sidebarOpen" href="#" />
        </div>
    </nav>

    <!-- User Profile Summary (Bottom) -->
    <div class="p-4 bg-slate-900/50 border-t border-white/10" x-show="sidebarOpen">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-[10px] font-bold">MB</div>
            <div class="flex flex-col">
                <span class="text-[11px] font-bold">محمد بن علي</span>
                <span class="text-[9px] text-slate-500">تقني سامي في البرمجة</span>
            </div>
        </div>
    </div>
</aside>

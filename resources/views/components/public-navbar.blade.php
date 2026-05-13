<nav x-data="{ scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     :class="scrolled ? 'bg-white/80 backdrop-blur-xl shadow-xl shadow-blue-900/5 py-4' : 'bg-transparent py-8'"
     class="fixed top-0 left-0 right-0 z-[100] transition-all duration-500">
    <div class="max-w-7xl mx-auto px-8 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center shadow-lg border border-slate-100 overflow-hidden">
                <img src="/assets/logo.png" alt="Logo" class="w-12 h-12 object-contain" onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Seal_of_Algeria.svg/1024px-Seal_of_Algeria.svg.png';">
            </div>
            <div class="flex flex-col">
                <span :class="scrolled ? 'text-slate-900' : 'text-slate-900'" class="font-black text-xl tracking-tighter uppercase transition-colors leading-none">وزارة التكوين</span>
                <span class="text-[9px] font-black text-gov-green uppercase tracking-[0.2em] mt-1">والتعليم المهنيين</span>
            </div>
        </div>

        <!-- Links -->
        <div class="hidden lg:flex items-center gap-10">
            @foreach(['الرئيسية' => 'public.index', 'التخصصات' => 'public.courses', 'الدروس' => 'public.index', 'عن المنصة' => 'public.about', 'تواصل معنا' => 'public.contact'] as $label => $route)
                <a href="{{ route($route) }}" class="text-xs font-black text-slate-500 hover:text-gov-green transition-colors uppercase tracking-widest relative group">
                    {{ $label }}
                    <span class="absolute -bottom-2 left-0 w-0 h-0.5 bg-gov-green transition-all group-hover:w-full"></span>
                </a>
            @endforeach
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-4">
            <a href="{{ route('login') }}" class="text-xs font-black text-slate-900 px-6 py-3 rounded-xl hover:bg-slate-50 transition-all">دخول</a>
            <a href="{{ route('login') }}" class="bg-gov-green text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-gov-green/20 hover:bg-gov-green-dark hover:-translate-y-1 transition-all">ابدأ التعلم الآن</a>
        </div>
    </div>
</nav>

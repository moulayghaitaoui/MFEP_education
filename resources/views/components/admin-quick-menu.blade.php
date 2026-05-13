<div class="fixed bottom-10 left-10 z-[100]" x-data="{ open: false }">
    <!-- Menu Content -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-10 scale-90" x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         class="absolute bottom-24 left-0 w-64 bg-slate-900 text-white rounded-[40px] p-6 shadow-2xl space-y-4 border border-white/10 backdrop-blur-xl">
        <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest px-4 mb-4">إجراءات الإدارة السريعة</p>
        <a href="#" class="flex items-center gap-4 p-4 hover:bg-white/5 rounded-2xl transition-all group">
            <div class="w-10 h-10 bg-gov-green text-white rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform"><i data-lucide="plus" class="w-5 h-5 text-gov-gold"></i></div>
            <span class="text-xs font-black">إضافة معهد جديد</span>
        </a>
        <a href="#" class="flex items-center gap-4 p-4 hover:bg-white/5 rounded-2xl transition-all group">
            <div class="w-10 h-10 bg-gov-gold text-white rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform"><i data-lucide="mail" class="w-5 h-5 text-slate-900"></i></div>
            <span class="text-xs font-black">مراسلة المديريات</span>
        </a>
        <a href="#" class="flex items-center gap-4 p-4 hover:bg-white/5 rounded-2xl transition-all group">
            <div class="w-10 h-10 bg-white/10 text-white rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform"><i data-lucide="file-text" class="w-5 h-5"></i></div>
            <span class="text-xs font-black">إصدار تقرير وطني</span>
        </a>
    </div>

    <!-- Toggle Button -->
    <button @click="open = !open" 
            :class="open ? 'bg-gov-gold rotate-45' : 'bg-gov-green'"
            class="w-20 h-20 rounded-full text-white flex items-center justify-center shadow-2xl transition-all duration-500 hover:scale-110 active:scale-95 group">
        <i data-lucide="plus" class="w-8 h-8 transition-transform" :class="open ? 'rotate-0 text-gov-gold' : ''"></i>
    </button>
</div>

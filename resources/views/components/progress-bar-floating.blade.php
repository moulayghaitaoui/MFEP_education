<div class="fixed top-24 left-1/2 -translate-x-1/2 w-full max-w-2xl px-6 z-40 transition-all duration-500"
     x-data="{ show: true }"
     @scroll.window="show = (window.pageYOffset > 200)">
    <div x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
         class="bg-white/80 backdrop-blur-xl border border-slate-100 rounded-3xl p-4 shadow-2xl shadow-slate-900/10 flex items-center gap-6">
        <div class="flex-1">
             <div class="flex justify-between text-[9px] font-black uppercase tracking-widest mb-2 px-1">
                <span class="text-slate-400">التقدم في الدرس</span>
                <span class="text-blue-600">65%</span>
             </div>
             <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full bg-blue-600 rounded-full transition-all duration-700" style="width: 65%"></div>
             </div>
        </div>
        <div class="flex gap-2">
             <button class="w-10 h-10 bg-slate-50 text-slate-400 rounded-xl flex items-center justify-center hover:bg-slate-100 transition-all"><i data-lucide="chevron-right" class="w-5 h-5"></i></button>
             <button class="w-10 h-10 bg-slate-50 text-slate-400 rounded-xl flex items-center justify-center hover:bg-slate-100 transition-all"><i data-lucide="chevron-left" class="w-5 h-5"></i></button>
        </div>
    </div>
</div>

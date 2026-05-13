<div x-show="notesOpen" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="translate-x-full"
     x-transition:enter-end="translate-x-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="translate-x-0"
     x-transition:leave-end="translate-x-full"
     class="fixed inset-y-0 left-0 w-80 md:w-96 bg-white shadow-2xl z-50 border-r border-slate-100 flex flex-col">
    <div class="p-8 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
        <h3 class="text-xl font-black text-slate-900 tracking-tight">مفكرة الدرس</h3>
        <button @click="notesOpen = false" class="text-slate-400 hover:text-slate-900"><i data-lucide="x" class="w-6 h-6"></i></button>
    </div>
    
    <div class="flex-1 overflow-y-auto p-8 space-y-8 custom-scrollbar">
        <div class="space-y-4">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">إضافة ملاحظة سريعة</p>
            <textarea rows="4" placeholder="اكتب ملاحظاتك هنا..." class="w-full bg-slate-50 border-none rounded-3xl px-6 py-5 text-sm font-bold text-slate-800 focus:ring-4 focus:ring-blue-600/10 transition-all outline-none resize-none"></textarea>
            <button class="w-full py-4 bg-blue-600 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-xl shadow-blue-600/20 hover:bg-blue-700 transition-all">حفظ الملاحظة</button>
        </div>

        <div class="pt-8 border-t border-slate-50 space-y-6">
             <template x-for="i in 3">
                <div class="p-6 bg-slate-50 rounded-[24px] border border-transparent hover:border-blue-100 transition-all group">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[9px] font-black text-blue-600 uppercase">في الدقيقة 02:45</span>
                        <button class="text-slate-300 hover:text-rose-500 opacity-0 group-hover:opacity-100 transition-all"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                    </div>
                    <p class="text-xs font-bold text-slate-600 leading-relaxed">يجب التركيز على كيفية ربط الـ Controller بالـ Route في هذا المقطع.</p>
                </div>
             </template>
        </div>
    </div>
</div>

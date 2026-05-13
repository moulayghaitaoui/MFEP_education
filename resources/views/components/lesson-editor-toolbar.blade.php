<div class="sticky top-24 z-30 bg-white/80 backdrop-blur-xl border border-slate-100 rounded-[32px] p-4 flex items-center justify-between mb-12 shadow-xl shadow-slate-900/5">
    <div class="flex items-center gap-2">
        <button class="p-3 text-slate-400 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all"><i data-lucide="bold" class="w-5 h-5"></i></button>
        <button class="p-3 text-slate-400 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all"><i data-lucide="italic" class="w-5 h-5"></i></button>
        <button class="p-3 text-slate-400 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all"><i data-lucide="link" class="w-5 h-5"></i></button>
        <div class="w-px h-6 bg-slate-100 mx-2"></div>
        <button class="p-3 text-slate-400 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all"><i data-lucide="image" class="w-5 h-5"></i></button>
        <button class="p-3 text-slate-400 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-all"><i data-lucide="video" class="w-5 h-5"></i></button>
    </div>

    <div class="flex items-center gap-4">
        <div class="flex items-center gap-2 px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl border border-indigo-100">
             <i data-lucide="sparkles" class="w-4 h-4"></i>
             <span class="text-[10px] font-black uppercase tracking-widest">محرر ذكي</span>
        </div>
        <button @click="showAddQuestion = true" class="bg-indigo-600 text-white px-6 py-3 rounded-2xl font-black text-[10px] uppercase tracking-widest shadow-lg shadow-indigo-600/20 hover:bg-indigo-700 transition-all flex items-center gap-3">
            <i data-lucide="plus-circle" class="w-4 h-4"></i>
            إدراج سؤال
        </button>
    </div>
</div>

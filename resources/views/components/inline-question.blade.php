<div class="bg-indigo-50/50 border-2 border-indigo-100 rounded-[32px] p-8 my-8 relative group transition-all hover:shadow-xl hover:border-indigo-200"
     x-data="{ showSettings: false, type: block.type }">
    
    <!-- Block Actions -->
    <div class="absolute -right-4 top-1/2 -translate-y-1/2 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
        <button class="w-10 h-10 bg-white shadow-xl rounded-xl flex items-center justify-center text-slate-400 hover:text-indigo-600 transition-all cursor-move"><i data-lucide="grip-vertical" class="w-5 h-5"></i></button>
        <button @click="blocks = blocks.filter(b => b.id !== block.id)" class="w-10 h-10 bg-white shadow-xl rounded-xl flex items-center justify-center text-slate-400 hover:text-rose-500 transition-all"><i data-lucide="trash-2" class="w-5 h-5"></i></button>
    </div>

    <!-- Question Label -->
    <div class="flex items-center gap-3 mb-6">
        <div class="w-8 h-8 bg-indigo-600 text-white rounded-lg flex items-center justify-center">
            <i data-lucide="help-circle" class="w-4 h-4"></i>
        </div>
        <span class="text-[10px] font-black text-indigo-600 uppercase tracking-widest">سؤال تفاعلي</span>
        <span class="text-[10px] font-bold text-slate-400 uppercase" x-text="type === 'mcq' ? 'اختيار من متعدد' : (type === 'tf' ? 'صح أو خطأ' : 'سؤال نصي')"></span>
    </div>

    <!-- Question Text -->
    <div class="mb-6">
        <input type="text" placeholder="اكتب سؤالك التفاعلي هنا..." class="w-full bg-transparent border-none p-0 text-xl font-black text-slate-900 focus:ring-0 outline-none placeholder:text-slate-300">
    </div>

    <!-- MCQ Layout -->
    <template x-if="type === 'mcq'">
        <div class="space-y-3">
             <template x-for="i in 3">
                <div class="flex items-center gap-3 bg-white p-4 rounded-2xl border border-indigo-50 group/opt">
                    <div class="w-4 h-4 rounded-full border-2 border-indigo-100 flex items-center justify-center">
                        <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full opacity-0 group-hover/opt:opacity-20"></div>
                    </div>
                    <input type="text" :placeholder="'الخيار ' + i" class="flex-1 bg-transparent border-none p-0 text-sm font-bold text-slate-600 focus:ring-0">
                </div>
             </template>
             <button class="text-[10px] font-black text-indigo-400 uppercase tracking-widest mt-2 hover:text-indigo-600 transition-colors">+ إضافة خيار</button>
        </div>
    </template>

    <!-- T/F Layout -->
    <template x-if="type === 'tf'">
        <div class="flex gap-4">
             <button class="flex-1 py-4 bg-white border border-indigo-50 rounded-2xl text-[10px] font-black text-slate-400 uppercase tracking-widest hover:bg-emerald-50 hover:text-emerald-600 hover:border-emerald-100 transition-all">صح</button>
             <button class="flex-1 py-4 bg-white border border-indigo-50 rounded-2xl text-[10px] font-black text-slate-400 uppercase tracking-widest hover:bg-rose-50 hover:text-rose-600 hover:border-rose-100 transition-all">خطأ</button>
        </div>
    </template>

    <!-- Essay Layout -->
    <template x-if="type === 'essay'">
        <div class="w-full h-24 bg-white/50 border-2 border-dashed border-indigo-100 rounded-2xl flex items-center justify-center">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">سيتمكن المتربص من كتابة إجابته هنا</p>
        </div>
    </template>

    <!-- Success Feedback (Preview Mockup) -->
    <div class="mt-6 flex items-center gap-3 opacity-0 group-hover:opacity-40 transition-opacity">
        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
        <span class="text-[9px] font-black text-emerald-600 uppercase tracking-widest">تلميح: الإجابة الصحيحة سيتم تظليلها في المعاينة</span>
    </div>
</div>

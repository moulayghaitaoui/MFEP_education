<div class="bg-white rounded-[40px] border border-slate-100 shadow-sm p-10 relative group hover:shadow-2xl hover:border-indigo-100 transition-all duration-500 mb-10"
     x-data="{ type: q.type, index: index + 1 }">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8 pb-8 border-b border-slate-50">
        <div class="flex items-center gap-4">
            <div :class="{
                'bg-indigo-600': type === 'mcq',
                'bg-emerald-600': type === 'essay',
                'bg-blue-600': type === 'tf',
            }" class="w-12 h-12 rounded-2xl flex items-center justify-center text-white transition-colors">
                <i :data-lucide="type === 'mcq' ? 'list-checks' : (type === 'essay' ? 'file-text' : 'check-circle-2')" class="w-6 h-6"></i>
            </div>
            <div>
                <h4 class="text-xs font-black text-slate-400 uppercase tracking-widest">السؤال <span x-text="index"></span></h4>
                <p class="text-xs font-black text-slate-900 uppercase" x-text="type === 'mcq' ? 'اختيار من متعدد' : (type === 'essay' ? 'سؤال مقالي' : 'صح أو خطأ')"></p>
            </div>
        </div>
        <div class="flex items-center gap-3">
             <button class="p-2 text-slate-300 hover:text-indigo-600 transition-all"><i data-lucide="grip-vertical" class="w-5 h-5"></i></button>
             <button @click="questions = questions.filter(item => item.id !== q.id)" class="p-2 text-slate-300 hover:text-rose-500 transition-all"><i data-lucide="trash-2" class="w-5 h-5"></i></button>
        </div>
    </div>

    <!-- Question Text -->
    <div class="space-y-4 mb-10">
        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">نص السؤال</label>
        <textarea rows="2" placeholder="اكتب نص السؤال هنا..." class="w-full bg-slate-50 border-none rounded-3xl px-8 py-6 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-600/10 outline-none transition-all text-lg leading-relaxed"></textarea>
    </div>

    <!-- MCQ Options -->
    <template x-if="type === 'mcq'">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
            <template x-for="opt in ['أ', 'ب', 'ج', 'د']">
                <div class="relative group/opt">
                    <input type="text" :placeholder="'الخيار ' + opt" class="w-full bg-slate-50 border-none rounded-2xl pr-14 pl-6 py-4 font-bold text-slate-700 focus:ring-4 focus:ring-indigo-600/10 outline-none transition-all">
                    <div class="absolute right-4 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full border-2 border-slate-200 flex items-center justify-center cursor-pointer hover:border-indigo-600 transition-all">
                        <div class="w-2 h-2 bg-white rounded-full opacity-0"></div>
                    </div>
                </div>
            </template>
        </div>
    </template>

    <!-- True/False -->
    <template x-if="type === 'tf'">
        <div class="flex gap-4 mb-10">
            <button class="flex-1 py-4 bg-emerald-50 text-emerald-600 rounded-2xl font-black text-xs uppercase tracking-widest border border-emerald-100 hover:bg-emerald-600 hover:text-white transition-all">صح</button>
            <button class="flex-1 py-4 bg-rose-50 text-rose-600 rounded-2xl font-black text-xs uppercase tracking-widest border border-rose-100 hover:bg-rose-600 hover:text-white transition-all">خطأ</button>
        </div>
    </template>

    <!-- Essay -->
    <template x-if="type === 'essay'">
        <div class="mb-10 space-y-4">
             <div class="p-6 bg-slate-50 border-2 border-dashed border-slate-200 rounded-3xl text-center">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">سيظهر للمتربص مساحة لكتابة الإجابة النصية</p>
             </div>
             <div class="flex flex-wrap gap-3">
                <template x-for="rub in ['وضوح الإجابة', 'الدقة العلمية', 'التنظيم']">
                    <span class="px-4 py-2 bg-white border border-slate-100 rounded-xl text-[10px] font-black text-slate-500 uppercase tracking-tight flex items-center gap-2">
                        <i data-lucide="check" class="w-3 h-3 text-emerald-500"></i>
                        <span x-text="rub"></span>
                    </span>
                </template>
                <button class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl text-[10px] font-black uppercase tracking-tight">+ إضافة معيار</button>
             </div>
        </div>
    </template>

    <!-- Footer Settings -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-8 border-t border-slate-50">
        <x-score-input />
        <x-timer-input />
        <div class="space-y-2">
            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">المستوى</label>
            <select class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 outline-none appearance-none">
                <option>سهل</option>
                <option>متوسط</option>
                <option>صعب</option>
            </select>
        </div>
    </div>
</div>

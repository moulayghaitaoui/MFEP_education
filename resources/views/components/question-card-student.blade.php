@props(['type' => 'mcq', 'question' => ''])

<div class="bg-indigo-50/50 border-2 border-indigo-100 rounded-[40px] p-10 my-12 relative overflow-hidden group transition-all hover:shadow-2xl"
     x-data="{ answered: false, selected: null, correct: false }">
    
    <div class="flex items-center gap-4 mb-8">
        <div class="w-10 h-10 bg-indigo-600 text-white rounded-xl flex items-center justify-center shadow-lg">
            <i data-lucide="help-circle" class="w-5 h-5"></i>
        </div>
        <span class="text-[10px] font-black text-indigo-600 uppercase tracking-widest">اختبر فهمك</span>
    </div>

    <h4 class="text-2xl font-black text-slate-900 mb-8 leading-tight">{{ $question }}</h4>

    @if($type == 'mcq')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <template x-for="(opt, i) in ['الخيار الأول', 'الخيار الثاني', 'الخيار الثالث', 'الخيار الرابع']">
                <button @click="selected = i; answered = true; correct = (i == 0)"
                        :class="answered && i == 0 ? 'bg-emerald-500 border-emerald-500 text-white' : (selected == i ? 'bg-rose-500 border-rose-500 text-white' : 'bg-white border-slate-100 text-slate-600 hover:border-indigo-200')"
                        class="p-6 rounded-2xl border-2 font-black text-sm transition-all text-right flex items-center justify-between">
                    <span x-text="opt"></span>
                    <i x-show="answered && i == 0" data-lucide="check-circle-2" class="w-5 h-5 text-white"></i>
                    <i x-show="answered && selected == i && i != 0" data-lucide="x-circle" class="w-5 h-5 text-white"></i>
                </button>
            </template>
        </div>
    @endif

    @if($type == 'tf')
        <div class="flex gap-4 mb-8">
            <button @click="answered = true; correct = true; selected = 1"
                    :class="answered && selected == 1 ? 'bg-emerald-500 border-emerald-500 text-white' : 'bg-white border-slate-100 text-slate-400 hover:text-emerald-600 hover:border-emerald-100'"
                    class="flex-1 py-5 rounded-2xl border-2 font-black text-xs uppercase tracking-widest transition-all">صح</button>
            <button @click="answered = true; correct = false; selected = 0"
                    :class="answered && selected == 0 ? 'bg-rose-500 border-rose-500 text-white' : 'bg-white border-slate-100 text-slate-400 hover:text-rose-600 hover:border-rose-100'"
                    class="flex-1 py-5 rounded-2xl border-2 font-black text-xs uppercase tracking-widest transition-all">خطأ</button>
        </div>
    @endif

    <div x-show="answered" x-transition class="pt-8 border-t border-indigo-100 flex items-center justify-between animate-fade-in">
        <div class="flex items-center gap-3">
             <div :class="correct ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600'" class="w-8 h-8 rounded-full flex items-center justify-center">
                <i :data-lucide="correct ? 'check' : 'alert-circle'" class="w-4 h-4"></i>
             </div>
             <p :class="correct ? 'text-emerald-600' : 'text-rose-600'" class="text-[11px] font-black uppercase tracking-widest" x-text="correct ? 'أحسنت! إجابة صحيحة' : 'للأسف، حاول مرة أخرى'"></p>
        </div>
        <button @click="answered = false; selected = null" class="text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-indigo-600">تخطي</button>
    </div>
</div>

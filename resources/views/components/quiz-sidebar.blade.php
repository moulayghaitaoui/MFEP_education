<div class="space-y-8 sticky top-24">
    <x-teacher-card title="ملخص الاختبار" padding="p-8">
        <div class="space-y-8">
            <div class="flex items-center justify-between">
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">إجمالي الأسئلة</span>
                <span class="text-xl font-black text-slate-900">12</span>
            </div>
            
            <div class="space-y-4 pt-8 border-t border-slate-50">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">إجمالي النقاط</span>
                    <span class="text-2xl font-black text-indigo-600">60/100</span>
                </div>
                <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-full bg-indigo-600 transition-all duration-700" style="width: 60%"></div>
                </div>
            </div>

            <div class="flex items-center justify-between pt-8 border-t border-slate-50">
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">الوقت الكلي</span>
                <span class="flex items-center gap-2 text-sm font-black text-slate-800">
                    <i data-lucide="clock" class="w-4 h-4 text-slate-300"></i>
                    45 دقيقة
                </span>
            </div>
        </div>
    </x-teacher-card>

    <div class="flex flex-col gap-4">
        <a href="{{ route('teacher.quizzes.preview') }}" class="w-full bg-white text-slate-900 py-5 rounded-3xl font-black text-[10px] uppercase tracking-[0.2em] border border-slate-200 hover:bg-slate-50 transition-all text-center flex items-center justify-center gap-3">
            <i data-lucide="eye" class="w-4 h-4 text-indigo-600"></i>
            معاينة الاختبار
        </a>
        <button class="w-full bg-indigo-600 text-white py-6 rounded-3xl font-black text-[10px] uppercase tracking-[0.2em] shadow-2xl shadow-indigo-600/20 hover:bg-indigo-700 transition-all">
            نشر الاختبار الآن
        </button>
    </div>
</div>

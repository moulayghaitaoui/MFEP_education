@extends('layouts.teacher')

@section('title', 'بناء اختبار متقدم - فضاء الأستاذ')

@section('content')
    <div x-data="{ questions: [{id: 1, type: 'mcq'}] }">
        <!-- Header -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8 mb-12 animate-fade-in">
            <div class="flex items-center gap-6">
                <a href="{{ route('teacher.quizzes') }}" class="w-14 h-14 bg-white border border-slate-200 rounded-2xl flex items-center justify-center text-slate-400 hover:text-indigo-600 transition-all shadow-sm">
                    <i data-lucide="arrow-right" class="w-6 h-6"></i>
                </a>
                <div>
                    <h1 class="text-3xl font-black text-slate-900 tracking-tighter">منشئ الاختبارات المتقدم</h1>
                    <p class="text-slate-400 font-medium italic">صمم تجربة تقييم متكاملة للمتربصين.</p>
                </div>
            </div>
            <div class="flex gap-4">
                 <button class="bg-white text-slate-500 px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest border border-slate-200 hover:bg-slate-50 transition-all">حفظ كمسودة</button>
                 <button class="bg-indigo-600 text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 transition-all flex items-center gap-3">
                    <i data-lucide="save" class="w-4 h-4"></i>
                    حفظ وإغلاق
                 </button>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-4 gap-12">
            <!-- Builder Main -->
            <div class="xl:col-span-3 space-y-12">
                <!-- Quiz Info Card -->
                <x-teacher-card title="معلومات الاختبار العامة" padding="p-10">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">عنوان الاختبار</label>
                            <input type="text" placeholder="مثلاً: اختبار الوحدة الرابعة" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 outline-none focus:ring-4 focus:ring-indigo-600/10">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">المادة</label>
                            <select class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 outline-none appearance-none">
                                <option>تطوير تطبيقات الويب</option>
                                <option>أمن المعلومات</option>
                            </select>
                        </div>
                        <div class="md:col-span-2 space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">وصف الاختبار (اختياري)</label>
                            <textarea rows="2" placeholder="اكتب تعليمات الاختبار للمتربصين..." class="w-full bg-slate-50 border-none rounded-3xl px-6 py-5 font-bold text-slate-800 outline-none resize-none"></textarea>
                        </div>
                    </div>
                </x-teacher-card>

                <!-- Dynamic Questions Container -->
                <div class="space-y-8">
                    <template x-for="(q, index) in questions" :key="q.id">
                        <div class="animate-fade-in-up">
                            <x-question-card />
                        </div>
                    </template>
                </div>

                <!-- Add Question Actions -->
                <div class="p-12 bg-white rounded-[48px] border-4 border-dashed border-slate-100 flex flex-col items-center justify-center group hover:bg-indigo-50/50 hover:border-indigo-100 transition-all duration-500">
                    <div class="w-16 h-16 bg-white rounded-[24px] flex items-center justify-center text-slate-300 group-hover:text-indigo-600 shadow-xl mb-8 transition-all group-hover:scale-110">
                        <i data-lucide="plus" class="w-8 h-8"></i>
                    </div>
                    <p class="text-xl font-black text-slate-900 mb-8">أضف سؤالاً جديداً للاختبار</p>
                    
                    <div class="flex flex-wrap justify-center gap-4">
                        <button @click="questions.push({id: Date.now(), type: 'mcq'})" class="px-8 py-4 bg-white border border-slate-200 rounded-2xl text-[10px] font-black text-slate-600 uppercase tracking-widest hover:border-indigo-600 hover:text-indigo-600 transition-all flex items-center gap-3">
                            <i data-lucide="list-checks" class="w-4 h-4"></i>
                            MCQ (خيارات)
                        </button>
                        <button @click="questions.push({id: Date.now(), type: 'tf'})" class="px-8 py-4 bg-white border border-slate-200 rounded-2xl text-[10px] font-black text-slate-600 uppercase tracking-widest hover:border-blue-600 hover:text-blue-600 transition-all flex items-center gap-3">
                            <i data-lucide="check-circle-2" class="w-4 h-4"></i>
                            صح / خطأ
                        </button>
                        <button @click="questions.push({id: Date.now(), type: 'essay'})" class="px-8 py-4 bg-white border border-slate-200 rounded-2xl text-[10px] font-black text-slate-600 uppercase tracking-widest hover:border-emerald-600 hover:text-emerald-600 transition-all flex items-center gap-3">
                            <i data-lucide="file-text" class="w-4 h-4"></i>
                            سؤال مقالي
                        </button>
                    </div>
                </div>
            </div>

            <!-- Builder Sidebar -->
            <div class="xl:col-span-1">
                <x-quiz-sidebar />
            </div>
        </div>
    </div>
@endsection

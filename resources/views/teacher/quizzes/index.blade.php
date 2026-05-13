@extends('layouts.teacher')

@section('title', 'بناء الاختبارات - فضاء الأستاذ')

@section('content')
    <div x-data="{ addQuiz: false, step: 1 }">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-2">منشئ الاختبارات الذكي</h1>
                <p class="text-slate-500 font-medium text-lg">صمم اختبارات تفاعلية، حدد مدتها، وتابع نتائج تصحيحها آلياً.</p>
            </div>
            
            <button @click="addQuiz = true" class="bg-indigo-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 transition-all flex items-center gap-3">
                <i data-lucide="sparkles" class="w-5 h-5"></i>
                اختبار جديد
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Active Quizzes -->
            <div class="lg:col-span-2 space-y-8">
                <x-teacher-card title="الاختبارات النشطة حالياً">
                    <div class="space-y-6">
                        @foreach([
                            ['title' => 'اختبار منتصف السداسي (MVC)', 'group' => 'فوج A1', 'time' => '45 دقيقة', 'responses' => 42],
                            ['title' => 'تقييم مهارات الـ CSS', 'group' => 'فوج B3', 'time' => '30 دقيقة', 'responses' => 28],
                        ] as $quiz)
                            <div class="p-8 bg-slate-50 rounded-[32px] border border-transparent hover:border-indigo-100 hover:bg-white transition-all group flex flex-col md:flex-row md:items-center justify-between gap-8">
                                <div class="flex items-center gap-6">
                                    <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-indigo-600 shadow-sm border border-slate-100">
                                        <i data-lucide="clipboard-check" class="w-7 h-7"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-black text-slate-900 group-hover:text-indigo-600 transition-colors">{{ $quiz['title'] }}</h4>
                                        <div class="flex items-center gap-4 text-[10px] font-bold text-slate-400 mt-1 uppercase tracking-widest">
                                            <span>{{ $quiz['group'] }}</span>
                                            <span>•</span>
                                            <span>{{ $quiz['time'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="flex items-center gap-8">
                                    <div class="text-left">
                                        <p class="text-xl font-black text-slate-900">{{ $quiz['responses'] }}</p>
                                        <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">استجابة</p>
                                    </div>
                                    <div class="flex gap-2">
                                        <button class="p-3 bg-white text-slate-400 hover:text-indigo-600 rounded-xl transition-all shadow-sm"><i data-lucide="eye" class="w-5 h-5"></i></button>
                                        <button class="p-3 bg-white text-slate-400 hover:text-rose-600 rounded-xl transition-all shadow-sm"><i data-lucide="stop-circle" class="w-5 h-5"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-teacher-card>
            </div>

            <!-- Quiz Analytics -->
            <div class="space-y-8">
                <x-teacher-card title="نظرة على النتائج">
                    <div class="space-y-8">
                        <div>
                             <div class="flex justify-between text-xs font-black mb-3">
                                <span class="text-slate-400 uppercase">نسبة النجاح العامة</span>
                                <span class="text-emerald-500">88%</span>
                             </div>
                             <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-emerald-500 rounded-full" style="width: 88%"></div>
                             </div>
                        </div>
                        <div class="pt-8 border-t border-slate-50 space-y-4">
                             @foreach(['صعب' => 12, 'متوسط' => 65, 'سهل' => 23] as $l => $v)
                                <div class="flex items-center justify-between text-[10px] font-black uppercase tracking-widest">
                                    <span class="text-slate-500">{{ $l }}</span>
                                    <span class="text-slate-900">{{ $v }}%</span>
                                </div>
                             @endforeach
                        </div>
                    </div>
                </x-teacher-card>
            </div>
        </div>

        <!-- Quiz Builder Modal -->
        <x-teacher-modal name="addQuiz" title="بناء اختبار جديد (QCM)">
            <div class="space-y-8">
                <!-- Steps Indicator -->
                <div class="flex items-center justify-between mb-10 px-4">
                    @foreach(['المعلومات', 'الأسئلة', 'النشر'] as $i => $s)
                        <div class="flex items-center gap-3">
                            <div :class="step >= {{ $i + 1 }} ? 'bg-indigo-600 text-white' : 'bg-slate-100 text-slate-400'" 
                                 class="w-8 h-8 rounded-full flex items-center justify-center text-[10px] font-black">
                                {{ $i + 1 }}
                            </div>
                            <span :class="step >= {{ $i + 1 }} ? 'text-slate-900' : 'text-slate-300'" 
                                  class="text-[10px] font-black uppercase tracking-widest">
                                {{ $s }}
                            </span>
                        </div>
                    @endforeach
                </div>

                <div x-show="step === 1" x-transition>
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">عنوان الاختبار</label>
                            <input type="text" placeholder="مثلاً: اختبار الوحدة الأولى" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-600/10 outline-none">
                        </div>
                        <div class="grid grid-cols-2 gap-6">
                             <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">المدة (بالدقائق)</label>
                                <input type="number" value="30" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 outline-none">
                             </div>
                             <div class="space-y-2">
                                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">درجة النجاح</label>
                                <input type="number" value="10" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 outline-none">
                             </div>
                        </div>
                    </div>
                </div>

                <div x-show="step === 2" x-transition class="space-y-6">
                    <div class="p-8 bg-slate-50 rounded-3xl border border-indigo-100 relative">
                         <button class="absolute top-4 left-4 text-rose-500 hover:scale-110 transition-transform"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                         <input type="text" value="ما هي أهمية الـ Model في بنية MVC؟" class="w-full bg-transparent border-none p-0 text-lg font-black text-slate-800 focus:ring-0 outline-none mb-6">
                         <div class="space-y-3">
                            @foreach(['إدارة قواعد البيانات', 'عرض الواجهة', 'معالجة التوجيه'] as $opt)
                                <div class="flex items-center gap-4 bg-white p-4 rounded-xl border border-slate-100">
                                     <div class="w-4 h-4 rounded-full border-2 border-indigo-600 flex items-center justify-center">
                                        <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full"></div>
                                     </div>
                                     <span class="text-xs font-bold text-slate-600">{{ $opt }}</span>
                                </div>
                            @endforeach
                         </div>
                    </div>
                    <button class="w-full py-4 border-2 border-dashed border-slate-200 rounded-3xl text-[10px] font-black text-slate-400 uppercase tracking-widest hover:bg-slate-50 transition-all flex items-center justify-center gap-3">
                        <i data-lucide="plus-circle" class="w-5 h-5"></i>
                        إضافة سؤال جديد
                    </button>
                </div>

                <div x-show="step === 3" x-transition class="text-center py-10">
                    <div class="w-20 h-20 bg-indigo-50 text-indigo-600 rounded-3xl mx-auto flex items-center justify-center mb-6">
                        <i data-lucide="send" class="w-10 h-10"></i>
                    </div>
                    <h4 class="text-xl font-black text-slate-900 mb-2">الاختبار جاهز للنشر!</h4>
                    <p class="text-xs font-bold text-slate-400 max-w-xs mx-auto mb-10">سيتم إخطار جميع المتربصين في الفوج المختار بموعد الاختبار.</p>
                    <select class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 outline-none appearance-none mb-6 text-center">
                        <option>اختر الفوج المستهدف</option>
                        <option>فوج A1 - تطوير الويب</option>
                        <option>فوج B2 - أمن المعلومات</option>
                    </select>
                </div>

                <div class="flex gap-4">
                    <button x-show="step > 1" @click="step--" class="flex-1 py-4 bg-slate-100 text-slate-500 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-slate-200 transition-all">السابق</button>
                    <button @click="step === 3 ? (addQuiz = false, step = 1) : step++" class="flex-[2] py-4 bg-indigo-600 text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-indigo-700 transition-all" x-text="step === 3 ? 'نشر الاختبار' : 'التالي'"></button>
                </div>
            </div>
        </x-teacher-modal>
    </div>
@endsection

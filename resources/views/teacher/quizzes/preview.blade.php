@extends('layouts.teacher')

@section('title', 'معاينة الاختبار - فضاء الأستاذ')

@section('content')
    <div x-data="{ currentQ: 1, totalQ: 5, timeLeft: 45 * 60 }" x-init="setInterval(() => timeLeft--, 1000)" class="max-w-4xl mx-auto py-12">
        <!-- Header -->
        <div class="flex items-center justify-between mb-12">
            <div class="flex items-center gap-6">
                <a href="{{ route('teacher.quizzes.create') }}" class="w-12 h-12 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-slate-400 hover:text-indigo-600 transition-all">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight">معاينة: اختبار تطوير الويب</h1>
                    <p class="text-[10px] font-black text-indigo-600 uppercase tracking-widest mt-1">هذه معاينة لما سيراه المتربص</p>
                </div>
            </div>
            
            <!-- Overall Timer -->
            <div class="flex items-center gap-4 bg-slate-900 text-white px-6 py-3 rounded-2xl shadow-xl shadow-slate-900/20">
                <i data-lucide="clock" class="w-5 h-5 text-indigo-400"></i>
                <span class="text-lg font-black font-mono" x-text="Math.floor(timeLeft / 60) + ':' + (timeLeft % 60).toString().padStart(2, '0')"></span>
            </div>
        </div>

        <!-- Question View -->
        <div class="space-y-10 animate-fade-in">
             <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <span class="w-10 h-10 bg-indigo-600 text-white rounded-xl flex items-center justify-center font-black" x-text="currentQ"></span>
                    <span class="text-slate-400 font-bold">من أصل <span x-text="totalQ"></span></span>
                </div>
                <div class="flex gap-2">
                    <template x-for="i in totalQ">
                        <div :class="i <= currentQ ? 'bg-indigo-600' : 'bg-slate-200'" class="w-8 h-1.5 rounded-full transition-all duration-500"></div>
                    </template>
                </div>
             </div>

             <x-teacher-card padding="p-12">
                <!-- Question Specific Timer -->
                <div class="flex justify-center mb-10">
                    <div class="relative w-24 h-24 flex items-center justify-center">
                        <svg class="w-24 h-24 transform -rotate-90">
                            <circle cx="48" cy="48" r="40" stroke="currentColor" stroke-width="8" fill="transparent" class="text-slate-100" />
                            <circle cx="48" cy="48" r="40" stroke="currentColor" stroke-width="8" fill="transparent" class="text-indigo-600" stroke-dasharray="251.2" stroke-dashoffset="50" />
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                            <span class="text-xl font-black text-slate-900">45s</span>
                            <span class="text-[8px] font-black text-slate-400 uppercase">متبقي</span>
                        </div>
                    </div>
                </div>

                <h2 class="text-3xl font-black text-slate-900 leading-tight mb-12 text-center">ما هي الوظيفة الأساسية للـ Service Provider في إطار العمل Laravel؟</h2>
                
                <div class="space-y-4 max-w-2xl mx-auto">
                    @foreach([
                        ['id' => 'a', 'text' => 'ربط الخدمات داخل حاوية التحكم (IoC Container)'],
                        ['id' => 'b', 'text' => 'إدارة الاتصال بقواعد البيانات فقط'],
                        ['id' => 'c', 'text' => 'تحسين سرعة تحميل الصور على السيرفر'],
                        ['id' => 'd', 'text' => 'تشفير كلمات مرور المستخدمين'],
                    ] as $option)
                        <button class="w-full p-8 rounded-[32px] border-2 border-slate-100 hover:border-indigo-600 hover:bg-indigo-50/30 transition-all text-right flex items-center justify-between group">
                            <span class="text-lg font-black text-slate-700 group-hover:text-indigo-600">{{ $option['text'] }}</span>
                            <div class="w-6 h-6 rounded-full border-2 border-slate-200 flex items-center justify-center group-hover:border-indigo-600">
                                <div class="w-2 h-2 bg-indigo-600 rounded-full opacity-0 group-hover:opacity-100"></div>
                            </div>
                        </button>
                    @endforeach
                </div>
             </x-teacher-card>

             <div class="flex items-center justify-between pt-10">
                 <button @click="currentQ > 1 ? currentQ-- : null" :disabled="currentQ === 1" class="px-10 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:bg-slate-50 rounded-2xl transition-all disabled:opacity-20 flex items-center gap-3">
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    السؤال السابق
                 </button>
                 
                 <button @click="currentQ < totalQ ? currentQ++ : null" class="bg-slate-900 text-white px-12 py-5 rounded-3xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-slate-900/20 hover:bg-indigo-600 transition-all flex items-center gap-3">
                    <span x-text="currentQ === totalQ ? 'إنهاء المعاينة' : 'السؤال التالي'"></span>
                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                 </button>
             </div>
        </div>
    </div>
@endsection

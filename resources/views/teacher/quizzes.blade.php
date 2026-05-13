@extends('layouts.app')

@section('title', 'بناء الاختبارات - فضاء الأستاذ')

@section('content')
    <div x-data="{ questions: [{id: 1, type: 'multiple'}] }">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter">بناء اختبار جديد</h1>
                <p class="text-slate-500 font-medium text-lg">صمم أسئلة تفاعلية لتقييم مستوى استيعاب الطلاب.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <button class="bg-indigo-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-indigo-500/20 hover:bg-indigo-700 transition-all flex items-center gap-3">
                    <i data-lucide="save" class="w-5 h-5"></i>
                    نشر الاختبار
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Quiz Builder Area -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Quiz Info -->
                <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm space-y-6">
                    <input type="text" placeholder="عنوان الاختبار (مثال: اختبار نهاية الوحدة الأولى)" class="text-2xl font-black text-slate-900 border-none outline-none focus:ring-0 w-full placeholder:text-slate-200">
                    <textarea placeholder="اكتب تعليمات الاختبار هنا..." class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all resize-none"></textarea>
                </div>

                <!-- Questions List (Alpine.js Dynamic) -->
                <template x-for="(q, index) in questions" :key="q.id">
                    <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm relative group animate-fade-in">
                        <div class="absolute -right-4 top-10 w-8 h-8 bg-slate-900 text-white rounded-lg flex items-center justify-center font-black text-xs shadow-xl" x-text="index + 1"></div>
                        
                        <div class="flex items-center justify-between mb-8">
                            <select class="bg-slate-50 border-none rounded-xl px-4 py-2 text-xs font-black text-indigo-600 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none">
                                <option value="multiple">اختيار من متعدد</option>
                                <option value="true-false">صواب أو خطأ</option>
                                <option value="text">إجابة قصيرة</option>
                            </select>
                            <button @click="questions = questions.filter(item => item.id !== q.id)" class="p-2 text-slate-300 hover:text-red-500 hover:bg-red-50 rounded-xl transition-all">
                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                            </button>
                        </div>

                        <div class="space-y-6">
                            <input type="text" placeholder="اكتب سؤالك هنا..." class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all">
                            
                            <!-- Options -->
                            <div class="space-y-3 pl-8">
                                <template x-for="i in [1,2,3,4]" :key="i">
                                    <div class="flex items-center gap-4">
                                        <div class="w-5 h-5 rounded-full border-2 border-slate-200 flex items-center justify-center cursor-pointer hover:border-indigo-600 transition-colors">
                                            <div class="w-2 h-2 rounded-full bg-indigo-600 scale-0 transition-transform" :class="i === 1 ? 'scale-100' : ''"></div>
                                        </div>
                                        <input type="text" :placeholder="'الخيار ' + i" class="flex-1 bg-white border border-slate-100 rounded-xl px-4 py-2.5 text-sm font-bold text-slate-700 focus:border-indigo-300 outline-none transition-all">
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </template>

                <!-- Add Question Button -->
                <button @click="questions.push({id: Date.now(), type: 'multiple'})" class="w-full py-8 bg-slate-50 rounded-[40px] border-2 border-dashed border-slate-200 text-slate-400 font-black flex flex-col items-center gap-2 hover:bg-indigo-50 hover:border-indigo-200 hover:text-indigo-600 transition-all group">
                    <i data-lucide="plus-circle" class="w-8 h-8 group-hover:scale-110 transition-transform"></i>
                    إضافة سؤال جديد
                </button>
            </div>

            <!-- Quiz Settings Side -->
            <div class="space-y-10">
                <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm space-y-8">
                    <h3 class="text-xl font-black text-slate-900 tracking-tight">إعدادات الاختبار</h3>
                    
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">مدة الاختبار (بالدقائق)</label>
                            <input type="number" value="30" class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 font-bold text-slate-800 outline-none">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">عدد المحاولات المسموحة</label>
                            <input type="number" value="1" class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 font-bold text-slate-800 outline-none">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest">درجة النجاح (%)</label>
                            <input type="number" value="60" class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 font-bold text-slate-800 outline-none">
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-50 space-y-4">
                         @foreach([
                            ['label' => 'ترتيب عشوائي للأسئلة', 'active' => true],
                            ['label' => 'عرض النتائج فورياً', 'active' => false],
                            ['label' => 'السماح بالمراجعة بعد الانتهاء', 'active' => true],
                        ] as $toggle)
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-600">{{ $toggle['label'] }}</span>
                                <div x-data="{ on: {{ $toggle['active'] ? 'true' : 'false' }} }" @click="on = !on" :class="on ? 'bg-indigo-600' : 'bg-slate-200'" class="w-10 h-5 rounded-full relative cursor-pointer transition-colors duration-300">
                                    <div :class="on ? 'translate-x-1' : 'translate-x-6'" class="absolute top-0.5 right-0.5 w-4 h-4 bg-white rounded-full shadow-sm transition-transform duration-300"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Preview Statistics -->
                <div class="bg-indigo-900 rounded-[40px] p-10 text-white shadow-2xl relative overflow-hidden shadow-indigo-900/40">
                    <h3 class="text-xl font-black mb-6">ملخص الاختبار</h3>
                    <div class="grid grid-cols-2 gap-4">
                         <div class="p-4 bg-white/10 rounded-2xl">
                             <p class="text-[10px] font-black text-indigo-300 uppercase">الأسئلة</p>
                             <p class="text-xl font-black" x-text="questions.length"></p>
                         </div>
                         <div class="p-4 bg-white/10 rounded-2xl">
                             <p class="text-[10px] font-black text-indigo-300 uppercase">الوقت</p>
                             <p class="text-xl font-black">30 د</p>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

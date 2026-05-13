@extends('layouts.app')

@section('title', 'نتائج الاختبارات - مساري الدراسي')

@section('content')
    <div>
        <div class="mb-12">
            <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-4">كشف النتائج</h1>
            <p class="text-slate-500 font-medium text-lg">متابعة نتائج الاختبارات والتقييمات الدورية.</p>
        </div>

        <div class="grid grid-cols-1 gap-8">
            @foreach([
                ['course' => 'تطوير الويب باستخدام Laravel', 'exam' => 'اختبار الوحدة 4: بنية MVC', 'score' => 18, 'total' => 20, 'status' => 'pass'],
                ['course' => 'تطوير الويب باستخدام Laravel', 'exam' => 'اختبار الوحدة 2: الأساسيات', 'score' => 15, 'total' => 20, 'status' => 'pass'],
                ['course' => 'تصميم واجهات المستخدم UI/UX', 'exam' => 'اختبار نهائي: نظرية الألوان', 'score' => 20, 'total' => 20, 'status' => 'pass'],
                ['course' => 'أمن المعلومات والشبكات', 'exam' => 'اختبار منتصف السداسي', 'score' => 09, 'total' => 20, 'status' => 'fail'],
            ] as $result)
                <div class="bg-white rounded-[40px] p-8 md:p-10 border border-slate-100 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-8 group hover:shadow-xl transition-all duration-500">
                    <div class="flex items-center gap-8">
                        <div @class([
                            'w-20 h-20 rounded-[28px] flex items-center justify-center flex-shrink-0 transition-transform group-hover:rotate-12',
                            'bg-emerald-50 text-emerald-600' => $result['status'] == 'pass',
                            'bg-rose-50 text-rose-600' => $result['status'] == 'fail',
                        ])>
                            <i data-lucide="{{ $result['status'] == 'pass' ? 'check-circle' : 'alert-circle' }}" class="w-10 h-10"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-black text-blue-600 uppercase tracking-widest mb-1">{{ $result['course'] }}</p>
                            <h3 class="text-xl font-black text-slate-900 tracking-tight">{{ $result['exam'] }}</h3>
                        </div>
                    </div>

                    <div class="flex items-center gap-10">
                        <div class="text-left">
                            <span @class([
                                'text-4xl font-black',
                                'text-emerald-600' => $result['status'] == 'pass',
                                'text-rose-600' => $result['status'] == 'fail',
                            ])>{{ $result['score'] }}</span>
                            <span class="text-slate-300 text-xl font-black"> / {{ $result['total'] }}</span>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">العلامة النهائية</p>
                        </div>
                        
                        <div class="flex gap-2">
                            <button class="p-4 bg-slate-50 text-slate-400 hover:bg-blue-50 hover:text-blue-600 rounded-2xl transition-all"><i data-lucide="eye" class="w-6 h-6"></i></button>
                            <button class="p-4 bg-slate-50 text-slate-400 hover:bg-blue-50 hover:text-blue-600 rounded-2xl transition-all"><i data-lucide="download" class="w-6 h-6"></i></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

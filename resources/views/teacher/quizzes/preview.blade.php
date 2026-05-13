@extends('layouts.teacher')

@section('title', 'معاينة الاختبار - فضاء الأستاذ')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="flex items-center justify-between mb-12">
            <div class="flex items-center gap-6">
                <a href="{{ route('teacher.quizzes') }}" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-slate-400 hover:text-gov-green transition-all shadow-sm border border-slate-100">
                    <i data-lucide="arrow-right" class="w-6 h-6"></i>
                </a>
                <div>
                    <h1 class="text-3xl font-black text-slate-900 tracking-tighter mb-1">معاينة: اختبار منتصف السداسي (MVC)</h1>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">عرض كيف سيظهر الاختبار للمتربصين</p>
                </div>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="px-6 py-3 bg-gov-green/10 text-gov-green rounded-xl text-xs font-black uppercase tracking-widest border border-gov-green/20">
                    45 دقيقة
                </div>
            </div>
        </div>

        <!-- Quiz Content -->
        <div class="space-y-8">
            @foreach([
                [
                    'q' => 'ما هي الوظيفة الأساسية للـ Controller في نمط MVC؟',
                    'opts' => [
                        'إدارة الاتصال بقاعدة البيانات',
                        'استقبال الطلبات وتنسيق البيانات بين الـ Model والـ View',
                        'تحديد شكل الواجهة الرسومية للمستخدم',
                        'تخزين الملفات الثابتة للمشروع'
                    ],
                    'correct' => 1,
                    'type' => 'mcq'
                ],
                [
                    'q' => 'أي من الملفات التالية يعتبر مسؤولاً عن التوجيه (Routing) في Laravel؟',
                    'opts' => [
                        'app.php',
                        'web.php',
                        'config.php',
                        'index.php'
                    ],
                    'correct' => 1,
                    'type' => 'mcq'
                ],
                [
                    'q' => 'ما هو الأمر المستخدم لإنشاء Controller جديد عبر الـ Terminal؟',
                    'opts' => [
                        'php artisan make:controller',
                        'php artisan create:controller',
                        'php artisan new:controller',
                        'php artisan build:controller'
                    ],
                    'correct' => 0,
                    'type' => 'mcq'
                ],
                [
                    'q' => 'أكمل الجملة التالية: يعتبر الـ _______ هو حلقة الوصل بين واجهة المستخدم وقاعدة البيانات في بيئة Laravel.',
                    'type' => 'fill',
                    'answer' => 'Controller'
                ],
                [
                    'q' => 'اشرح باختصار الفرق بين دالتي GET و POST في التعامل مع النماذج (Forms).',
                    'type' => 'text',
                    'placeholder' => 'اكتب إجابتك هنا...'
                ]
            ] as $i => $item)
                <x-teacher-card class="relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-1.5 h-full bg-gov-green/20 group-hover:bg-gov-green transition-colors"></div>
                    <div class="flex gap-8">
                        <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 font-black text-sm flex-shrink-0">
                            {{ $i + 1 }}
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-black text-slate-800 mb-8 leading-relaxed">{{ $item['q'] }}</h3>
                            
                            @if($item['type'] === 'mcq')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach($item['opts'] as $oi => $opt)
                                        <div @class([
                                            'p-5 rounded-2xl border-2 transition-all flex items-center gap-4',
                                            'bg-gov-green/5 border-gov-green text-gov-green' => $oi === $item['correct'],
                                            'bg-white border-slate-100 text-slate-500' => $oi !== $item['correct']
                                        ])>
                                            <div @class([
                                                'w-5 h-5 rounded-full border-2 flex items-center justify-center',
                                                'border-gov-green' => $oi === $item['correct'],
                                                'border-slate-200' => $oi !== $item['correct']
                                            ])>
                                                @if($oi === $item['correct'])
                                                    <div class="w-2 h-2 bg-gov-green rounded-full"></div>
                                                @endif
                                            </div>
                                            <span class="text-sm font-bold">{{ $opt }}</span>
                                            @if($oi === $item['correct'])
                                                <i data-lucide="check-circle-2" class="w-4 h-4 mr-auto"></i>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @elseif($item['type'] === 'fill')
                                <div class="relative max-w-md">
                                    <input type="text" value="{{ $item['answer'] }}" class="w-full bg-gov-green/5 border-2 border-gov-green rounded-2xl px-6 py-4 font-black text-gov-green outline-none" readonly>
                                    <span class="absolute -top-3 right-6 px-2 bg-white text-[9px] font-black text-gov-green uppercase tracking-widest border border-gov-green/20 rounded-md">الإجابة النموذجية</span>
                                </div>
                            @elseif($item['type'] === 'text')
                                <div class="space-y-4">
                                    <textarea class="w-full bg-slate-50 border-2 border-slate-100 rounded-[32px] px-8 py-6 font-bold text-slate-400 h-32 outline-none focus:border-gov-green/20 transition-all" placeholder="{{ $item['placeholder'] }}" readonly></textarea>
                                    <div class="flex items-center gap-2 text-amber-500">
                                        <i data-lucide="info" class="w-4 h-4"></i>
                                        <span class="text-[10px] font-black uppercase tracking-widest">ملاحظة: هذا السؤال يتطلب تصحيحاً يدوياً من الأستاذ</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </x-teacher-card>
            @endforeach
        </div>

        <!-- Footer Actions -->
        <div class="mt-12 p-8 bg-slate-900 rounded-[40px] flex items-center justify-between shadow-2xl shadow-slate-900/40">
            <div>
                <p class="text-white font-black text-lg">هل ترغب في تعديل الأسئلة؟</p>
                <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mt-1">يمكنك العودة للمحرر وإجراء التغييرات</p>
            </div>
            <div class="flex gap-4">
                <button class="bg-white/10 text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-white/20 transition-all">تعديل الاختبار</button>
                <button class="bg-gov-green text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-gov-green-dark transition-all shadow-xl shadow-gov-green/20">تثبيت ونشر</button>
            </div>
        </div>
    </div>
@endsection

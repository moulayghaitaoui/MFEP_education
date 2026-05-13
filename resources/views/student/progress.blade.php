@extends('layouts.student')

@section('title', 'تقدم التعلم - مساري الأكاديمي')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="mb-16 animate-fade-in">
            <h1 class="text-5xl font-black text-slate-900 tracking-tighter mb-4">تقدمي الدراسي والتحليلات</h1>
            <p class="text-slate-500 font-medium text-lg italic">نظرة شاملة على إنجازاتك وما تبقى لك لتحقيق أهدافك.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Mastery Column -->
            <div class="lg:col-span-1 space-y-10">
                <x-student-card title="مستوى الإتقان">
                    <div class="flex flex-col items-center py-10">
                         <div class="w-48 h-48 rounded-full border-[16px] border-slate-50 flex items-center justify-center relative">
                            <svg class="absolute inset-0 w-full h-full transform -rotate-90">
                                <circle cx="50%" cy="50%" r="42%" stroke="currentColor" stroke-width="16" fill="transparent" class="text-blue-600" stroke-dasharray="264" stroke-dashoffset="66" stroke-linecap="round" />
                            </svg>
                            <div class="text-center">
                                <p class="text-4xl font-black text-slate-900 tracking-tight">B2</p>
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">مستوى الكفاءة</p>
                            </div>
                         </div>
                         <p class="mt-10 text-center text-sm font-bold text-slate-500 leading-relaxed px-6">أنت تتفوق على **85%** من زملائك في هذا المسار التكويني. استمر في هذا الأداء!</p>
                    </div>
                </x-student-card>

                <x-student-card title="المهارات التقنية">
                    <div class="space-y-8">
                         @foreach([
                            ['skill' => 'Laravel Framework', 'v' => 90, 'c' => 'blue'],
                            ['skill' => 'Database Architecture', 'v' => 75, 'c' => 'indigo'],
                            ['skill' => 'UI/UX Principles', 'v' => 45, 'c' => 'amber'],
                            ['skill' => 'Version Control (Git)', 'v' => 60, 'c' => 'emerald'],
                         ] as $s)
                            <div>
                                <div class="flex justify-between text-[10px] font-black uppercase tracking-widest mb-2">
                                    <span class="text-slate-400">{{ $s['skill'] }}</span>
                                    <span class="text-slate-900">{{ $s['v'] }}%</span>
                                </div>
                                <div class="w-full h-1.5 bg-slate-50 rounded-full overflow-hidden">
                                    <div @class([
                                        'h-full rounded-full transition-all duration-1000',
                                        'bg-blue-600' => $s['c'] == 'blue',
                                        'bg-indigo-600' => $s['c'] == 'indigo',
                                        'bg-amber-600' => $s['c'] == 'amber',
                                        'bg-emerald-600' => $s['c'] == 'emerald',
                                    ]) style="width: {{ $s['v'] }}%"></div>
                                </div>
                            </div>
                         @endforeach
                    </div>
                </x-student-card>
            </div>

            <!-- Learning Path Column -->
            <div class="lg:col-span-2 space-y-12">
                <x-student-card title="خارطة طريق المسار التكويني">
                    <div class="relative space-y-12 before:absolute before:right-8 before:top-4 before:bottom-4 before:w-1 before:bg-slate-100 before:rounded-full">
                        @foreach([
                            ['title' => 'أساسيات الويب و PHP', 'status' => 'completed', 'date' => 'مكتمل - 12 أفريل'],
                            ['title' => 'إطار العمل Laravel المتقدم', 'status' => 'active', 'date' => 'قيد الدراسة حالياً'],
                            ['title' => 'بناء المشاريع الحقيقية', 'status' => 'locked', 'date' => 'مغلق حتى إكمال الوحدة السابقة'],
                            ['title' => 'مشروع التخرج والاعتماد', 'status' => 'locked', 'date' => 'مرحلة نهائية'],
                        ] as $path)
                            <div class="relative pr-20 group">
                                <div @class([
                                    'absolute right-5 top-0 w-6 h-6 rounded-full border-4 border-white shadow-xl transition-transform group-hover:scale-125 z-10',
                                    'bg-emerald-500 shadow-emerald-500/20' => $path['status'] == 'completed',
                                    'bg-blue-600 shadow-blue-600/20 animate-pulse' => $path['status'] == 'active',
                                    'bg-slate-200' => $path['status'] == 'locked',
                                ])></div>
                                
                                <div @class([
                                    'p-8 rounded-[32px] border transition-all duration-500',
                                    'bg-white border-slate-50 shadow-sm' => $path['status'] != 'active',
                                    'bg-blue-50/30 border-blue-100 shadow-xl' => $path['status'] == 'active',
                                ])>
                                    <h4 @class([
                                        'text-xl font-black mb-2',
                                        'text-slate-900' => $path['status'] != 'locked',
                                        'text-slate-300' => $path['status'] == 'locked',
                                        'text-blue-600' => $path['status'] == 'active',
                                    ])>{{ $path['title'] }}</h4>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">{{ $path['date'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-student-card>
            </div>
        </div>
    </div>
@endsection

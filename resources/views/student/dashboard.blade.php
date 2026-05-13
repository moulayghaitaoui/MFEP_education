@extends('layouts.app')

@section('title', 'لوحة التحكم - رحلتي التعليمية')

@section('content')
    <!-- Welcome Section -->
    <div class="mb-12">
        <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-2">مرحباً بك مجدداً، محمد 👋</h1>
        <p class="text-slate-500 font-medium text-lg">أنت تقوم بعمل رائع! لقد أكملت 75% من أهدافك الأسبوعية.</p>
    </div>

    <!-- Continue Learning Section (Coursera Style) -->
    <div class="mb-16">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-black text-slate-900 tracking-tight">مواصلة التعلم</h2>
            <a href="{{ route('student.courses') }}" class="text-blue-600 font-black text-xs uppercase tracking-widest hover:underline">عرض كل الكورسات</a>
        </div>
        
        <div class="bg-white rounded-[40px] p-8 md:p-10 border border-slate-100 shadow-sm flex flex-col lg:flex-row items-center gap-10 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-bl-[200px] -z-10 group-hover:scale-110 transition-transform duration-700"></div>
            
            <div class="w-full lg:w-72 aspect-video rounded-3xl overflow-hidden shadow-2xl relative flex-shrink-0">
                <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover" alt="">
                <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center border border-white/30 group-hover:scale-110 transition-transform">
                        <i data-lucide="play" class="w-6 h-6 text-white fill-white ml-1"></i>
                    </div>
                </div>
            </div>
            
            <div class="flex-1 space-y-4">
                <div class="flex items-center gap-2">
                    <span class="px-3 py-1 bg-blue-100 text-blue-600 text-[10px] font-black rounded-lg uppercase tracking-widest">الوحدة 4: بنية البيانات</span>
                    <span class="text-[10px] font-bold text-slate-400">• منذ يومين</span>
                </div>
                <h3 class="text-3xl font-black text-slate-900 leading-tight">تطوير تطبيقات الويب المتقدمة باستخدام Laravel & Vue</h3>
                <div class="flex flex-wrap items-center gap-6 text-xs font-bold text-slate-400">
                    <span class="flex items-center gap-2"><i data-lucide="clock" class="w-4 h-4"></i> متبقي 15 دقيقة</span>
                    <span class="flex items-center gap-2"><i data-lucide="award" class="w-4 h-4"></i> اختبار قادم</span>
                </div>
                
                <div class="pt-4 max-w-md">
                    <div class="flex justify-between text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">
                        <span>التقدم في الكورس</span>
                        <span class="text-blue-600">68%</span>
                    </div>
                    <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-600 rounded-full" style="width: 68%"></div>
                    </div>
                </div>
            </div>
            
            <a href="{{ route('student.learning', ['id' => 1]) }}" class="bg-blue-600 text-white px-10 py-5 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-blue-500/30 hover:bg-blue-700 transition-all">
                متابعة الدرس
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Learning Stats & Path -->
        <div class="lg:col-span-2 space-y-12">
            <!-- Achievement Grid -->
            <div>
                <h3 class="text-xl font-black text-slate-900 mb-8 tracking-tight">إنجازاتك الأخيرة</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach([
                        ['title' => 'متعلم مثابر', 'desc' => 'أكملت 5 دروس في يوم واحد', 'icon' => 'zap', 'color' => 'amber'],
                        ['title' => 'خبير الخوارزميات', 'desc' => 'حصلت على 100% في اختبار منطق البرمجة', 'icon' => 'brain', 'color' => 'indigo'],
                    ] as $badge)
                        <div class="bg-white p-6 rounded-[32px] border border-slate-100 shadow-sm flex items-center gap-6 group hover:-translate-y-1 transition-all">
                            <div @class([
                                'w-14 h-14 rounded-2xl flex items-center justify-center transition-transform group-hover:scale-110',
                                'bg-amber-50 text-amber-600' => $badge['color'] == 'amber',
                                'bg-indigo-50 text-indigo-600' => $badge['color'] == 'indigo',
                            ])>
                                <i data-lucide="{{ $badge['icon'] }}" class="w-7 h-7"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-black text-slate-900 mb-1">{{ $badge['title'] }}</h4>
                                <p class="text-[11px] font-bold text-slate-500 leading-relaxed">{{ $badge['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Learning Schedule / Upcoming Quizzes -->
            <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm">
                <h3 class="text-xl font-black text-slate-900 mb-8 tracking-tight">المهام والاختبارات القادمة</h3>
                <div class="space-y-6">
                    @foreach([
                        ['title' => 'اختبار نهائي: برمجة الكائنات (OOP)', 'due' => 'غداً، 10:00 AM', 'type' => 'Quiz', 'color' => 'rose'],
                        ['title' => 'تسليم مشروع: واجهة متجر إلكتروني', 'due' => 'الخميس، 11:59 PM', 'type' => 'Project', 'color' => 'amber'],
                        ['title' => 'محاضرة مباشرة: الذكاء الاصطناعي', 'due' => 'السبت، 02:00 PM', 'type' => 'Live', 'color' => 'blue'],
                    ] as $task)
                        <div class="flex items-center justify-between p-6 bg-slate-50/50 rounded-3xl border border-transparent hover:border-blue-100 hover:bg-white transition-all cursor-pointer group">
                            <div class="flex items-center gap-4">
                                <div @class([
                                    'w-2 h-2 rounded-full',
                                    'bg-rose-500' => $task['color'] == 'rose',
                                    'bg-amber-500' => $task['color'] == 'amber',
                                    'bg-blue-500' => $task['color'] == 'blue',
                                ])></div>
                                <div>
                                    <p class="text-sm font-bold text-slate-800 group-hover:text-blue-600 transition-colors">{{ $task['title'] }}</p>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mt-1">{{ $task['due'] }}</p>
                                </div>
                            </div>
                            <span @class([
                                'px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest',
                                'bg-rose-50 text-rose-600' => $task['color'] == 'rose',
                                'bg-amber-50 text-amber-600' => $task['color'] == 'amber',
                                'bg-blue-50 text-blue-600' => $task['color'] == 'blue',
                            ])>{{ $task['type'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sidebar: Certificates & Progress Summary -->
        <div class="space-y-12">
            <!-- Quick Progress Chart Placeholder -->
            <div class="bg-slate-900 rounded-[40px] p-10 text-white shadow-2xl shadow-slate-900/40 relative overflow-hidden">
                <div class="absolute -left-10 -bottom-10 w-48 h-48 bg-blue-600/20 rounded-full blur-3xl"></div>
                <h3 class="text-xl font-black mb-8 relative z-10">إحصائيات التعلم</h3>
                <div class="space-y-6 relative z-10">
                    <div class="flex items-end justify-between gap-2 h-24">
                        @foreach([40, 70, 45, 90, 65, 80, 50] as $h)
                            <div class="w-full bg-blue-600/30 rounded-t-lg transition-all hover:bg-blue-500" style="height: {{ $h }}%"></div>
                        @endforeach
                    </div>
                    <div class="flex items-center justify-between text-[10px] font-black uppercase tracking-widest text-slate-400">
                        <span>ح</span><span>ن</span><span>ث</span><span>أ</span><span>خ</span><span>ج</span><span>س</span>
                    </div>
                    <div class="pt-6 border-t border-white/5 grid grid-cols-2 gap-4 text-center">
                        <div>
                            <p class="text-xl font-black">12</p>
                            <p class="text-[9px] font-bold text-slate-500 uppercase tracking-widest">ساعة دراسة</p>
                        </div>
                        <div>
                            <p class="text-xl font-black">5</p>
                            <p class="text-[9px] font-bold text-slate-500 uppercase tracking-widest">دروس مكتملة</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Certificates -->
            <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm">
                <h3 class="text-xl font-black text-slate-900 mb-8 tracking-tight">آخر الشهادات</h3>
                <div class="space-y-6">
                    @foreach([
                        ['title' => 'أساسيات البرمجة بلغة C', 'date' => 'ماي 2024'],
                        ['title' => 'تصميم قواعد البيانات', 'date' => 'أفريل 2024'],
                    ] as $cert)
                        <div class="flex items-center gap-4 group cursor-pointer">
                            <div class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center group-hover:bg-blue-50 transition-colors">
                                <i data-lucide="award" class="w-6 h-6 text-slate-300 group-hover:text-blue-600 transition-colors"></i>
                            </div>
                            <div>
                                <p class="text-xs font-black text-slate-800 group-hover:text-blue-600 transition-colors leading-tight">{{ $cert['title'] }}</p>
                                <p class="text-[10px] font-bold text-slate-400 mt-1 uppercase">{{ $cert['date'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="w-full mt-10 py-4 border border-slate-100 rounded-2xl text-xs font-black text-slate-400 hover:bg-slate-50 hover:text-blue-600 transition-all uppercase tracking-widest">
                    مشاهدة كل الشهادات
                </button>
            </div>
        </div>
    </div>
@endsection

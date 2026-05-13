@extends('layouts.student')

@section('title', 'لوحة التحكم - تجربة تعلم تفاعلية')

@section('content')
    <!-- Welcome Section -->
    <div class="mb-12 animate-fade-in">
        <div class="bg-slate-900 rounded-[60px] p-12 md:p-20 relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-12 shadow-2xl">
            <!-- Background Decoration -->
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-gov-green/20 rounded-full blur-[100px]"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-gov-gold/20 rounded-full blur-[100px]"></div>
            
            <div class="relative z-10 text-center md:text-right">
                <h1 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tighter leading-tight">مرحباً بك مجدداً،<br>محمد بن علي 👋</h1>
                <p class="text-gov-gold-light/80 text-lg md:text-xl font-medium mb-10 max-w-xl">لقد أكملت 65% من مسار "تطوير تطبيقات الويب". أنت على بعد 3 دروس فقط من الشهادة!</p>
                <a href="{{ route('student.interactive-lesson', ['id' => 1]) }}" class="inline-flex items-center gap-4 bg-gov-green text-white px-10 py-5 rounded-3xl font-black text-xs uppercase tracking-[0.2em] shadow-2xl shadow-gov-green/40 hover:bg-gov-green-dark hover:-translate-y-1 transition-all">
                    مواصلة التعلم التفاعلي
                    <i data-lucide="play-circle" class="w-6 h-6 text-gov-gold"></i>
                </a>
            </div>

            <div class="relative z-10">
                <div class="w-48 h-48 md:w-64 md:h-64 rounded-[60px] border-8 border-white/5 flex items-center justify-center relative bg-white/5 backdrop-blur-xl">
                    <svg class="w-40 h-40 md:w-56 md:h-56 transform -rotate-90">
                        <circle cx="50%" cy="50%" r="45%" stroke="currentColor" stroke-width="12" fill="transparent" class="text-white/5" />
                        <circle cx="50%" cy="50%" r="45%" stroke="currentColor" stroke-width="12" fill="transparent" class="text-gov-green" stroke-dasharray="283" stroke-dashoffset="99" stroke-linecap="round" />
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-4xl md:text-6xl font-black text-white">65%</span>
                        <span class="text-[10px] font-black text-gov-gold uppercase tracking-widest mt-2">مكتمل</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Main Feed -->
        <div class="lg:col-span-2 space-y-12">
            <!-- Learning Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach([
                    ['label' => 'ساعات التعلم', 'value' => '24h', 'icon' => 'clock', 'color' => 'gov-green'],
                    ['label' => 'دروس مكتملة', 'value' => '12/18', 'icon' => 'book-check', 'color' => 'emerald'],
                    ['label' => 'نقاط التفاعل', 'value' => '1.2k', 'icon' => 'zap', 'color' => 'gov-gold'],
                ] as $stat)
                    <x-student-card class="group hover:-translate-y-1 transition-all">
                        <div class="flex items-center gap-6">
                            <div @class([
                                'w-14 h-14 rounded-2xl flex items-center justify-center transition-transform group-hover:scale-110 shadow-lg',
                                'bg-gov-green/10 text-gov-green' => $stat['color'] == 'gov-green',
                                'bg-emerald-50 text-emerald-600' => $stat['color'] == 'emerald',
                                'bg-gov-gold/10 text-gov-gold' => $stat['color'] == 'gov-gold',
                            ])>
                                <i data-lucide="{{ $stat['icon'] }}" class="w-7 h-7"></i>
                            </div>
                            <div>
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">{{ $stat['label'] }}</p>
                                <p class="text-2xl font-black text-slate-900 leading-none">{{ $stat['value'] }}</p>
                            </div>
                        </div>
                    </x-student-card>
                @endforeach
            </div>

            <!-- Learning Timeline -->
            <x-student-card title="مسار التقدم الزمني" subtitle="تتبع رحلتك التعليمية يوماً بيوم">
                <div class="h-64 w-full flex items-end justify-between gap-4 px-4 relative">
                    @foreach([30, 50, 40, 80, 60, 95, 70] as $h)
                        <div class="flex-1 flex flex-col items-center group cursor-pointer">
                            <div class="w-full bg-slate-50 rounded-t-2xl transition-all group-hover:bg-gov-green relative overflow-hidden" style="height: {{ $h }}px">
                                <div class="absolute inset-0 bg-gradient-to-t from-gov-green/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </div>
                            <span class="text-[9px] font-black text-slate-400 mt-4 uppercase group-hover:text-gov-green transition-colors">يو {{ $loop->iteration }}</span>
                        </div>
                    @endforeach
                    <div class="absolute top-1/2 left-0 right-0 border-t border-dashed border-slate-100 -z-10"></div>
                </div>
            </x-student-card>

            <!-- Upcoming Quizzes -->
            <x-student-card title="الاختبارات القادمة">
                 <div class="space-y-6">
                    @foreach([
                        ['title' => 'تقييم مهارات Laravel', 'date' => 'غداً - 10:00 ص', 'duration' => '45 دقيقة', 'type' => 'التقييم الفصلي'],
                        ['title' => 'أساسيات الـ Docker', 'date' => 'الخميس - 02:00 م', 'duration' => '30 دقيقة', 'type' => 'كويز قصير'],
                    ] as $quiz)
                        <div class="p-8 bg-slate-50 rounded-[32px] border border-transparent hover:border-gov-green/20 hover:bg-white transition-all group flex flex-col md:flex-row md:items-center justify-between gap-8">
                             <div class="flex items-center gap-6">
                                <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center text-gov-green shadow-sm"><i data-lucide="clipboard-list" class="w-7 h-7"></i></div>
                                <div>
                                    <h4 class="text-lg font-black text-slate-900 group-hover:text-gov-green transition-colors">{{ $quiz['title'] }}</h4>
                                    <p class="text-xs font-bold text-slate-400 mt-1 uppercase">{{ $quiz['date'] }} • {{ $quiz['duration'] }}</p>
                                </div>
                             </div>
                             <button class="bg-white text-slate-900 px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest border border-slate-100 hover:bg-gov-green hover:text-white transition-all shadow-sm">دخول القاعة</button>
                        </div>
                    @endforeach
                 </div>
            </x-student-card>
        </div>

        <!-- Sidebar -->
        <div class="space-y-12">
            <!-- Achievements -->
            <div class="space-y-6">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] px-4">آخر الإنجازات</p>
                <x-achievement-card title="المتعلم المواظب" icon="award" color="gov-green" />
                <x-achievement-card title="عبقري البرمجة" icon="cpu" color="emerald" />
                <x-achievement-card title="أول درس مكتمل" icon="check-circle" color="gov-gold" />
            </div>

            <!-- Activity Feed -->
            <x-student-card title="آخر التنبيهات">
                <div class="space-y-8">
                    @foreach([
                        ['icon' => 'message-square', 'text' => 'أضاف الأستاذ تعليقاً على مشروعك', 'time' => 'منذ 5 دقائق'],
                        ['icon' => 'file-text', 'text' => 'تم رفع ملفات جديدة في كورس Laravel', 'time' => 'منذ ساعتين'],
                        ['icon' => 'award', 'text' => 'حصلت على بادج "المبرمج المتميز"', 'time' => 'منذ يوم'],
                    ] as $act)
                        <div class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-slate-50 text-slate-400 rounded-lg flex items-center justify-center flex-shrink-0"><i data-lucide="{{ $act['icon'] }}" class="w-4 h-4"></i></div>
                            <div>
                                <p class="text-xs font-black text-slate-800 leading-tight">{{ $act['text'] }}</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase mt-1">{{ $act['time'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-student-card>
        </div>
    </div>
@endsection

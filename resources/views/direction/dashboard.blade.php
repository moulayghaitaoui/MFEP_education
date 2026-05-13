@extends('layouts.direction')

@section('title', 'مديرية التكوين والتعليم المهنيين - ولاية سطيف')

@section('navbar')
    <header class="h-24 bg-white/80 backdrop-blur-xl border-b border-slate-100 flex items-center justify-between px-12 z-20">
        <div class="flex items-center gap-8">
            <button @click="sidebarOpen = !sidebarOpen" class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 hover:text-slate-900 transition-all">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <div>
                <h2 class="text-xl font-black text-slate-900 tracking-tight">مديرية ولاية سطيف</h2>
                <p class="text-[10px] font-black text-gov-green uppercase tracking-widest mt-0.5">بوابة التسيير الإقليمي</p>
            </div>
        </div>

        <div class="flex items-center gap-6">
            <button class="relative w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 hover:text-slate-900 transition-all shadow-sm">
                <i data-lucide="bell" class="w-6 h-6"></i>
                <span class="absolute top-3 right-3 w-2 h-2 bg-rose-500 rounded-full border-2 border-white"></span>
            </button>
            <div class="w-12 h-12 rounded-2xl bg-gov-green flex items-center justify-center text-white font-black text-xs shadow-xl shadow-gov-green/20">
                DR
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="p-12 space-y-12">
        <!-- Top Section: Stats & Calendar -->
        <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">
            <div class="xl:col-span-3 grid grid-cols-1 md:grid-cols-3 gap-8">
                <x-direction-stat-widget label="إجمالي المتربصين" value="45,240" icon="users" color="gov-green" progress="12" />
                <x-direction-stat-widget label="عدد الأساتذة بالولاية" value="1,850" icon="award" color="gov-gold" />
                <x-direction-stat-widget label="نسبة الحضور العامة" value="94.2%" icon="check-circle-2" color="emerald" />
            </div>
            <div class="xl:col-span-1">
                <x-direction-calendar-widget />
            </div>
        </div>

        <!-- Middle Section: Performance & Activity -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-12">
            <div class="xl:col-span-2">
                <x-direction-performance-chart title="تطور معدل النجاح عبر معاهد الولاية" />
            </div>

            <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm flex flex-col">
                <h3 class="text-xl font-black text-slate-900 tracking-tight mb-8">نشاط المعاهد الأخير</h3>
                <div class="flex-1 space-y-8">
                    @foreach([
                        ['m' => 'معهد سطيف 01', 'a' => 'تم استكمال برنامج الوحدة 4', 't' => 'منذ ساعة', 'c' => 'gov-green'],
                        ['m' => 'معهد العلمة', 'a' => 'بدء التسجيلات في دورة ماي', 't' => 'منذ 3 ساعات', 'c' => 'gov-gold'],
                        ['m' => 'مركز عين الكبيرة', 'a' => 'إرسال تقرير الميزانية السنوي', 't' => 'منذ يوم', 'c' => 'emerald'],
                    ] as $act)
                        <div class="flex items-start gap-4">
                            <div class="w-2 h-12 rounded-full @if($act['c'] == 'gov-green') bg-gov-green @elseif($act['c'] == 'gov-gold') bg-gov-gold @else bg-emerald-600 @endif opacity-20 group-hover:opacity-100 transition-opacity"></div>
                            <div>
                                <h4 class="text-xs font-black text-slate-900">{{ $act['m'] }}</h4>
                                <p class="text-[11px] font-medium text-slate-500 mt-1">{{ $act['a'] }}</p>
                                <p class="text-[9px] font-black text-slate-400 uppercase mt-2">{{ $act['t'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="w-full py-4 mt-8 bg-slate-50 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:bg-gov-green hover:text-white rounded-2xl transition-all">عرض التقرير الكامل</button>
            </div>
        </div>

        <!-- Bottom Section: Institutes Overview -->
        <div class="space-y-8 pb-12">
            <div class="flex items-center justify-between px-4">
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">متابعة أداء المعاهد (INSFP)</h3>
                <div class="flex gap-4">
                    <button class="px-6 py-2 bg-white border border-slate-100 rounded-xl text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-gov-green transition-all">تصدير بيانات الولاية</button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">
                @foreach([
                    ['name' => 'INSFP سطيف 1', 'std' => '1,200', 'rate' => 92, 'color' => 'gov-green'],
                    ['name' => 'INSFP سطيف 2', 'std' => '850', 'rate' => 88, 'color' => 'gov-gold'],
                    ['name' => 'INSFP العلمة', 'std' => '940', 'rate' => 95, 'color' => 'emerald'],
                    ['name' => 'INSFP بوقاعة', 'std' => '620', 'rate' => 84, 'color' => 'gov-green'],
                ] as $ins)
                    <div class="bg-white rounded-[40px] p-8 border border-slate-100 shadow-sm hover:shadow-2xl transition-all group overflow-hidden relative">
                        <div class="relative z-10">
                            <h4 class="text-lg font-black text-slate-900 mb-4">{{ $ins['name'] }}</h4>
                            <div class="flex justify-between text-[10px] font-black uppercase mb-2">
                                <span class="text-slate-400">نسبة النجاح</span>
                                <span class="text-gov-green">{{ $ins['rate'] }}%</span>
                            </div>
                            <div class="w-full h-1.5 bg-slate-50 rounded-full overflow-hidden mb-6">
                                <div class="h-full bg-gov-green rounded-full" style="width: {{ $ins['rate'] }}%"></div>
                            </div>
                            <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                                <div class="flex flex-col">
                                    <span class="text-[9px] font-black text-slate-400 uppercase">المتربصين</span>
                                    <span class="text-sm font-black text-slate-900">{{ $ins['std'] }}</span>
                                </div>
                                <button class="w-8 h-8 rounded-lg bg-slate-50 text-slate-400 flex items-center justify-center hover:bg-gov-green hover:text-white transition-all"><i data-lucide="eye" class="w-4 h-4"></i></button>
                            </div>
                        </div>
                        <i data-lucide="building" class="absolute -bottom-6 -left-6 w-32 h-32 text-slate-50 -rotate-12 group-hover:text-gov-green/5 transition-colors"></i>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

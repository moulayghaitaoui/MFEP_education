@extends('layouts.app')

@section('title', 'مركز التحكم الوطني - الإدارة العليا')

@section('content')
    <!-- Dashboard Header -->
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-10">
        <div class="space-y-2">
            <div class="flex items-center gap-3">
                <span class="px-3 py-1 bg-blue-600 text-white text-[10px] font-black rounded-lg uppercase tracking-widest shadow-lg shadow-blue-500/30">Live Control</span>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter">نظرة عامة على القطاع الوطني</h1>
            </div>
            <p class="text-slate-500 font-medium text-lg">مراقبة حية لأداء 48 مديرية ولائية وأكثر من 1200 مؤسسة تكوينية.</p>
        </div>
        
        <div class="flex items-center gap-3 bg-white p-2 rounded-2xl border border-slate-200 shadow-sm">
            <button class="px-5 py-2.5 rounded-xl text-sm font-bold text-slate-600 hover:bg-slate-50 transition-all flex items-center gap-2">
                <i data-lucide="calendar" class="w-4 h-4"></i>
                آخر 30 يوم
            </button>
            <button class="bg-slate-900 text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-xl shadow-slate-900/20 hover:bg-slate-800 transition-all flex items-center gap-2">
                <i data-lucide="download-cloud" class="w-4 h-4"></i>
                تحميل التقرير الوطني
            </button>
        </div>
    </div>

    <!-- Stats Grid (Premium Style) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
        @foreach([
            ['label' => 'إجمالي المتربصين', 'value' => '642,850', 'change' => '+12.4%', 'icon' => 'graduation-cap', 'color' => 'blue'],
            ['label' => 'المديريات المتصلة', 'value' => '48/48', 'change' => '100%', 'icon' => 'server', 'color' => 'emerald'],
            ['label' => 'الشهادات الممنوحة', 'value' => '124,500', 'change' => '+5.2%', 'icon' => 'award', 'color' => 'amber'],
            ['label' => 'طلبات الدعم التقني', 'value' => '14', 'change' => '-20%', 'icon' => 'life-buoy', 'color' => 'red'],
        ] as $stat)
            <div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm relative overflow-hidden group hover:shadow-2xl hover:-translate-y-1 transition-all duration-500">
                <div @class([
                    'absolute -top-10 -left-10 w-32 h-32 opacity-5 rounded-full',
                    'bg-blue-600' => $stat['color'] == 'blue',
                    'bg-emerald-600' => $stat['color'] == 'emerald',
                    'bg-amber-600' => $stat['color'] == 'amber',
                    'bg-red-600' => $stat['color'] == 'red',
                ])></div>
                
                <div class="flex items-center justify-between mb-6 relative z-10">
                    <div @class([
                        'w-14 h-14 rounded-2xl flex items-center justify-center shadow-inner',
                        'bg-blue-50 text-blue-600' => $stat['color'] == 'blue',
                        'bg-emerald-50 text-emerald-600' => $stat['color'] == 'emerald',
                        'bg-amber-50 text-amber-600' => $stat['color'] == 'amber',
                        'bg-red-50 text-red-600' => $stat['color'] == 'red',
                    ])>
                        <i data-lucide="{{ $stat['icon'] }}" class="w-7 h-7"></i>
                    </div>
                    <span @class([
                        'text-xs font-black px-2 py-1 rounded-lg',
                        'bg-emerald-100 text-emerald-700' => str_contains($stat['change'], '+') || $stat['change'] == '100%',
                        'bg-red-100 text-red-700' => str_contains($stat['change'], '-'),
                    ])>
                        {{ $stat['change'] }}
                    </span>
                </div>
                
                <h3 class="text-4xl font-black text-slate-900 tracking-tighter mb-1">{{ $stat['value'] }}</h3>
                <p class="text-sm font-bold text-slate-400 uppercase tracking-widest">{{ $stat['label'] }}</p>
            </div>
        @endforeach
    </div>

    <!-- Main Analytics Section -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-10">
        <!-- National Performance Map/Chart -->
        <div class="xl:col-span-2 space-y-10">
            <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm relative overflow-hidden">
                <div class="flex items-center justify-between mb-10">
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight">تحليل النشاط الوطني</h3>
                        <p class="text-slate-400 font-bold text-xs uppercase mt-1">إحصائيات التسجيل والنتائج حسب الولاية</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="w-10 h-10 rounded-xl border border-slate-100 flex items-center justify-center text-slate-400 hover:bg-slate-50 transition-all">
                            <i data-lucide="maximize-2" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Chart Placeholder -->
                <div class="h-[450px] w-full bg-slate-50 rounded-[32px] border border-dashed border-slate-200 flex flex-col items-center justify-center text-slate-300 gap-6 relative group">
                    <div class="absolute inset-0 flex items-end justify-between px-20 pb-10 opacity-20 grayscale group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-700">
                        @for($i=0; $i<12; $i++)
                            <div class="w-12 bg-blue-600 rounded-t-2xl" style="height: {{ rand(30, 90) }}%"></div>
                            <div class="w-12 bg-slate-200 rounded-t-2xl" style="height: {{ rand(20, 70) }}%"></div>
                        @endfor
                    </div>
                    <i data-lucide="bar-chart-3" class="w-20 h-20 opacity-20"></i>
                    <p class="text-lg font-black uppercase tracking-widest relative z-10">Analytics Engine Active</p>
                </div>
            </div>

            <!-- Recent System logs / Events Table -->
            <div class="bg-white rounded-[40px] overflow-hidden border border-slate-100 shadow-sm">
                <div class="p-10 border-b border-slate-50 flex items-center justify-between">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight">سجل مراقبة النظام</h3>
                    <button class="text-blue-600 font-black text-xs uppercase tracking-widest hover:underline">عرض السجل الكامل</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-right">
                        <thead class="bg-slate-50/50 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">
                            <tr>
                                <th class="px-10 py-5">الحدث</th>
                                <th class="px-10 py-5">المصدر</th>
                                <th class="px-10 py-5">الوقت</th>
                                <th class="px-10 py-5">الحالة</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach([
                                ['event' => 'تحديث قاعدة بيانات المعاهد', 'source' => 'Server Core', 'time' => '10:45 AM', 'status' => 'Success'],
                                ['event' => 'فشل مزامنة مديرية بشار', 'source' => 'Cloud Sync', 'time' => '09:20 AM', 'status' => 'Failed'],
                                ['event' => 'إصدار شهادات مجمعة (الدفعة 4)', 'source' => 'Certification API', 'time' => '08:15 AM', 'status' => 'Processing'],
                                ['event' => 'نسخ احتياطي مجدول', 'source' => 'Backup Agent', 'time' => '02:00 AM', 'status' => 'Success'],
                            ] as $log)
                                <tr class="hover:bg-slate-50/50 transition-all cursor-pointer group">
                                    <td class="px-10 py-6 font-bold text-slate-800 text-sm">{{ $log['event'] }}</td>
                                    <td class="px-10 py-6 text-xs font-bold text-slate-500">{{ $log['source'] }}</td>
                                    <td class="px-10 py-6 text-xs font-bold text-slate-500">{{ $log['time'] }}</td>
                                    <td class="px-10 py-6">
                                        <span @class([
                                            'px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-wider',
                                            'bg-emerald-100 text-emerald-700' => $log['status'] == 'Success',
                                            'bg-red-100 text-red-700' => $log['status'] == 'Failed',
                                            'bg-blue-100 text-blue-700' => $log['status'] == 'Processing',
                                        ])>
                                            {{ $log['status'] }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar Components (Timeline & Status) -->
        <div class="space-y-10">
            <!-- Global Health Status -->
            <div class="bg-slate-900 rounded-[40px] p-10 text-white shadow-2xl relative overflow-hidden shadow-slate-900/40">
                <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-blue-600/20 rounded-full blur-3xl"></div>
                <h3 class="text-xl font-black mb-8 relative z-10 flex items-center gap-3">
                    <span class="w-3 h-3 bg-emerald-500 rounded-full animate-ping"></span>
                    حالة النظام العالمي
                </h3>
                
                <div class="space-y-8 relative z-10">
                    @foreach([
                        ['label' => 'Cloud Infrastructure', 'status' => 'Operational', 'percent' => 99.9],
                        ['label' => 'Database Cluster', 'status' => 'Healthy', 'percent' => 100],
                        ['label' => 'Notification Engine', 'status' => 'Load: High', 'percent' => 84],
                        ['label' => 'API Gateway', 'status' => 'Operational', 'percent' => 99.7],
                    ] as $service)
                        <div class="space-y-2">
                            <div class="flex justify-between items-center text-xs font-bold">
                                <span class="text-slate-400 uppercase tracking-widest">{{ $service['label'] }}</span>
                                <span @class([
                                    'text-emerald-400' => $service['percent'] > 95,
                                    'text-amber-400' => $service['percent'] <= 95,
                                ])>{{ $service['status'] }}</span>
                            </div>
                            <div class="w-full h-1.5 bg-white/10 rounded-full overflow-hidden">
                                <div @class([
                                    'h-full rounded-full transition-all duration-1000',
                                    'bg-emerald-500' => $service['percent'] > 95,
                                    'bg-amber-500' => $service['percent'] <= 95,
                                ]) style="width: {{ $service['percent'] }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <button class="w-full mt-10 py-4 bg-white/10 hover:bg-white/20 border border-white/10 rounded-2xl text-xs font-black uppercase tracking-[0.2em] transition-all">
                    System Full Status
                </button>
            </div>

            <!-- Activity Timeline -->
            <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm">
                <h3 class="text-2xl font-black text-slate-900 tracking-tight mb-8">النشاط الأخير</h3>
                <div class="space-y-10 relative before:absolute before:right-4 before:top-2 before:bottom-2 before:w-[1px] before:bg-slate-100">
                    @foreach([
                        ['user' => 'مديرية تلمسان', 'action' => 'إضافة معهد جديد', 'time' => '10 دقائق', 'icon' => 'plus-circle', 'color' => 'blue'],
                        ['user' => 'النظام الآلي', 'action' => 'توليد التقارير الشهرية', 'time' => '45 دقيقة', 'icon' => 'file-text', 'color' => 'purple'],
                        ['user' => 'أمين (Super)', 'action' => 'تعديل صلاحيات المديريات', 'time' => 'ساعتين', 'icon' => 'shield', 'color' => 'slate'],
                        ['user' => 'معهد ورقلة', 'action' => 'طلب صيانة طارئة', 'time' => '4 ساعات', 'icon' => 'tool', 'color' => 'amber'],
                    ] as $activity)
                        <div class="relative pr-10">
                            <div @class([
                                'absolute right-0 top-0 w-8 h-8 rounded-full border-4 border-white shadow-sm flex items-center justify-center text-white z-10',
                                'bg-blue-600' => $activity['color'] == 'blue',
                                'bg-purple-600' => $activity['color'] == 'purple',
                                'bg-slate-900' => $activity['color'] == 'slate',
                                'bg-amber-600' => $activity['color'] == 'amber',
                            ])>
                                <i data-lucide="{{ $activity['icon'] }}" class="w-3 h-3"></i>
                            </div>
                            <div>
                                <p class="text-sm font-black text-slate-800">{{ $activity['user'] }}</p>
                                <p class="text-xs font-bold text-slate-500 mt-0.5">{{ $activity['action'] }}</p>
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-tighter mt-1 inline-block">{{ $activity['time'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

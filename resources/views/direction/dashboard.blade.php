@extends('layouts.app')

@section('title', 'لوحة تحكم المديرية الولائية - سطيف')

@section('content')
    <!-- Dashboard Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tighter">مرحباً، مديرية ولاية سطيف</h1>
            <p class="text-slate-500 font-medium mt-1">نظرة عامة على سير التكوين المهني في الولاية اليوم.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <div class="bg-white px-4 py-2 rounded-xl border border-slate-200 shadow-sm flex items-center gap-3">
                <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                <span class="text-xs font-bold text-slate-600">تحديث تلقائي: نشط</span>
            </div>
            <button class="bg-blue-600 text-white px-6 py-3 rounded-2xl font-bold text-sm shadow-xl shadow-blue-500/20 hover:bg-blue-700 transition-all flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                إضافة إعلان ولائي
            </button>
        </div>
    </div>

    <!-- Quick Actions Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 mb-10">
        @foreach([
            ['label' => 'إضافة فوج', 'icon' => 'users-round', 'color' => 'blue'],
            ['label' => 'جدول جديد', 'icon' => 'calendar-plus', 'color' => 'purple'],
            ['label' => 'تسجيل حضور', 'icon' => 'fingerprint', 'color' => 'emerald'],
            ['label' => 'رفع نتائج', 'icon' => 'file-up', 'color' => 'amber'],
            ['label' => 'طلب تقرير', 'icon' => 'file-search', 'color' => 'rose'],
            ['label' => 'مراسلة معهد', 'icon' => 'send', 'color' => 'indigo'],
        ] as $action)
            <button class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all group text-center">
                <div @class([
                    'w-12 h-12 rounded-xl mx-auto mb-3 flex items-center justify-center transition-transform group-hover:scale-110',
                    'bg-blue-50 text-blue-600' => $action['color'] == 'blue',
                    'bg-purple-50 text-purple-600' => $action['color'] == 'purple',
                    'bg-emerald-50 text-emerald-600' => $action['color'] == 'emerald',
                    'bg-amber-50 text-amber-600' => $action['color'] == 'amber',
                    'bg-rose-50 text-rose-600' => $action['color'] == 'rose',
                    'bg-indigo-50 text-indigo-600' => $action['color'] == 'indigo',
                ])>
                    <i data-lucide="{{ $action['icon'] }}" class="w-6 h-6"></i>
                </div>
                <span class="text-xs font-bold text-slate-700">{{ $action['label'] }}</span>
            </button>
        @endforeach
    </div>

    <!-- Stats Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <x-stat-card icon="school" label="المعاهد النشطة" value="42" trend="0" color="blue" />
        <x-stat-card icon="users" label="إجمالي الأفواج" value="156" trend="12" color="purple" />
        <x-stat-card icon="user-check" label="حضور اليوم" value="94%" trend="2.4" color="green" />
        <x-stat-card icon="alert-circle" label="غيابات الأساتذة" value="3" trend="-5" color="orange" />
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Chart Area -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-xl font-black text-slate-900 tracking-tight">إحصائيات الحضور الأسبوعية</h3>
                        <p class="text-xs font-bold text-slate-400 mt-1 uppercase tracking-widest">مقارنة بين حضور المتربصين والأساتذة</p>
                    </div>
                    <select class="bg-slate-50 border-none rounded-xl text-xs font-bold text-slate-500 py-2 pr-8 pl-4">
                        <option>آخر 7 أيام</option>
                        <option>آخر 30 يوم</option>
                    </select>
                </div>
                
                <div class="h-80 w-full bg-slate-50 rounded-2xl border border-dashed border-slate-200 flex flex-col items-center justify-center text-slate-300 gap-4 group">
                    <div class="flex items-end gap-3 h-48">
                        @for($i=0; $i<7; $i++)
                            <div class="w-8 bg-blue-500 rounded-t-lg transition-all duration-500 group-hover:h-{{ rand(20, 48) }}" style="height: {{ rand(40, 90) }}%"></div>
                            <div class="w-8 bg-blue-200 rounded-t-lg transition-all duration-500 group-hover:h-{{ rand(10, 30) }}" style="height: {{ rand(20, 60) }}%"></div>
                        @endfor
                    </div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em]">Attendance Analytics Engine</p>
                </div>
            </div>

            <!-- Institutes List Table -->
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="p-8 border-b border-slate-50 flex items-center justify-between">
                    <h3 class="text-xl font-black text-slate-900 tracking-tight">حالة المعاهد التابعة</h3>
                    <button class="text-blue-600 font-bold text-xs hover:underline">عرض الكل</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-right">
                        <thead class="bg-slate-50/50 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">
                            <tr>
                                <th class="px-8 py-4">المعهد</th>
                                <th class="px-8 py-4">الأفواج</th>
                                <th class="px-8 py-4">الحضور</th>
                                <th class="px-8 py-4">الحالة</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach([
                                ['name' => 'معهد سطيف 01', 'groups' => 12, 'attendance' => '96%', 'status' => 'منتظم'],
                                ['name' => 'مركز العلمة المختلط', 'groups' => 8, 'attendance' => '88%', 'status' => 'منتظم'],
                                ['name' => 'معهد عين الكبيرة', 'groups' => 15, 'attendance' => '92%', 'status' => 'منتظم'],
                                ['name' => 'مركز حمام السخنة', 'groups' => 5, 'attendance' => '75%', 'status' => 'تحذير'],
                            ] as $inst)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-8 py-5 text-sm font-bold text-slate-800">{{ $inst['name'] }}</td>
                                    <td class="px-8 py-5 text-sm text-slate-500 font-medium">{{ $inst['groups'] }} فوج</td>
                                    <td class="px-8 py-5 text-sm font-black text-blue-600">{{ $inst['attendance'] }}</td>
                                    <td class="px-8 py-5">
                                        <span @class([
                                            'px-2 py-1 rounded-lg text-[10px] font-bold',
                                            'bg-emerald-100 text-emerald-700' => $inst['status'] == 'منتظم',
                                            'bg-amber-100 text-amber-700' => $inst['status'] == 'تحذير',
                                        ])>
                                            {{ $inst['status'] }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right Column: Calendar & Notifications -->
        <div class="space-y-8">
            <!-- Calendar UI Placeholder -->
            <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-black text-slate-900">الأجندة الولائية</h3>
                    <div class="flex gap-1">
                        <button class="p-1 hover:bg-slate-100 rounded-lg"><i data-lucide="chevron-right" class="w-4 h-4"></i></button>
                        <button class="p-1 hover:bg-slate-100 rounded-lg"><i data-lucide="chevron-left" class="w-4 h-4"></i></button>
                    </div>
                </div>
                
                <div class="grid grid-cols-7 gap-2 text-center text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4">
                    <span>ح</span><span>ن</span><span>ث</span><span>أ</span><span>خ</span><span>ج</span><span>س</span>
                </div>
                
                <div class="grid grid-cols-7 gap-2">
                    @for($i=1; $i<=31; $i++)
                        <button @class([
                            'h-10 w-full rounded-xl flex items-center justify-center text-xs font-bold transition-all',
                            'bg-blue-600 text-white shadow-lg shadow-blue-500/30' => $i == 13,
                            'hover:bg-slate-50 text-slate-600' => $i != 13,
                            'opacity-20' => $i > 30,
                        ])>
                            {{ $i > 30 ? $i-30 : $i }}
                        </button>
                    @endfor
                </div>
                
                <div class="mt-8 space-y-4">
                    <div class="p-3 bg-blue-50 rounded-2xl border border-blue-100">
                        <p class="text-[10px] font-black text-blue-600 uppercase mb-1">09:00 AM</p>
                        <p class="text-xs font-bold text-slate-800">اجتماع مديري المعاهد</p>
                    </div>
                    <div class="p-3 bg-purple-50 rounded-2xl border border-purple-100">
                        <p class="text-[10px] font-black text-purple-600 uppercase mb-1">02:30 PM</p>
                        <p class="text-xs font-bold text-slate-800">زيارة تفتيشية لمعهد سطيف 02</p>
                    </div>
                </div>
            </div>

            <!-- Recent Notifications -->
            <div class="bg-white rounded-3xl p-8 border border-slate-100 shadow-sm">
                <h3 class="text-lg font-black text-slate-900 mb-6">إشعارات هامة</h3>
                <div class="space-y-6">
                    @foreach([
                        ['title' => 'تعديل جدول', 'desc' => 'معهد القبة قام بتعديل جدول التوقيت للفوج "أ"', 'time' => '10 د'],
                        ['title' => 'غياب جماعي', 'desc' => 'تم تسجيل غياب جماعي في مركز العلمة (فوج الكهرباء)', 'time' => '1 س'],
                        ['title' => 'تقرير جاهز', 'desc' => 'التقرير الشهري لمركز بوقاعة متاح الآن للمراجعة', 'time' => '3 س'],
                    ] as $notif)
                        <div class="flex gap-4 group cursor-pointer">
                            <div class="w-2 h-10 bg-slate-100 group-hover:bg-blue-600 rounded-full transition-colors"></div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">{{ $notif['title'] }}</p>
                                <p class="text-[11px] text-slate-500 mt-0.5">{{ $notif['desc'] }}</p>
                                <span class="text-[9px] font-black text-slate-400 mt-1 block">{{ $notif['time'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="w-full mt-8 py-3 rounded-xl border border-slate-100 text-xs font-bold text-blue-600 hover:bg-blue-50 transition-all">مشاهدة الكل</button>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'التقارير والإحصائيات الولائية - سطيف')

@section('content')
    <div>
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tighter">مركز التقارير الولائي</h1>
                <p class="text-slate-500 font-medium mt-1">توليد وتحليل البيانات الخاصة بولاية سطيف.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <button class="bg-slate-900 text-white px-6 py-3.5 rounded-2xl font-bold text-sm shadow-xl shadow-slate-900/20 hover:bg-slate-800 transition-all flex items-center gap-3">
                    <i data-lucide="file-plus" class="w-5 h-5"></i>
                    تقرير جديد
                </button>
            </div>
        </div>

        <!-- Report Categories -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
            @foreach([
                ['label' => 'تقارير الحضور', 'desc' => 'تحليل يومي، أسبوعي، وشهري', 'icon' => 'fingerprint', 'color' => 'blue'],
                ['label' => 'الأداء البيداغوجي', 'desc' => 'نتائج الأفواج والمتربصين', 'icon' => 'graduation-cap', 'color' => 'purple'],
                ['label' => 'الموارد البشرية', 'desc' => 'إحصائيات الأساتذة والموظفين', 'icon' => 'users', 'color' => 'emerald'],
                ['label' => 'التجهيزات والمرافق', 'desc' => 'حالة الهياكل والقاعات', 'icon' => 'building', 'color' => 'amber'],
            ] as $cat)
                <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all cursor-pointer group">
                    <div @class([
                        'w-14 h-14 rounded-2xl flex items-center justify-center mb-6 transition-transform group-hover:scale-110',
                        'bg-blue-50 text-blue-600' => $cat['color'] == 'blue',
                        'bg-purple-50 text-purple-600' => $cat['color'] == 'purple',
                        'bg-emerald-50 text-emerald-600' => $cat['color'] == 'emerald',
                        'bg-amber-50 text-amber-600' => $cat['color'] == 'amber',
                    ])>
                        <i data-lucide="{{ $cat['icon'] }}" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-lg font-black text-slate-800 mb-2">{{ $cat['label'] }}</h3>
                    <p class="text-xs font-bold text-slate-400">{{ $cat['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- Saved Reports Table -->
        <div class="bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-100 flex items-center justify-between">
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">التقارير المستخرجة مؤخراً</h3>
                <button class="p-2 text-slate-400 hover:text-slate-600"><i data-lucide="search" class="w-5 h-5"></i></button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-right">
                    <thead class="bg-slate-50/50 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">
                        <tr>
                            <th class="px-8 py-5">اسم التقرير</th>
                            <th class="px-8 py-4">النوع</th>
                            <th class="px-8 py-4">تاريخ الاستخراج</th>
                            <th class="px-8 py-4">الحجم</th>
                            <th class="px-8 py-4">بواسطة</th>
                            <th class="px-8 py-4">تحميل</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach([
                            ['name' => 'تقرير الحضور السداسي الأول', 'type' => 'PDF', 'date' => '2024-05-12', 'size' => '2.4 MB', 'user' => 'أحمد (مدير)'],
                            ['name' => 'إحصائيات المتربصين الجدد', 'type' => 'Excel', 'date' => '2024-05-10', 'size' => '1.1 MB', 'user' => 'سارة (بيداغوجيا)'],
                            ['name' => 'نتائج دورة فيفري الولائية', 'type' => 'PDF', 'date' => '2024-05-08', 'size' => '4.8 MB', 'user' => 'أحمد (مدير)'],
                        ] as $report)
                            <tr class="hover:bg-slate-50 transition-all">
                                <td class="px-8 py-6 text-sm font-bold text-slate-800">{{ $report['name'] }}</td>
                                <td class="px-8 py-6">
                                    <span @class([
                                        'px-2 py-0.5 rounded text-[10px] font-black',
                                        'bg-red-50 text-red-600' => $report['type'] == 'PDF',
                                        'bg-emerald-50 text-emerald-600' => $report['type'] == 'Excel',
                                    ])>
                                        {{ $report['type'] }}
                                    </span>
                                </td>
                                <td class="px-8 py-6 text-xs font-bold text-slate-500">{{ $report['date'] }}</td>
                                <td class="px-8 py-6 text-xs font-bold text-slate-500">{{ $report['size'] }}</td>
                                <td class="px-8 py-6 text-xs font-bold text-slate-800">{{ $report['user'] }}</td>
                                <td class="px-8 py-6">
                                    <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-xl transition-all"><i data-lucide="download" class="w-5 h-5"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

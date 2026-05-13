@extends('layouts.app')

@section('title', 'نتائج الاختبارات - مديرية سطيف')

@section('content')
    <div>
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tighter">إدارة نتائج الاختبارات</h1>
                <p class="text-slate-500 font-medium mt-1">متابعة عملية التقييم وإصدار كشوف النقاط.</p>
            </div>
            
            <button class="bg-blue-600 text-white px-8 py-3.5 rounded-2xl font-bold text-sm shadow-xl shadow-blue-500/20 hover:bg-blue-700 transition-all flex items-center gap-3">
                <i data-lucide="file-check" class="w-5 h-5"></i>
                إعلان النتائج النهائية
            </button>
        </div>

        <!-- Exam Batches -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-10">
            @foreach([
                ['period' => 'السداسي الأول 2024', 'status' => 'مكتمل', 'progress' => 100, 'color' => 'emerald'],
                ['period' => 'دورة فيفري 2024', 'status' => 'قيد التصحيح', 'progress' => 65, 'color' => 'blue'],
                ['period' => 'امتحانات استدراكية', 'status' => 'مفتوح', 'progress' => 15, 'color' => 'amber'],
            ] as $batch)
                <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-sm group hover:shadow-md transition-all">
                    <div class="flex items-center justify-between mb-6">
                        <span @class([
                            'px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest',
                            'bg-emerald-100 text-emerald-700' => $batch['color'] == 'emerald',
                            'bg-blue-100 text-blue-700' => $batch['color'] == 'blue',
                            'bg-amber-100 text-amber-700' => $batch['color'] == 'amber',
                        ])>
                            {{ $batch['status'] }}
                        </span>
                        <i data-lucide="layers" class="w-5 h-5 text-slate-200"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-8">{{ $batch['period'] }}</h3>
                    
                    <div class="space-y-3">
                        <div class="flex items-center justify-between text-[10px] font-black uppercase tracking-widest text-slate-400">
                            <span>نسبة إدخال العلامات</span>
                            <span class="text-slate-900">{{ $batch['progress'] }}%</span>
                        </div>
                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                            <div @class([
                                'h-full rounded-full transition-all duration-1000',
                                'bg-emerald-500' => $batch['color'] == 'emerald',
                                'bg-blue-600' => $batch['color'] == 'blue',
                                'bg-amber-500' => $batch['color'] == 'amber',
                            ]) style="width: {{ $batch['progress'] }}%"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Grade Table -->
        <div class="bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">آخر النتائج المرفوعة</h3>
                <div class="flex gap-3">
                    <select class="bg-slate-50 border-none rounded-xl px-6 py-3 text-xs font-bold text-slate-600">
                        <option>كل المعاهد</option>
                    </select>
                    <button class="bg-slate-900 text-white px-6 py-3 rounded-xl text-xs font-black hover:bg-slate-800 transition-all">تحميل الكشوف</button>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-right">
                    <thead class="bg-slate-50/50 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">
                        <tr>
                            <th class="px-8 py-5">المعهد</th>
                            <th class="px-8 py-4">الفوج</th>
                            <th class="px-8 py-4">المادة</th>
                            <th class="px-8 py-4">عدد المتربصين</th>
                            <th class="px-8 py-4">المعدل العام</th>
                            <th class="px-8 py-4">الحالة</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach([
                            ['inst' => 'معهد سطيف 01', 'group' => 'فوج A1', 'subject' => 'الخوارزميات', 'count' => 24, 'avg' => '14.50', 'status' => 'تم التحقق'],
                            ['inst' => 'معهد العلمة', 'group' => 'فوج C2', 'subject' => 'الفيزياء', 'count' => 18, 'avg' => '12.20', 'status' => 'تم التحقق'],
                            ['inst' => 'مركز عين الكبيرة', 'group' => 'فوج M1', 'subject' => 'الميكانيك', 'count' => 20, 'avg' => '13.80', 'status' => 'قيد المراجعة'],
                        ] as $exam)
                            <tr class="hover:bg-slate-50 transition-all">
                                <td class="px-8 py-6 text-sm font-bold text-slate-800">{{ $exam['inst'] }}</td>
                                <td class="px-8 py-6 text-xs font-bold text-slate-500">{{ $exam['group'] }}</td>
                                <td class="px-8 py-6 text-xs font-bold text-slate-500">{{ $exam['subject'] }}</td>
                                <td class="px-8 py-6 text-sm font-black text-slate-800">{{ $exam['count'] }}</td>
                                <td class="px-8 py-6 text-sm font-black text-blue-600">{{ $exam['avg'] }}</td>
                                <td class="px-8 py-6">
                                    <span @class([
                                        'px-2 py-1 rounded-lg text-[10px] font-bold',
                                        'bg-emerald-100 text-emerald-700' => $exam['status'] == 'تم التحقق',
                                        'bg-blue-100 text-blue-700' => $exam['status'] == 'قيد المراجعة',
                                    ])>
                                        {{ $exam['status'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

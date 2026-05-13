@extends('layouts.app')

@section('title', 'متابعة الحضور - مديرية سطيف')

@section('content')
    <div>
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tighter">سجلات الحضور والغياب</h1>
                <p class="text-slate-500 font-medium mt-1">متابعة انضباط المتربصين والأساتذة يومياً.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="bg-white px-6 py-3 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-3">
                    <i data-lucide="calendar" class="w-5 h-5 text-blue-600"></i>
                    <span class="text-sm font-black text-slate-700">{{ now()->translatedFormat('d F Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Attendance Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
            @foreach([
                ['label' => 'نسبة الحضور اليومي', 'value' => '92.5%', 'icon' => 'user-check', 'color' => 'emerald'],
                ['label' => 'إجمالي الغيابات', 'value' => '45', 'icon' => 'user-x', 'color' => 'red'],
                ['label' => 'تأخيرات مسجلة', 'value' => '12', 'icon' => 'clock-alert', 'color' => 'amber'],
            ] as $stat)
                <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-sm flex items-center gap-6">
                    <div @class([
                        'w-16 h-16 rounded-2xl flex items-center justify-center flex-shrink-0',
                        'bg-emerald-50 text-emerald-600' => $stat['color'] == 'emerald',
                        'bg-red-50 text-red-600' => $stat['color'] == 'red',
                        'bg-amber-50 text-amber-600' => $stat['color'] == 'amber',
                    ])>
                        <i data-lucide="{{ $stat['icon'] }}" class="w-8 h-8"></i>
                    </div>
                    <div>
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-1">{{ $stat['label'] }}</p>
                        <p class="text-3xl font-black text-slate-900">{{ $stat['value'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Attendance Table -->
        <div class="bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">قائمة الغيابات المسجلة اليوم</h3>
                <div class="flex flex-wrap gap-3">
                    <input type="text" placeholder="بحث عن اسم..." class="bg-slate-50 border-none rounded-xl px-6 py-3 text-sm font-bold focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
                    <select class="bg-slate-50 border-none rounded-xl px-6 py-3 text-xs font-bold text-slate-600">
                        <option>كل المعاهد</option>
                    </select>
                    <button class="bg-slate-900 text-white px-6 py-3 rounded-xl text-xs font-black hover:bg-slate-800 transition-all">تصدير القائمة</button>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-right">
                    <thead class="bg-slate-50/50 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">
                        <tr>
                            <th class="px-8 py-5">المتربص / الأستاذ</th>
                            <th class="px-8 py-5">الصفة</th>
                            <th class="px-8 py-5">المعهد</th>
                            <th class="px-8 py-5">الفوج / المادة</th>
                            <th class="px-8 py-5">نوع الغياب</th>
                            <th class="px-8 py-5">الإجراء</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach([
                            ['name' => 'محمد أحمد', 'role' => 'متربص', 'institute' => 'معهد سطيف 01', 'group' => 'فوج A1', 'type' => 'غير مبرر'],
                            ['name' => 'سارة بن علي', 'role' => 'أستاذة', 'institute' => 'مركز العلمة', 'group' => 'خوارزميات', 'type' => 'مبرر (طبي)'],
                            ['name' => 'ياسين خليفي', 'role' => 'متربص', 'institute' => 'معهد سطيف 01', 'group' => 'فوج C2', 'type' => 'غير مبرر'],
                            ['name' => 'فاطمة الزهراء', 'role' => 'متربص', 'institute' => 'مركز عين الكبيرة', 'group' => 'فوج M1', 'type' => 'تأخير (30 د)'],
                        ] as $att)
                            <tr class="hover:bg-slate-50 transition-all">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-xs text-slate-500">{{ mb_substr($att['name'], 0, 1) }}</div>
                                        <span class="text-sm font-bold text-slate-800">{{ $att['name'] }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-xs font-bold text-slate-500">{{ $att['role'] }}</td>
                                <td class="px-8 py-6 text-xs font-bold text-slate-500">{{ $att['institute'] }}</td>
                                <td class="px-8 py-6 text-xs font-bold text-slate-800">{{ $att['group'] }}</td>
                                <td class="px-8 py-6">
                                    <span @class([
                                        'px-3 py-1 rounded-lg text-[10px] font-black',
                                        'bg-red-100 text-red-700' => str_contains($att['type'], 'غير مبرر'),
                                        'bg-blue-100 text-blue-700' => str_contains($att['type'], 'مبرر'),
                                        'bg-amber-100 text-amber-700' => str_contains($att['type'], 'تأخير'),
                                    ])>
                                        {{ $att['type'] }}
                                    </span>
                                </td>
                                <td class="px-8 py-6">
                                    <button class="p-2 text-slate-400 hover:text-blue-600 transition-all"><i data-lucide="info" class="w-5 h-5"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

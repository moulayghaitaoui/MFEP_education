@extends('layouts.app')

@section('title', 'نتائج الاختبارات - فضاء الأستاذ')

@section('content')
    <div>
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter">نتائج اختبارات دوراتي</h1>
                <p class="text-slate-500 font-medium text-lg">تحليل أداء الطلاب وتصدير كشوف النقاط النهائية.</p>
            </div>
            
            <button class="bg-indigo-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-indigo-500/20 hover:bg-indigo-700 transition-all flex items-center gap-3">
                <i data-lucide="award" class="w-5 h-5"></i>
                اعتماد النتائج النهائية
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Analytics Cards -->
            @foreach([
                ['label' => 'نسبة النجاح العامة', 'value' => '84%', 'icon' => 'check-circle', 'color' => 'emerald'],
                ['label' => 'أعلى معدل مسجل', 'value' => '19.5/20', 'icon' => 'trending-up', 'color' => 'indigo'],
                ['label' => 'طلاب لم يجتازوا', 'value' => '12', 'icon' => 'user-minus', 'color' => 'rose'],
            ] as $ana)
                <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-sm flex items-center gap-6">
                    <div @class([
                        'w-14 h-14 rounded-2xl flex items-center justify-center',
                        'bg-emerald-50 text-emerald-600' => $ana['color'] == 'emerald',
                        'bg-indigo-50 text-indigo-600' => $ana['color'] == 'indigo',
                        'bg-rose-50 text-rose-600' => $ana['color'] == 'rose',
                    ])>
                        <i data-lucide="{{ $ana['icon'] }}" class="w-7 h-7"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">{{ $ana['label'] }}</p>
                        <p class="text-2xl font-black text-slate-900">{{ $ana['value'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Detailed Results Table -->
        <div class="bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden mt-10">
            <div class="p-10 border-b border-slate-100 flex justify-between items-center bg-slate-50/20">
                <h3 class="text-xl font-black text-slate-900 tracking-tight">تفاصيل علامات الطلاب</h3>
                <div class="flex gap-2">
                    <button class="p-3 bg-white border border-slate-200 rounded-xl text-slate-400 hover:text-indigo-600 transition-all"><i data-lucide="filter" class="w-5 h-5"></i></button>
                    <button class="p-3 bg-white border border-slate-200 rounded-xl text-slate-400 hover:text-indigo-600 transition-all"><i data-lucide="download" class="w-5 h-5"></i></button>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-right">
                    <thead class="bg-slate-50/50 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">
                        <tr>
                            <th class="px-10 py-5">الطالب</th>
                            <th class="px-10 py-5">الاختبار</th>
                            <th class="px-10 py-5">العلامة</th>
                            <th class="px-10 py-5">التقدير</th>
                            <th class="px-10 py-5">تاريخ الإجراء</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach([
                            ['name' => 'أحمد بن خليفة', 'exam' => 'أساسيات JS', 'score' => '18.5', 'grade' => 'ممتاز'],
                            ['name' => 'ليلى منصوري', 'exam' => 'أساسيات JS', 'score' => '14.0', 'grade' => 'جيد'],
                            ['name' => 'كريم زدام', 'exam' => 'أساسيات JS', 'score' => '19.0', 'grade' => 'ممتاز'],
                            ['name' => 'صوفيا رزيق', 'exam' => 'أساسيات JS', 'score' => '09.5', 'grade' => 'ضعيف'],
                        ] as $res)
                            <tr class="hover:bg-slate-50 transition-all">
                                <td class="px-10 py-6 font-bold text-slate-800">{{ $res['name'] }}</td>
                                <td class="px-10 py-6 text-xs font-bold text-slate-500">{{ $res['exam'] }}</td>
                                <td class="px-10 py-6 text-sm font-black text-indigo-600">{{ $res['score'] }}/20</td>
                                <td class="px-10 py-6">
                                    <span @class([
                                        'px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest',
                                        'bg-emerald-100 text-emerald-700' => $res['grade'] == 'ممتاز',
                                        'bg-blue-100 text-blue-700' => $res['grade'] == 'جيد',
                                        'bg-red-100 text-red-700' => $res['grade'] == 'ضعيف',
                                    ])>
                                        {{ $res['grade'] }}
                                    </span>
                                </td>
                                <td class="px-10 py-6 text-xs font-bold text-slate-400">2024-05-12</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

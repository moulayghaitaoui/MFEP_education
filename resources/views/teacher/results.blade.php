@extends('layouts.teacher')

@section('title', 'النتائج والتقييم - فضاء الأستاذ')

@section('content')
    <div>
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-2">النتائج والتقييمات النهائية</h1>
                <p class="text-slate-500 font-medium text-lg">تحليل أداء الوحدات التكوينية وإصدار كشوف النقاط المعتمدة.</p>
            </div>
            
            <div class="flex gap-4">
                <button class="bg-emerald-500 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-emerald-500/20 hover:bg-emerald-600 transition-all flex items-center gap-3">
                    <i data-lucide="check-square" class="w-5 h-5"></i>
                    اعتماد كافة النتائج
                </button>
                <button class="bg-white text-slate-400 p-4 rounded-2xl border border-slate-200 hover:text-indigo-600 transition-all shadow-sm">
                    <i data-lucide="download" class="w-6 h-6"></i>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Summary Column -->
            <div class="lg:col-span-1 space-y-10">
                <x-teacher-card title="توزيع التقديرات">
                    <div class="space-y-8">
                         <div class="h-64 flex items-end justify-center gap-4 px-4 border-b border-slate-50">
                            @foreach([
                                ['h' => 'h-1/4', 'c' => 'bg-rose-500', 'l' => 'ضعيف'],
                                ['h' => 'h-2/4', 'c' => 'bg-amber-500', 'l' => 'متوسط'],
                                ['h' => 'h-3/4', 'c' => 'bg-indigo-500', 'l' => 'جيد'],
                                ['h' => 'h-full', 'c' => 'bg-emerald-500', 'l' => 'ممتاز'],
                            ] as $bar)
                                <div class="flex-1 flex flex-col items-center">
                                    <div class="w-full {{ $bar['h'] }} {{ $bar['c'] }} rounded-t-xl opacity-80 hover:opacity-100 transition-all"></div>
                                    <span class="text-[9px] font-black text-slate-400 mt-4 uppercase tracking-tighter">{{ $bar['l'] }}</span>
                                </div>
                            @endforeach
                         </div>
                         <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <p class="text-2xl font-black text-slate-900">14.85</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">المعدل العام للمجموعة</p>
                            </div>
                            <div class="text-center border-r border-slate-50">
                                <p class="text-2xl font-black text-emerald-500">92%</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">نسبة النجاح</p>
                            </div>
                         </div>
                    </div>
                </x-teacher-card>

                <x-teacher-card title="أفضل 3 متربصين">
                    <div class="space-y-6">
                        @foreach([
                            ['name' => 'كريم زدام', 'score' => 19.25],
                            ['name' => 'أحمد بن خليفة', 'score' => 18.50],
                            ['name' => 'سارة بلقاسم', 'score' => 17.75],
                        ] as $top)
                            <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-2xl group hover:bg-indigo-600 transition-all cursor-pointer">
                                <div class="w-10 h-10 rounded-xl bg-white flex items-center justify-center text-indigo-600 font-black shadow-sm group-hover:text-indigo-900">
                                    {{ $loop->iteration }}
                                </div>
                                <span class="text-xs font-black text-slate-800 group-hover:text-white transition-colors">{{ $top['name'] }}</span>
                                <span class="mr-auto text-sm font-black text-indigo-600 group-hover:text-indigo-200 transition-colors">{{ $top['score'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </x-teacher-card>
            </div>

            <!-- Detailed Grading Table -->
            <div class="lg:col-span-2">
                <x-teacher-card padding="p-0">
                    <div class="p-8 border-b border-slate-50 flex items-center justify-between">
                         <h3 class="text-xl font-black text-slate-900 tracking-tight">كشف نقاط الاختبار الأخير (Laravel MVC)</h3>
                         <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">42 مشاركاً</span>
                    </div>
                    <x-teacher-table :headers="['المتربص', 'الاختبار', 'العلامة', 'التقدير', 'إجراءات']">
                        @foreach([
                            ['name' => 'أحمد منصوري', 'exam' => 'اختبار الوحدة 4', 'score' => 18.0, 'grade' => 'ممتاز'],
                            ['name' => 'ليلى كمال', 'exam' => 'اختبار الوحدة 4', 'score' => 14.5, 'grade' => 'جيد'],
                            ['name' => 'سليم بن محمد', 'exam' => 'اختبار الوحدة 4', 'score' => 11.0, 'grade' => 'متوسط'],
                            ['name' => 'صوفيا بوزيد', 'exam' => 'اختبار الوحدة 4', 'score' => 09.5, 'grade' => 'ضعيف'],
                            ['name' => 'كريم بن خليفة', 'exam' => 'اختبار الوحدة 4', 'score' => 16.0, 'grade' => 'جيد جداً'],
                        ] as $res)
                            <tr class="hover:bg-slate-50/50 transition-all group">
                                <td class="px-8 py-6 font-black text-sm text-slate-800">{{ $res['name'] }}</td>
                                <td class="px-8 py-6 text-[10px] font-bold text-slate-400 uppercase tracking-tight">{{ $res['exam'] }}</td>
                                <td class="px-8 py-6">
                                    <span @class([
                                        'text-lg font-black',
                                        'text-emerald-600' => $res['score'] >= 15,
                                        'text-indigo-600' => $res['score'] >= 10 && $res['score'] < 15,
                                        'text-rose-600' => $res['score'] < 10,
                                    ])>{{ $res['score'] }}</span>
                                    <span class="text-[10px] font-bold text-slate-300">/20</span>
                                </td>
                                <td class="px-8 py-6 text-[10px] font-black uppercase tracking-widest text-slate-500">{{ $res['grade'] }}</td>
                                <td class="px-8 py-6">
                                    <button class="text-xs font-black text-indigo-600 hover:underline">مراجعة</button>
                                </td>
                            </tr>
                        @endforeach
                    </x-teacher-table>
                </x-teacher-card>
            </div>
        </div>
    </div>
@endsection

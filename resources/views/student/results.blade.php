@extends('layouts.student')

@section('title', 'النتائج - مساري الدراسي')

@section('content')
    <div>
        <div class="mb-12 animate-fade-in">
            <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-4">كشف النتائج التحليلي</h1>
            <p class="text-slate-500 font-medium text-lg">متابعة دقيقة لمستوى الأداء الأكاديمي في جميع الوحدات التكوينية.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Analytics Column -->
            <div class="lg:col-span-1 space-y-8">
                <x-student-card title="ملخص الأداء">
                    <div class="space-y-8">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-xs font-black text-slate-400 uppercase tracking-widest">المعدل التراكمي</span>
                                <span class="text-2xl font-black text-blue-600">16.50/20</span>
                            </div>
                            <x-student-progress value="82.5" color="blue" />
                        </div>
                        
                        <div class="pt-8 border-t border-slate-50 grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <p class="text-xl font-black text-slate-900">12</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">اختبار ناجح</p>
                            </div>
                            <div class="text-center border-r border-slate-50">
                                <p class="text-xl font-black text-rose-500">1</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">إعادة</p>
                            </div>
                        </div>
                    </div>
                </x-student-card>

                <x-student-card title="المهارات المكتسبة">
                    <div class="space-y-6">
                        @foreach(['Backend Development', 'Database Design', 'UI/UX Design', 'API Integration'] as $skill)
                            <div class="flex items-center gap-4">
                                <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                                <span class="text-xs font-black text-slate-700 uppercase tracking-tight">{{ $skill }}</span>
                                <span class="mr-auto text-[10px] font-black text-emerald-500">إتقان</span>
                            </div>
                        @endforeach
                    </div>
                </x-student-card>
            </div>

            <!-- Detailed Results Table -->
            <div class="lg:col-span-2">
                <x-student-card padding="p-0">
                    <div class="p-8 border-b border-slate-50 flex items-center justify-between bg-slate-50/30">
                        <h3 class="text-xl font-black text-slate-900 tracking-tight">تفاصيل علامات الوحدات</h3>
                        <button class="text-xs font-black text-blue-600 uppercase tracking-widest hover:underline">تحميل كشف النقاط (PDF)</button>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-right">
                            <thead class="bg-slate-50/50 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">
                                <tr>
                                    <th class="px-8 py-5">الوحدة التكوينية</th>
                                    <th class="px-8 py-5">العلامة</th>
                                    <th class="px-8 py-5">الحالة</th>
                                    <th class="px-8 py-5">التاريخ</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @foreach([
                                    ['title' => 'تطوير الويب باستخدام Laravel', 'score' => '18.0', 'status' => 'pass'],
                                    ['title' => 'قواعد البيانات SQL المتقدمة', 'score' => '15.5', 'status' => 'pass'],
                                    ['title' => 'تصميم واجهات المستخدم UI/UX', 'score' => '19.0', 'status' => 'pass'],
                                    ['title' => 'أمن المعلومات والشبكات', 'score' => '09.0', 'status' => 'fail'],
                                ] as $res)
                                    <tr class="hover:bg-slate-50/50 transition-all group">
                                        <td class="px-8 py-6">
                                            <p class="text-sm font-black text-slate-800 group-hover:text-blue-600 transition-colors">{{ $res['title'] }}</p>
                                        </td>
                                        <td class="px-8 py-6">
                                            <span class="text-lg font-black text-slate-900">{{ $res['score'] }}</span>
                                            <span class="text-[10px] font-bold text-slate-300">/20</span>
                                        </td>
                                        <td class="px-8 py-6">
                                            <span @class([
                                                'px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest',
                                                'bg-emerald-100 text-emerald-600' => $res['status'] == 'pass',
                                                'bg-rose-100 text-rose-600' => $res['status'] == 'fail',
                                            ])>
                                                {{ $res['status'] == 'pass' ? 'ناجح' : 'راسب' }}
                                            </span>
                                        </td>
                                        <td class="px-8 py-6 text-xs font-bold text-slate-400 uppercase">12 ماي 2024</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-student-card>
            </div>
        </div>
    </div>
@endsection

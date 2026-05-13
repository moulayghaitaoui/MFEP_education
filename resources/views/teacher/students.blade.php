@extends('layouts.teacher')

@section('title', 'متابعة المتربصين - فضاء الأستاذ')

@section('content')
    <div>
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-2">إدارة المتربصين ومتابعة الأداء</h1>
                <p class="text-slate-500 font-medium text-lg">راقب تقدم طلابك، حلل نقاط الضعف، وقدم الدعم اللازم.</p>
            </div>
            
            <div class="flex gap-4">
                <div class="relative">
                    <i data-lucide="search" class="w-4 h-4 absolute right-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" placeholder="بحث باسم المتربص..." class="bg-white border border-slate-200 rounded-2xl pr-12 pl-6 py-4 text-xs font-bold w-72 shadow-sm focus:ring-4 focus:ring-indigo-600/10 transition-all outline-none">
                </div>
                <button class="bg-white text-slate-400 p-4 rounded-2xl border border-slate-200 hover:text-indigo-600 transition-all shadow-sm">
                    <i data-lucide="filter" class="w-6 h-6"></i>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-4 gap-12">
            <!-- Sidebar: Cohorts & Groups -->
            <div class="xl:col-span-1 space-y-8">
                <x-teacher-card title="الأفواج الدراسية">
                    <div class="space-y-3">
                        @foreach([
                            ['name' => 'فوج A1 (صباحي)', 'count' => 24, 'active' => true],
                            ['name' => 'فوج B2 (مسائي)', 'count' => 18, 'active' => false],
                            ['name' => 'فوج C1 (نهاية الأسبوع)', 'count' => 32, 'active' => false],
                        ] as $group)
                            <button @class([
                                'w-full p-5 rounded-2xl border flex items-center justify-between group transition-all',
                                'bg-indigo-600 border-indigo-600 text-white shadow-xl shadow-indigo-600/20' => $group['active'],
                                'bg-white border-slate-100 text-slate-500 hover:bg-slate-50 hover:border-slate-200' => !$group['active'],
                            ])>
                                <div class="flex items-center gap-4">
                                    <i data-lucide="users" class="w-5 h-5"></i>
                                    <span class="text-xs font-black">{{ $group['name'] }}</span>
                                </div>
                                <span @class([
                                    'px-2 py-0.5 rounded-lg text-[9px] font-black',
                                    'bg-white/20 text-white' => $group['active'],
                                    'bg-slate-100 text-slate-500' => !$group['active'],
                                ])>{{ $group['count'] }}</span>
                            </button>
                        @endforeach
                    </div>
                </x-teacher-card>

                <x-teacher-card title="إحصائيات المجموعة">
                    <div class="space-y-6">
                         @foreach([
                            ['label' => 'نسبة الحضور', 'value' => '94%', 'color' => 'emerald'],
                            ['label' => 'التقدم في الدروس', 'value' => '62%', 'color' => 'blue'],
                            ['label' => 'متوسط النقاط', 'value' => '15.4', 'color' => 'indigo'],
                         ] as $stat)
                            <div>
                                <div class="flex justify-between text-[10px] font-black uppercase tracking-widest mb-2">
                                    <span class="text-slate-400">{{ $stat['label'] }}</span>
                                    <span class="text-slate-900">{{ $stat['value'] }}</span>
                                </div>
                                <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                    <div @class([
                                        'h-full rounded-full',
                                        'bg-emerald-500' => $stat['color'] == 'emerald',
                                        'bg-blue-600' => $stat['color'] == 'blue',
                                        'bg-indigo-600' => $stat['color'] == 'indigo',
                                    ]) style="width: {{ $stat['value'] == '15.4' ? '77%' : $stat['value'] }}"></div>
                                </div>
                            </div>
                         @endforeach
                    </div>
                </x-teacher-card>
            </div>

            <!-- Students List -->
            <div class="xl:col-span-3">
                <x-teacher-card padding="p-0">
                    <x-teacher-table :headers="['المتربص', 'نسبة التقدم', 'المعدل', 'آخر نشاط', 'الحالة', 'إجراءات']">
                        @foreach([
                            ['name' => 'أحمد بن خليفة', 'progress' => 88, 'avg' => 17.5, 'activity' => 'منذ ساعة', 'status' => 'Excelent'],
                            ['name' => 'سارة منصوري', 'progress' => 45, 'avg' => 12.0, 'activity' => 'منذ يومين', 'status' => 'Average'],
                            ['name' => 'كريم زدام', 'progress' => 92, 'avg' => 19.0, 'activity' => 'نشط الآن', 'status' => 'Excelent'],
                            ['name' => 'ليلى بلقاسم', 'progress' => 12, 'avg' => 08.5, 'activity' => 'منذ أسبوع', 'status' => 'Warning'],
                            ['name' => 'محمد حمادي', 'progress' => 65, 'avg' => 14.5, 'activity' => 'منذ 3 ساعات', 'status' => 'Average'],
                        ] as $student)
                            <tr class="hover:bg-slate-50/50 transition-all group">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-black text-[10px] text-slate-500 uppercase">
                                            {{ substr($student['name'], 0, 1) }}
                                        </div>
                                        <span class="text-sm font-black text-slate-800">{{ $student['name'] }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="flex-1 h-1 bg-slate-100 rounded-full overflow-hidden min-w-[60px]">
                                            <div class="h-full bg-indigo-600" style="width: {{ $student['progress'] }}%"></div>
                                        </div>
                                        <span class="text-[10px] font-black text-slate-900">{{ $student['progress'] }}%</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-sm font-black text-indigo-600">{{ $student['avg'] }}</td>
                                <td class="px-8 py-6 text-[10px] font-bold text-slate-400 uppercase tracking-tight">{{ $student['activity'] }}</td>
                                <td class="px-8 py-6">
                                    <span @class([
                                        'px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest',
                                        'bg-emerald-100 text-emerald-600' => $student['status'] == 'Excelent',
                                        'bg-blue-100 text-blue-600' => $student['status'] == 'Average',
                                        'bg-rose-100 text-rose-600' => $student['status'] == 'Warning',
                                    ])>{{ $student['status'] }}</span>
                                </td>
                                <td class="px-8 py-6">
                                     <div class="flex gap-2">
                                        <button class="p-2.5 bg-slate-50 text-slate-400 rounded-xl hover:text-indigo-600 transition-all"><i data-lucide="mail" class="w-4 h-4"></i></button>
                                        <button class="p-2.5 bg-slate-50 text-slate-400 rounded-xl hover:text-indigo-600 transition-all"><i data-lucide="bar-chart-2" class="w-4 h-4"></i></button>
                                     </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-teacher-table>
                </x-teacher-card>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'التقارير والإحصائيات الوطنية - الإدارة العليا')

@section('content')
    <div x-data="{ activeTab: 'national' }">
        <!-- Header -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter">مركز البيانات الوطني</h1>
                <p class="text-slate-500 font-medium mt-2">استخراج وتحليل البيانات عبر كافة المستويات التنظيمية.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <button class="bg-blue-600 text-white px-8 py-3.5 rounded-2xl font-bold text-sm shadow-xl shadow-blue-500/20 hover:bg-blue-700 transition-all flex items-center gap-3">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                    إنشاء تقرير مخصص
                </button>
            </div>
        </div>

        <!-- Analytics Tabs -->
        <div class="flex items-center gap-2 mb-10 bg-white p-2 rounded-[24px] border border-slate-100 shadow-sm w-fit">
            <button @click="activeTab = 'national'" :class="activeTab === 'national' ? 'bg-slate-900 text-white' : 'text-slate-500 hover:bg-slate-50'" class="px-8 py-3 rounded-[18px] text-sm font-black transition-all duration-300">التقرير الوطني</button>
            <button @click="activeTab = 'regional'" :class="activeTab === 'regional' ? 'bg-slate-900 text-white' : 'text-slate-500 hover:bg-slate-50'" class="px-8 py-3 rounded-[18px] text-sm font-black transition-all duration-300">التحليل الجهوي</button>
            <button @click="activeTab = 'performance'" :class="activeTab === 'performance' ? 'bg-slate-900 text-white' : 'text-slate-500 hover:bg-slate-50'" class="px-8 py-3 rounded-[18px] text-sm font-black transition-all duration-300">مؤشرات الأداء</button>
        </div>

        <!-- Tab Content: National -->
        <div x-show="activeTab === 'national'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-10">
            <!-- Stats Row -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach([
                    ['label' => 'نسبة النجاح الوطنية', 'value' => '82.4%', 'icon' => 'check-check', 'color' => 'emerald'],
                    ['label' => 'معدل التوظيف بعد التكوين', 'value' => '64.8%', 'icon' => 'briefcase', 'color' => 'blue'],
                    ['label' => 'رضا المتربصين', 'value' => '4.2/5', 'icon' => 'star', 'color' => 'amber'],
                ] as $stat)
                    <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-sm flex items-center gap-6 group hover:shadow-xl transition-all">
                        <div @class([
                            'w-16 h-16 rounded-2xl flex items-center justify-center flex-shrink-0 transition-transform group-hover:scale-110',
                            'bg-emerald-50 text-emerald-600' => $stat['color'] == 'emerald',
                            'bg-blue-50 text-blue-600' => $stat['color'] == 'blue',
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

            <!-- Major Chart Area -->
            <div class="bg-white rounded-[40px] border border-slate-100 shadow-sm p-10">
                <div class="flex items-center justify-between mb-10">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight">تطور أعداد المتربصين (2020 - 2024)</h3>
                    <div class="flex items-center gap-4">
                        <span class="flex items-center gap-2 text-xs font-bold text-slate-500">
                            <span class="w-3 h-3 bg-blue-600 rounded-full"></span> ذكور
                        </span>
                        <span class="flex items-center gap-2 text-xs font-bold text-slate-500">
                            <span class="w-3 h-3 bg-purple-500 rounded-full"></span> إناث
                        </span>
                    </div>
                </div>
                
                <div class="h-96 w-full flex items-end justify-between px-10 relative">
                    <!-- Fake Chart Lines -->
                    <div class="absolute inset-x-10 inset-y-0 flex flex-col justify-between pointer-events-none opacity-5">
                        @for($i=0; $i<5; $i++) <div class="w-full h-[1px] bg-slate-900"></div> @endfor
                    </div>
                    
                    @foreach([70, 85, 65, 95, 80, 100, 90, 75, 88, 92, 85, 98] as $val)
                        <div class="w-12 space-y-1 group relative">
                            <div class="h-2 w-full bg-purple-500 rounded-t-lg transition-all duration-500 group-hover:h-4" style="height: {{ $val * 0.4 }}%"></div>
                            <div class="h-2 w-full bg-blue-600 rounded-t-lg transition-all duration-500 group-hover:h-6" style="height: {{ $val * 0.6 }}%"></div>
                            <div class="absolute -top-12 left-1/2 -translate-x-1/2 bg-slate-900 text-white text-[10px] px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap z-20">
                                {{ $val }}k متربص
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-between px-10 mt-6 text-[10px] font-black text-slate-400 uppercase tracking-widest border-t border-slate-50 pt-6">
                    <span>جانفي</span><span>فيفري</span><span>مارس</span><span>أفريل</span><span>ماي</span><span>جوان</span><span>جويلية</span><span>أوت</span><span>سبتمبر</span><span>أكتوبر</span><span>نوفمبر</span><span>ديسمبر</span>
                </div>
            </div>

            <!-- Detailed Table Section -->
            <div class="bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden">
                <div class="p-10 border-b border-slate-100 flex items-center justify-between bg-slate-50/30">
                    <div>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight">ترتيب المديريات حسب الأداء</h3>
                        <p class="text-xs font-bold text-slate-400 mt-1 uppercase tracking-widest">بناءً على المعايير الوطنية المعتمدة</p>
                    </div>
                    <div class="flex gap-3">
                        <button class="w-12 h-12 rounded-2xl bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-all">
                            <i data-lucide="filter" class="w-5 h-5"></i>
                        </button>
                        <button class="w-12 h-12 rounded-2xl bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:bg-slate-50 transition-all">
                            <i data-lucide="download" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>
                
                <table class="w-full text-right">
                    <thead class="bg-slate-50/50 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">
                        <tr>
                            <th class="px-10 py-5">الرتبة</th>
                            <th class="px-10 py-5">المديرية الولائية</th>
                            <th class="px-10 py-5">عدد المعاهد</th>
                            <th class="px-10 py-5">نسبة النجاح</th>
                            <th class="px-10 py-5">الأداء العام</th>
                            <th class="px-10 py-5"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach([
                            ['rank' => 1, 'name' => 'مديرية التكوين المهني - سطيف', 'institutes' => 42, 'success' => '94%', 'score' => 9.2],
                            ['rank' => 2, 'name' => 'مديرية التكوين المهني - وهران', 'institutes' => 38, 'success' => '91%', 'score' => 8.9],
                            ['rank' => 3, 'name' => 'مديرية التكوين المهني - تلمسان', 'institutes' => 35, 'success' => '89%', 'score' => 8.7],
                            ['rank' => 4, 'name' => 'مديرية التكوين المهني - الجزائر', 'institutes' => 65, 'success' => '88%', 'score' => 8.5],
                            ['rank' => 5, 'name' => 'مديرية التكوين المهني - قسنطينة', 'institutes' => 32, 'success' => '86%', 'score' => 8.2],
                        ] as $row)
                            <tr class="hover:bg-slate-50 transition-all group">
                                <td class="px-10 py-6">
                                    <span @class([
                                        'w-8 h-8 rounded-lg flex items-center justify-center text-xs font-black',
                                        'bg-amber-100 text-amber-700' => $row['rank'] == 1,
                                        'bg-slate-100 text-slate-700' => $row['rank'] == 2,
                                        'bg-orange-100 text-orange-700' => $row['rank'] == 3,
                                        'bg-slate-50 text-slate-400' => $row['rank'] > 3,
                                    ])>
                                        {{ $row['rank'] }}
                                    </span>
                                </td>
                                <td class="px-10 py-6 font-bold text-slate-800">{{ $row['name'] }}</td>
                                <td class="px-10 py-6 text-sm font-bold text-slate-500">{{ $row['institutes'] }}</td>
                                <td class="px-10 py-6 text-sm font-bold text-slate-900">{{ $row['success'] }}</td>
                                <td class="px-10 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-24 h-2 bg-slate-100 rounded-full overflow-hidden">
                                            <div class="h-full bg-blue-600 rounded-full" style="width: {{ $row['score'] * 10 }}%"></div>
                                        </div>
                                        <span class="text-xs font-black text-blue-600">{{ $row['score'] }}/10</span>
                                    </div>
                                </td>
                                <td class="px-10 py-6 text-left">
                                    <button class="p-2 text-slate-400 hover:text-blue-600 transition-colors">
                                        <i data-lucide="chevron-left" class="w-5 h-5"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-10 bg-slate-50/50 flex justify-center">
                    <button class="px-10 py-4 bg-white border border-slate-200 rounded-2xl text-xs font-black uppercase tracking-widest text-slate-600 hover:bg-slate-900 hover:text-white hover:border-slate-900 transition-all duration-300">
                        تحميل جدول الأداء الوطني الكامل
                    </button>
                </div>
            </div>
        </div>

        <!-- Placeholder for other tabs -->
        <div x-show="activeTab === 'regional' || activeTab === 'performance'" class="h-96 flex items-center justify-center text-slate-300 bg-white rounded-[40px] border border-dashed border-slate-200">
            <div class="text-center">
                <i data-lucide="layout-grid" class="w-12 h-12 mx-auto mb-4 opacity-20"></i>
                <p class="font-bold text-sm">سيتم تفعيل هذه الواجهة قريباً</p>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'إدارة الأفواج - مديرية سطيف')

@section('content')
    <div x-data="{ view: 'grid', search: '' }">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tighter">إدارة الأفواج التكوينية</h1>
                <p class="text-slate-500 font-medium mt-1">عرض وتسيير كافة الأفواج النشطة في ولاية سطيف.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="bg-white p-1 rounded-xl border border-slate-200 flex">
                    <button @click="view = 'grid'" :class="view === 'grid' ? 'bg-slate-900 text-white' : 'text-slate-400'" class="p-2 rounded-lg transition-all"><i data-lucide="layout-grid" class="w-5 h-5"></i></button>
                    <button @click="view = 'list'" :class="view === 'list' ? 'bg-slate-900 text-white' : 'text-slate-400'" class="p-2 rounded-lg transition-all"><i data-lucide="list" class="w-5 h-5"></i></button>
                </div>
                <button class="bg-blue-600 text-white px-6 py-3 rounded-2xl font-bold text-sm shadow-xl shadow-blue-500/20 hover:bg-blue-700 transition-all flex items-center gap-2">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    إضافة فوج جديد
                </button>
            </div>
        </div>

        <!-- Filters & Search -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm mb-10 flex flex-col lg:flex-row gap-6">
            <div class="flex-1 relative">
                <i data-lucide="search" class="w-5 h-5 text-slate-400 absolute right-4 top-1/2 -translate-y-1/2"></i>
                <input type="text" x-model="search" placeholder="بحث عن فوج، تخصص، أو معهد..." class="w-full bg-slate-50 border-none rounded-2xl pr-12 pl-4 py-4 text-sm font-bold focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">
            </div>
            <div class="flex gap-4">
                <select class="bg-slate-50 border-none rounded-2xl px-6 py-4 text-xs font-bold text-slate-600 focus:ring-4 focus:ring-blue-500/10 transition-all">
                    <option>كل المعاهد</option>
                    <option>معهد سطيف 01</option>
                    <option>معهد العلمة</option>
                </select>
                <select class="bg-slate-50 border-none rounded-2xl px-6 py-4 text-xs font-bold text-slate-600 focus:ring-4 focus:ring-blue-500/10 transition-all">
                    <option>كل التخصصات</option>
                    <option>برمجة</option>
                    <option>كهرباء</option>
                </select>
            </div>
        </div>

        <!-- Groups Grid View -->
        <div x-show="view === 'grid'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['name' => 'فوج المعلوماتية A1', 'specialty' => 'تطوير تطبيقات الويب', 'institute' => 'معهد سطيف 01', 'students' => 24, 'progress' => 65, 'color' => 'blue'],
                ['name' => 'فوج الكهرباء C2', 'specialty' => 'كهرباء صناعية', 'institute' => 'معهد العلمة', 'students' => 18, 'progress' => 40, 'color' => 'amber'],
                ['name' => 'فوج الميكانيك M1', 'specialty' => 'ميكانيك السيارات', 'institute' => 'مركز عين الكبيرة', 'students' => 20, 'progress' => 85, 'color' => 'emerald'],
                ['name' => 'فوج المحاسبة G3', 'specialty' => 'محاسبة وتسيير', 'institute' => 'معهد سطيف 01', 'students' => 30, 'progress' => 25, 'color' => 'purple'],
                ['name' => 'فوج التبريد R1', 'specialty' => 'التبريد والتكييف', 'institute' => 'مركز حمام السخنة', 'students' => 12, 'progress' => 50, 'color' => 'rose'],
                ['name' => 'فوج التصميم D1', 'specialty' => 'تصميم جرافيكي', 'institute' => 'معهد العلمة', 'students' => 22, 'progress' => 70, 'color' => 'indigo'],
            ] as $group)
                <div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group">
                    <div @class([
                        'absolute top-0 left-0 w-2 h-full',
                        'bg-blue-600' => $group['color'] == 'blue',
                        'bg-amber-600' => $group['color'] == 'amber',
                        'bg-emerald-600' => $group['color'] == 'emerald',
                        'bg-purple-600' => $group['color'] == 'purple',
                        'bg-rose-600' => $group['color'] == 'rose',
                        'bg-indigo-600' => $group['color'] == 'indigo',
                    ])></div>
                    
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-black text-slate-900 group-hover:text-blue-600 transition-colors">{{ $group['name'] }}</h3>
                        <button class="p-2 text-slate-300 hover:text-slate-600 hover:bg-slate-50 rounded-xl transition-all"><i data-lucide="more-horizontal" class="w-5 h-5"></i></button>
                    </div>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex items-center gap-3 text-slate-500">
                            <i data-lucide="book" class="w-4 h-4"></i>
                            <span class="text-xs font-bold">{{ $group['specialty'] }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-slate-500">
                            <i data-lucide="building" class="w-4 h-4"></i>
                            <span class="text-xs font-bold">{{ $group['institute'] }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-slate-500">
                            <i data-lucide="users" class="w-4 h-4"></i>
                            <span class="text-xs font-bold">{{ $group['students'] }} متربص</span>
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-[10px] font-black uppercase tracking-widest text-slate-400">
                            <span>التقدم الدراسي</span>
                            <span class="text-slate-900">{{ $group['progress'] }}%</span>
                        </div>
                        <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div @class([
                                'h-full rounded-full transition-all duration-1000',
                                'bg-blue-600' => $group['color'] == 'blue',
                                'bg-amber-600' => $group['color'] == 'amber',
                                'bg-emerald-600' => $group['color'] == 'emerald',
                                'bg-purple-600' => $group['color'] == 'purple',
                                'bg-rose-600' => $group['color'] == 'rose',
                                'bg-indigo-600' => $group['color'] == 'indigo',
                            ]) style="width: {{ $group['progress'] }}%"></div>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-slate-50 flex items-center justify-between">
                        <a href="#" class="text-xs font-black text-blue-600 uppercase tracking-widest hover:underline flex items-center gap-2">
                            عرض التفاصيل
                            <i data-lucide="arrow-left" class="w-3 h-3"></i>
                        </a>
                        <div class="flex -space-x-2 rtl:space-x-reverse">
                            @for($i=0; $i<3; $i++)
                                <div class="w-7 h-7 rounded-full border-2 border-white bg-slate-200 flex items-center justify-center text-[8px] font-bold text-slate-500">U{{ $i }}</div>
                            @endfor
                            <div class="w-7 h-7 rounded-full border-2 border-white bg-blue-50 flex items-center justify-center text-[8px] font-bold text-blue-600">+{{ $group['students'] - 3 }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- List View Placeholder -->
        <div x-show="view === 'list'" class="bg-white rounded-[32px] border border-slate-100 shadow-sm overflow-hidden">
             <table class="w-full text-right">
                <thead class="bg-slate-50/50 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">
                    <tr>
                        <th class="px-8 py-5">الفوج</th>
                        <th class="px-8 py-5">المعهد</th>
                        <th class="px-8 py-5">التخصص</th>
                        <th class="px-8 py-5">المتربصين</th>
                        <th class="px-8 py-5">التقدم</th>
                        <th class="px-8 py-5"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @for($i=0; $i<10; $i++)
                        <tr class="hover:bg-slate-50/50 transition-all">
                            <td class="px-8 py-5 text-sm font-bold text-slate-800">اسم الفوج التجريبي</td>
                            <td class="px-8 py-5 text-xs font-bold text-slate-500">معهد سطيف المركز</td>
                            <td class="px-8 py-5 text-xs font-bold text-slate-500">تقني سامي معلوماتية</td>
                            <td class="px-8 py-5 text-sm font-bold text-slate-900">24</td>
                            <td class="px-8 py-5">
                                <div class="w-24 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-blue-600 rounded-full w-[65%]"></div>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <button class="p-2 text-slate-400 hover:text-blue-600 transition-colors"><i data-lucide="eye" class="w-5 h-5"></i></button>
                            </td>
                        </tr>
                    @endfor
                </tbody>
             </table>
        </div>
    </div>
@endsection

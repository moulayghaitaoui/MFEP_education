@extends('layouts.app')

@section('title', 'قائمة الطلبة - فضاء الأستاذ')

@section('content')
    <div>
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter">طلابي المسجلين</h1>
                <p class="text-slate-500 font-medium text-lg">متابعة الأداء الأكاديمي والنشاط اليومي لطلابك.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <button class="bg-white border border-slate-200 px-6 py-3 rounded-2xl font-bold text-sm text-slate-600 hover:bg-slate-50 transition-all flex items-center gap-2">
                    <i data-lucide="download" class="w-4 h-4"></i>
                    تصدير القائمة
                </button>
                <button class="bg-indigo-600 text-white px-6 py-3 rounded-2xl font-bold text-sm shadow-xl shadow-indigo-500/20 hover:bg-indigo-700 transition-all flex items-center gap-2">
                    <i data-lucide="mail" class="w-4 h-4"></i>
                    مراسلة الكل
                </button>
            </div>
        </div>

        <!-- Student Table -->
        <div class="bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-10 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-6 bg-slate-50/30">
                <div class="flex items-center gap-4">
                    <select class="bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-black text-slate-600 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none">
                        <option>كل الدورات</option>
                        <option>أساسيات تطوير الويب</option>
                    </select>
                    <select class="bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs font-black text-slate-600 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none">
                        <option>كل الأفواج</option>
                    </select>
                </div>
                <div class="relative flex-1 lg:max-w-md">
                    <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute right-4 top-1/2 -translate-y-1/2"></i>
                    <input type="text" placeholder="البحث عن طالب بالاسم أو الرقم..." class="w-full bg-white border border-slate-200 rounded-xl pr-12 pl-4 py-3 text-sm font-bold focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none">
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-right">
                    <thead class="bg-slate-50/50 text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">
                        <tr>
                            <th class="px-10 py-5">الطالب</th>
                            <th class="px-10 py-5">الدورة المسجل بها</th>
                            <th class="px-10 py-5">التقدم</th>
                            <th class="px-10 py-5">معدل الاختبارات</th>
                            <th class="px-10 py-5">آخر ظهور</th>
                            <th class="px-10 py-5">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach([
                            ['name' => 'أحمد بن خليفة', 'course' => 'تطوير الويب', 'progress' => 85, 'avg' => 16.5, 'last_seen' => 'منذ 5 دقائق'],
                            ['name' => 'ليلى منصوري', 'course' => 'تطوير الويب', 'progress' => 42, 'avg' => 14.2, 'last_seen' => 'أمس'],
                            ['name' => 'كريم زدام', 'course' => 'تطوير الويب', 'progress' => 100, 'avg' => 18.0, 'last_seen' => 'منذ ساعتين'],
                            ['name' => 'صوفيا رزيق', 'course' => 'تطوير الويب', 'progress' => 12, 'avg' => 11.5, 'last_seen' => 'منذ 3 أيام'],
                            ['name' => 'عمر بوزيد', 'course' => 'تطوير الويب', 'progress' => 65, 'avg' => 13.8, 'last_seen' => 'منذ ساعة'],
                        ] as $student)
                            <tr class="hover:bg-slate-50/50 transition-all group">
                                <td class="px-10 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center font-black text-xs">{{ mb_substr($student['name'], 0, 1) }}</div>
                                        <span class="text-sm font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">{{ $student['name'] }}</span>
                                    </div>
                                </td>
                                <td class="px-10 py-6 text-xs font-bold text-slate-500">{{ $student['course'] }}</td>
                                <td class="px-10 py-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-20 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                            <div @class([
                                                'h-full rounded-full transition-all duration-1000',
                                                'bg-emerald-500' => $student['progress'] == 100,
                                                'bg-indigo-600' => $student['progress'] < 100,
                                            ]) style="width: {{ $student['progress'] }}%"></div>
                                        </div>
                                        <span class="text-[10px] font-black text-slate-900">{{ $student['progress'] }}%</span>
                                    </div>
                                </td>
                                <td class="px-10 py-6 text-sm font-black text-slate-800">{{ $student['avg'] }}/20</td>
                                <td class="px-10 py-6 text-xs font-bold text-slate-400">{{ $student['last_seen'] }}</td>
                                <td class="px-10 py-6">
                                    <div class="flex items-center gap-2">
                                        <button class="p-2 text-slate-300 hover:text-indigo-600 transition-all"><i data-lucide="message-circle" class="w-5 h-5"></i></button>
                                        <button class="p-2 text-slate-300 hover:text-indigo-600 transition-all"><i data-lucide="eye" class="w-5 h-5"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="p-10 border-t border-slate-50 flex items-center justify-between bg-slate-50/20">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">عرض 5 من أصل 120 طالب</span>
                <div class="flex gap-2">
                    <button class="p-2 w-10 h-10 border border-slate-200 rounded-xl flex items-center justify-center text-slate-400 hover:bg-white transition-all"><i data-lucide="chevron-right" class="w-5 h-5"></i></button>
                    <button class="p-2 w-10 h-10 border border-slate-200 rounded-xl flex items-center justify-center text-slate-400 hover:bg-white transition-all"><i data-lucide="chevron-left" class="w-5 h-5"></i></button>
                </div>
            </div>
        </div>
    </div>
@endsection

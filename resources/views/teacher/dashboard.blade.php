@extends('layouts.teacher')

@section('title', 'لوحة التحكم - فضاء الأستاذ')

@section('content')
    <!-- Welcome Header -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8 mb-12 animate-fade-in">
        <div class="flex items-center gap-8">
            <div class="w-24 h-24 bg-gov-green rounded-[40px] flex items-center justify-center text-white shadow-2xl shadow-gov-green/30 rotate-3">
                <i data-lucide="sparkles" class="w-12 h-12 text-gov-gold"></i>
            </div>
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-2">أهلاً د. سمير بوزيد 👋</h1>
                <p class="text-slate-500 font-medium text-lg">لديك 3 حصص نشطة اليوم و 12 طلباً للمراجعة.</p>
            </div>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('teacher.create-lesson') }}" class="bg-gov-green text-white px-8 py-5 rounded-3xl font-black text-xs uppercase tracking-widest shadow-xl shadow-gov-green/20 hover:bg-gov-green-dark transition-all flex items-center gap-3">
                <i data-lucide="plus" class="w-5 h-5"></i>
                إضافة درس جديد
            </a>
            <button class="bg-white text-slate-900 border border-slate-200 px-8 py-5 rounded-3xl font-black text-xs uppercase tracking-widest hover:bg-slate-50 transition-all flex items-center gap-3">
                <i data-lucide="download" class="w-5 h-5 text-gov-green"></i>
                تصدير التقارير
            </button>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        @foreach([
            ['label' => 'الدروس المنشأة', 'value' => '18', 'icon' => 'book-text', 'color' => 'gov-green'],
            ['label' => 'المتربصين', 'value' => '450', 'icon' => 'users', 'color' => 'gov-gold'],
            ['label' => 'الحصص النشطة', 'value' => '3', 'icon' => 'video', 'color' => 'emerald'],
            ['label' => 'متوسط النتائج', 'value' => '14.8', 'icon' => 'bar-chart-3', 'color' => 'rose'],
        ] as $stat)
            <x-teacher-card class="group hover:-translate-y-1 transition-all duration-300">
                <div class="flex items-center gap-6">
                    <div @class([
                        'w-14 h-14 rounded-2xl flex items-center justify-center transition-transform group-hover:scale-110',
                        'bg-gov-green/10 text-gov-green' => $stat['color'] == 'gov-green',
                        'bg-gov-gold/10 text-gov-gold' => $stat['color'] == 'gov-gold',
                        'bg-emerald-50 text-emerald-600' => $stat['color'] == 'emerald',
                        'bg-rose-50 text-rose-600' => $stat['color'] == 'rose',
                    ])>
                        <i data-lucide="{{ $stat['icon'] }}" class="w-7 h-7"></i>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">{{ $stat['label'] }}</p>
                        <p class="text-2xl font-black text-slate-900">{{ $stat['value'] }}</p>
                    </div>
                </div>
            </x-teacher-card>
        @endforeach
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-12">
        <!-- Main Content (Analytics & Lessons) -->
        <div class="xl:col-span-2 space-y-12">
            <!-- Performance Chart Placeholder -->
            <x-teacher-card title="أداء المتربصين (سداسي 1)">
                <div class="h-80 w-full bg-slate-50/50 rounded-[32px] border border-dashed border-slate-200 flex flex-col items-center justify-center relative group overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-gov-green/5 to-transparent"></div>
                    <i data-lucide="line-chart" class="w-16 h-16 text-slate-200 mb-4 group-hover:text-gov-green/20 transition-colors"></i>
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">سيتم عرض مبيعات الكورسات وأداء الطلاب هنا</p>
                    
                    <!-- Dummy Chart Bars -->
                    <div class="absolute bottom-10 left-10 right-10 flex items-end justify-between gap-2">
                         @foreach([40, 70, 55, 90, 60, 80, 45, 95] as $h)
                            <div class="flex-1 bg-gov-green/10 rounded-t-lg transition-all hover:bg-gov-green cursor-pointer" style="height: {{ $h }}px"></div>
                         @endforeach
                    </div>
                </div>
            </x-teacher-card>

            <!-- Recent Lessons Table -->
            <x-teacher-card title="آخر الدروس المنشورة" subtitle="متابعة حالة النشر والتفاعل">
                <x-teacher-table :headers="['الدرس', 'المادة', 'تاريخ النشر', 'المشاهدات', 'الحالة', 'إجراءات']">
                    @foreach([
                        ['title' => 'بنية MVC في Laravel', 'subject' => 'تطوير الويب', 'date' => '2024-05-12', 'views' => '1.2k', 'status' => 'Published'],
                        ['title' => 'التعامل مع الـ Middlewares', 'subject' => 'أمن المعلومات', 'date' => '2024-05-10', 'views' => '850', 'status' => 'Review'],
                        ['title' => 'تصميم الواجهات الاستجابية', 'subject' => 'UI/UX Design', 'date' => '2024-05-08', 'views' => '2.4k', 'status' => 'Published'],
                    ] as $lesson)
                        <tr class="hover:bg-slate-50/50 transition-all group">
                            <td class="px-8 py-6 font-black text-sm text-slate-800">{{ $lesson['title'] }}</td>
                            <td class="px-8 py-6 text-xs font-bold text-slate-500">{{ $lesson['subject'] }}</td>
                            <td class="px-8 py-6 text-xs font-bold text-slate-400 font-mono">{{ $lesson['date'] }}</td>
                            <td class="px-8 py-6 text-xs font-black text-gov-green">{{ $lesson['views'] }}</td>
                            <td class="px-8 py-6">
                                <span @class([
                                    'px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest',
                                    'bg-emerald-100 text-emerald-600' => $lesson['status'] == 'Published',
                                    'bg-gov-gold/10 text-gov-gold' => $lesson['status'] == 'Review',
                                ])>{{ $lesson['status'] }}</span>
                            </td>
                            <td class="px-8 py-6 flex gap-2">
                                <button class="p-2 bg-slate-100 text-slate-400 rounded-lg hover:text-gov-green transition-all"><i data-lucide="edit-3" class="w-4 h-4"></i></button>
                                <button class="p-2 bg-slate-100 text-slate-400 rounded-lg hover:text-rose-600 transition-all"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </x-teacher-table>
                <div class="mt-8">
                    <a href="{{ route('teacher.lessons') }}" class="text-xs font-black text-gov-green uppercase tracking-widest hover:underline flex items-center gap-2">
                        عرض كافة الدروس
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    </a>
                </div>
            </x-teacher-card>
        </div>

        <!-- Sidebar (Upcoming & Requests) -->
        <div class="space-y-12">
            <!-- Upcoming Sessions -->
            <x-teacher-card title="الحصص القادمة">
                <div class="space-y-6">
                    @foreach([
                        ['title' => 'مراجعة مشروع التخرج', 'time' => '02:00 PM', 'group' => 'فوج A1', 'type' => 'Direct'],
                        ['title' => 'محاضرة أمن الشبكات', 'time' => '04:30 PM', 'group' => 'فوج B2', 'type' => 'Classroom'],
                    ] as $sess)
                        <div class="p-6 bg-slate-50 rounded-3xl border border-transparent hover:border-gov-green/10 hover:bg-white transition-all group">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-10 h-10 bg-gov-green text-white rounded-xl flex items-center justify-center">
                                    <i data-lucide="calendar" class="w-5 h-5 text-gov-gold"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-black text-slate-800 leading-tight group-hover:text-gov-green transition-colors">{{ $sess['title'] }}</p>
                                    <p class="text-[9px] font-bold text-slate-400 uppercase mt-0.5 tracking-widest">{{ $sess['time'] }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] font-black text-slate-500 uppercase">{{ $sess['group'] }}</span>
                                <span class="px-2 py-0.5 bg-gov-green/10 text-gov-green text-[8px] font-black rounded-md uppercase tracking-tighter">{{ $sess['type'] }}</span>
                            </div>
                        </div>
                    @endforeach
                    <a href="{{ route('teacher.sessions') }}" class="w-full mt-4 py-4 bg-slate-100 text-slate-400 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-gov-green hover:text-white transition-all text-center block">
                        إدارة الجدول الزمني
                    </a>
                </div>
            </x-teacher-card>

            <!-- Student Requests -->
            <x-teacher-card title="طلبات المراجعة">
                <div class="space-y-6">
                    @foreach([
                        ['user' => 'أحمد منصوري', 'task' => 'تصميم Database', 'status' => 'Pending'],
                        ['user' => 'سارة كريم', 'task' => 'كود التحقق من الهوية', 'status' => 'Urgent'],
                    ] as $req)
                        <div class="flex items-center gap-4 p-4 hover:bg-slate-50 rounded-2xl transition-all cursor-pointer border border-transparent hover:border-slate-100">
                            <div class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center font-black text-xs text-slate-500">
                                {{ substr($req['user'], 0, 1) }}
                            </div>
                            <div class="flex-1">
                                <p class="text-xs font-black text-slate-800">{{ $req['user'] }}</p>
                                <p class="text-[9px] font-bold text-slate-400 truncate w-32">{{ $req['task'] }}</p>
                            </div>
                            <span @class([
                                'w-2 h-2 rounded-full',
                                'bg-rose-500' => $req['status'] == 'Urgent',
                                'bg-gov-gold' => $req['status'] == 'Pending',
                            ])></span>
                        </div>
                    @endforeach
                </div>
            </x-teacher-card>
        </div>
    </div>
@endsection

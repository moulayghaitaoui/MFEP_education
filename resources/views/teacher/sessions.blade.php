@extends('layouts.teacher')

@section('title', 'إدارة الحصص والجدولة - فضاء الأستاذ')

@section('content')
    <div x-data="{ addSession: false }">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-2">الجدول الزمني والحصص</h1>
                <p class="text-slate-500 font-medium text-lg">نظم حصصك المباشرة والحضورية وتابع التزاماتك اليومية.</p>
            </div>
            
            <button @click="addSession = true" class="bg-indigo-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 transition-all flex items-center gap-3">
                <i data-lucide="plus" class="w-5 h-5"></i>
                حصة جديدة
            </button>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-4 gap-12">
            <!-- Calendar Preview (Conceptual) -->
            <div class="xl:col-span-1 space-y-8">
                <x-teacher-card title="ماي 2024">
                    <div class="grid grid-cols-7 gap-2 text-center text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6">
                        <span>ح</span><span>ن</span><span>ث</span><span>ر</span><span>خ</span><span>ج</span><span>س</span>
                    </div>
                    <div class="grid grid-cols-7 gap-2 text-center">
                        @for($i = 1; $i <= 31; $i++)
                            <button @class([
                                'w-8 h-8 rounded-xl text-xs font-black transition-all flex items-center justify-center',
                                'bg-indigo-600 text-white shadow-lg shadow-indigo-600/30' => $i == 13,
                                'text-slate-700 hover:bg-indigo-50' => $i != 13,
                                'relative' => in_array($i, [15, 22, 28])
                            ])>
                                {{ $i }}
                                @if(in_array($i, [15, 22, 28]))
                                    <span class="absolute bottom-1 left-1/2 -translate-x-1/2 w-1 h-1 bg-indigo-400 rounded-full"></span>
                                @endif
                            </button>
                        @endfor
                    </div>
                </x-teacher-card>

                <x-teacher-card title="فلترة الحصص">
                    <div class="space-y-4">
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl cursor-pointer hover:bg-indigo-50 transition-all">
                            <input type="checkbox" checked class="w-5 h-5 rounded-lg border-none bg-white text-indigo-600 focus:ring-4 focus:ring-indigo-600/10">
                            <span class="text-xs font-black text-slate-700 uppercase tracking-tight">حصص حضورية</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl cursor-pointer hover:bg-indigo-50 transition-all">
                            <input type="checkbox" checked class="w-5 h-5 rounded-lg border-none bg-white text-blue-600 focus:ring-4 focus:ring-blue-600/10">
                            <span class="text-xs font-black text-slate-700 uppercase tracking-tight">بث مباشر (Online)</span>
                        </label>
                    </div>
                </x-teacher-card>
            </div>

            <!-- Sessions List -->
            <div class="xl:col-span-3 space-y-10">
                <div class="flex items-center justify-between px-4">
                    <h3 class="text-xl font-black text-slate-900 tracking-tight">حصص اليوم <span class="text-indigo-600">(13 ماي)</span></h3>
                    <div class="flex gap-2">
                        <button class="p-2 text-slate-400 hover:text-indigo-600 transition-all"><i data-lucide="chevron-right" class="w-6 h-6"></i></button>
                        <button class="p-2 text-slate-400 hover:text-indigo-600 transition-all"><i data-lucide="chevron-left" class="w-6 h-6"></i></button>
                    </div>
                </div>

                <div class="space-y-6">
                    @foreach([
                        ['title' => 'برمجة الواجهات المتقدمة', 'time' => '08:30 - 10:30', 'room' => 'قاعة 12', 'group' => 'فوج A1', 'status' => 'Ongoing'],
                        ['title' => 'مراجعة خوارزميات البحث', 'time' => '11:00 - 01:00', 'room' => 'مختبر 04', 'group' => 'فوج B2', 'status' => 'Pending'],
                        ['title' => 'جلسة أسئلة وأجوبة (مباشر)', 'time' => '03:00 - 04:30', 'room' => 'رابط Zoom', 'group' => 'الجميع', 'status' => 'Upcoming'],
                    ] as $session)
                        <div class="bg-white p-8 rounded-[40px] border border-slate-100 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-8 group hover:shadow-xl hover:border-indigo-100 transition-all duration-500 relative overflow-hidden">
                            @if($session['status'] == 'Ongoing')
                                <div class="absolute top-0 right-0 w-2 h-full bg-indigo-600"></div>
                            @endif
                            
                            <div class="flex items-center gap-8">
                                <div @class([
                                    'w-16 h-16 rounded-[24px] flex items-center justify-center flex-shrink-0',
                                    'bg-indigo-600 text-white shadow-xl shadow-indigo-600/30' => $session['status'] == 'Ongoing',
                                    'bg-slate-50 text-slate-400' => $session['status'] != 'Ongoing'
                                ])>
                                    <i data-lucide="{{ $session['room'] == 'رابط Zoom' ? 'video' : 'building-2' }}" class="w-7 h-7"></i>
                                </div>
                                <div>
                                    <div class="flex items-center gap-3 mb-1">
                                        <h3 class="text-xl font-black text-slate-900 group-hover:text-indigo-600 transition-colors">{{ $session['title'] }}</h3>
                                        @if($session['status'] == 'Ongoing')
                                            <span class="flex h-2 w-2 relative">
                                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex items-center gap-4 text-xs font-bold text-slate-400">
                                        <span class="flex items-center gap-2 font-mono"><i data-lucide="clock" class="w-4 h-4"></i> {{ $session['time'] }}</span>
                                        <span class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> {{ $session['room'] }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-6">
                                <div class="text-left">
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">الفوج المستهدف</p>
                                    <p class="text-sm font-black text-slate-800">{{ $session['group'] }}</p>
                                </div>
                                <div class="flex gap-2">
                                     <button class="px-6 py-3 bg-indigo-600 text-white rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-indigo-700 transition-all">دخول الحصة</button>
                                     <button class="p-3 bg-slate-50 text-slate-400 rounded-xl hover:text-indigo-600 transition-all"><i data-lucide="settings" class="w-5 h-5"></i></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Add Session Modal -->
        <x-teacher-modal name="addSession" title="جدولة حصة جديدة">
            <div class="space-y-8">
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">عنوان الحصة</label>
                        <input type="text" placeholder="مثلاً: مراجعة نهائية" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-600/10 outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">نوع الحصة</label>
                        <select class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 outline-none appearance-none">
                            <option>حضورياً (Classroom)</option>
                            <option>بث مباشر (Online)</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">التاريخ</label>
                        <input type="date" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">الوقت</label>
                        <input type="time" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 outline-none">
                    </div>
                </div>
                <button @click="addSession = false" class="w-full bg-indigo-600 text-white py-5 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 transition-all">تأكيد الجدولة</button>
            </div>
        </x-teacher-modal>
    </div>
@endsection

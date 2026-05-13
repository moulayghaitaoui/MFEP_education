@extends('layouts.app')

@section('title', 'الجداول الزمنية - مديرية سطيف')

@section('content')
    <div x-data="{ currentDay: 'الأحد' }">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tighter">الجداول الزمنية والمواقيت</h1>
                <p class="text-slate-500 font-medium mt-1">متابعة جداول التوقيت للأفواج عبر كافة المعاهد.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <button class="bg-white border border-slate-200 px-6 py-3 rounded-2xl font-bold text-sm text-slate-600 hover:bg-slate-50 transition-all flex items-center gap-2">
                    <i data-lucide="printer" class="w-4 h-4"></i>
                    طباعة الجداول
                </button>
                <button class="bg-blue-600 text-white px-6 py-3 rounded-2xl font-bold text-sm shadow-xl shadow-blue-500/20 hover:bg-blue-700 transition-all flex items-center gap-2">
                    <i data-lucide="upload" class="w-4 h-4"></i>
                    رفع جدول جديد
                </button>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm mb-10">
            <div class="flex flex-wrap items-center justify-between gap-6">
                <div class="flex items-center gap-2 bg-slate-50 p-1.5 rounded-2xl border border-slate-100">
                    @foreach(['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس'] as $day)
                        <button @click="currentDay = '{{ $day }}'" 
                                :class="currentDay === '{{ $day }}' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500 hover:text-slate-700'"
                                class="px-6 py-2.5 rounded-xl text-xs font-black transition-all">
                            {{ $day }}
                        </button>
                    @endforeach
                </div>
                
                <div class="flex items-center gap-3">
                    <select class="bg-slate-50 border-none rounded-xl text-xs font-bold text-slate-600 py-3 pr-10 pl-4 focus:ring-4 focus:ring-blue-500/10">
                        <option>كل المعاهد</option>
                        <option>معهد سطيف 01</option>
                    </select>
                    <select class="bg-slate-50 border-none rounded-xl text-xs font-bold text-slate-600 py-3 pr-10 pl-4 focus:ring-4 focus:ring-blue-500/10">
                        <option>كل الأفواج</option>
                        <option>فوج المعلوماتية A1</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Timetable View -->
        <div class="grid grid-cols-1 gap-8">
            @foreach([
                ['time' => '08:30 - 10:30', 'subject' => 'برمجة الويب المتقدمة', 'teacher' => 'أ. بن محمد', 'room' => 'قاعة 12', 'institute' => 'معهد سطيف 01', 'group' => 'فوج A1'],
                ['time' => '10:30 - 12:30', 'subject' => 'قواعد البيانات SQL', 'teacher' => 'أ. خليفي', 'room' => 'مخبر 05', 'institute' => 'معهد سطيف 01', 'group' => 'فوج A1'],
                ['time' => '01:30 - 03:30', 'subject' => 'هندسة البرمجيات', 'teacher' => 'أ. منصوري', 'room' => 'قاعة 08', 'institute' => 'معهد سطيف 01', 'group' => 'فوج A1'],
            ] as $slot)
                <div class="bg-white rounded-[32px] p-6 border border-slate-100 shadow-sm hover:shadow-md transition-all flex flex-col md:flex-row items-center gap-8 group">
                    <div class="w-48 flex-shrink-0 text-center md:text-right border-l border-slate-100 md:pl-8">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">الفترة الزمنية</p>
                        <p class="text-lg font-black text-blue-600">{{ $slot['time'] }}</p>
                    </div>
                    
                    <div class="flex-1 space-y-2">
                        <div class="flex items-center gap-3">
                            <span class="px-2 py-0.5 bg-blue-50 text-blue-600 text-[10px] font-black rounded uppercase">{{ $slot['group'] }}</span>
                            <h3 class="text-xl font-black text-slate-900 group-hover:text-blue-600 transition-colors">{{ $slot['subject'] }}</h3>
                        </div>
                        <div class="flex flex-wrap items-center gap-6 text-slate-500 font-bold text-xs">
                            <span class="flex items-center gap-2"><i data-lucide="user" class="w-4 h-4"></i> {{ $slot['teacher'] }}</span>
                            <span class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> {{ $slot['room'] }}</span>
                            <span class="flex items-center gap-2"><i data-lucide="building" class="w-4 h-4"></i> {{ $slot['institute'] }}</span>
                        </div>
                    </div>
                    
                    <div class="flex items-center gap-2">
                        <button class="p-3 bg-slate-50 text-slate-400 hover:bg-blue-50 hover:text-blue-600 rounded-2xl transition-all"><i data-lucide="edit-3" class="w-5 h-5"></i></button>
                        <button class="p-3 bg-slate-50 text-slate-400 hover:bg-red-50 hover:text-red-600 rounded-2xl transition-all"><i data-lucide="trash-2" class="w-5 h-5"></i></button>
                    </div>
                </div>
            @endforeach

            <!-- Empty Slots / Break -->
            <div class="bg-slate-50/50 rounded-[32px] p-6 border border-dashed border-slate-200 flex items-center justify-center text-slate-400 gap-4">
                <i data-lucide="clock" class="w-5 h-5"></i>
                <p class="text-xs font-bold uppercase tracking-widest">فترة استراحة / لا توجد دروس مبرمجة</p>
            </div>
        </div>
    </div>
@endsection

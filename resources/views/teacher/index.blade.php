@extends('layouts.app')

@section('title', 'فضاء الأستاذ - وزارة التكوين المهني')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">دروسي ومحاضراتي</h1>
            <p class="text-slate-500">إدارة المحتوى التعليمي والطلاب</p>
        </div>
        <button class="bg-blue-600 text-white px-5 py-2.5 rounded-xl font-bold text-sm flex items-center gap-2 hover:bg-blue-700 transition-all shadow-lg shadow-blue-500/20">
            <i data-lucide="plus-circle" class="w-5 h-5"></i>
            إضافة درس جديد
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach([
            ['title' => 'مقدمة في هندسة البرمجيات', 'students' => 45, 'status' => 'نشط', 'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=400&h=250&auto=format&fit=crop', 'progress' => 75],
            ['title' => 'قواعد البيانات المتقدمة', 'students' => 32, 'status' => 'نشط', 'image' => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?q=80&w=400&h=250&auto=format&fit=crop', 'progress' => 40],
            ['title' => 'تطوير تطبيقات الويب (Laravel)', 'students' => 28, 'status' => 'مسودة', 'image' => 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=400&h=250&auto=format&fit=crop', 'progress' => 10],
        ] as $course)
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm group hover:shadow-xl transition-all duration-300">
                <div class="h-48 overflow-hidden relative">
                    <img src="{{ $course['image'] }}" alt="{{ $course['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 right-4">
                        <span @class([
                            'px-3 py-1 rounded-full text-[10px] font-bold shadow-sm',
                            'bg-emerald-500 text-white' => $course['status'] == 'نشط',
                            'bg-slate-500 text-white' => $course['status'] == 'مسودة',
                        ])>
                            {{ $course['status'] }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-slate-800 text-lg mb-4">{{ $course['title'] }}</h3>
                    
                    <div class="flex items-center gap-6 mb-6">
                        <div class="flex items-center gap-2 text-slate-500 text-sm">
                            <i data-lucide="users" class="w-4 h-4"></i>
                            <span>{{ $course['students'] }} طالب</span>
                        </div>
                        <div class="flex items-center gap-2 text-slate-500 text-sm">
                            <i data-lucide="book-open" class="w-4 h-4"></i>
                            <span>12 وحدة</span>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="flex items-center justify-between text-xs font-bold">
                            <span class="text-slate-400">إتمام المنهج</span>
                            <span class="text-blue-600">{{ $course['progress'] }}%</span>
                        </div>
                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-blue-600 rounded-full" style="width: {{ $course['progress'] }}%"></div>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-slate-50/50 border-t border-slate-50 flex items-center justify-between">
                    <button class="text-blue-600 text-sm font-bold hover:underline">إدارة المحتوى</button>
                    <button class="p-2 text-slate-400 hover:text-slate-600"><i data-lucide="settings" class="w-4 h-4"></i></button>
                </div>
            </div>
        @endforeach
    </div>
@endsection

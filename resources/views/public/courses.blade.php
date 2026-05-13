@extends('layouts.public')

@section('title', 'التخصصات المتاحة - وزارة التكوين المهني')

@section('content')
    <x-public-navbar />
    <div class="pt-48 pb-32 max-w-7xl mx-auto px-8">
        <h1 class="text-6xl font-black text-slate-900 tracking-tighter mb-12">استكشاف التخصصات</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @foreach(['البرمجة وتطوير الويب', 'أمن المعلومات', 'الكهرباء الصناعية', 'المحاسبة والمالية', 'التصميم الجرافيكي', 'إدارة المشاريع'] as $c)
                <div class="bg-white border border-slate-100 rounded-[40px] p-10 shadow-sm hover:shadow-2xl transition-all group">
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-8"><i data-lucide="book" class="w-8 h-8"></i></div>
                    <h3 class="text-2xl font-black text-slate-900 mb-4">{{ $c }}</h3>
                    <p class="text-slate-500 text-sm font-medium mb-8 leading-relaxed">تعلم أحدث التقنيات والمعايير العالمية في تخصص {{ $c }}.</p>
                    <button class="w-full py-4 bg-slate-50 text-[10px] font-black text-slate-400 uppercase tracking-widest rounded-2xl group-hover:bg-blue-600 group-hover:text-white transition-all">تفاصيل التخصص</button>
                </div>
            @endforeach
        </div>
    </div>
    <x-public-footer />
@endsection

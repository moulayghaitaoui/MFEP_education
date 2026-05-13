@extends('layouts.app')

@section('title', 'المديريات الولائية - وزارة التكوين المهني')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-slate-800">المديريات الولائية</h1>
        <button class="bg-blue-600 text-white px-5 py-2.5 rounded-xl font-bold text-sm flex items-center gap-2 hover:bg-blue-700 transition-all shadow-lg shadow-blue-500/20">
            <i data-lucide="plus" class="w-5 h-5"></i>
            إضافة مديرية
        </button>
    </div>

    <!-- Empty State Example -->
    <div class="bg-white rounded-3xl border border-dashed border-slate-200 p-20 flex flex-col items-center text-center">
        <div class="w-24 h-24 bg-blue-50 rounded-full flex items-center justify-center mb-6">
            <i data-lucide="building" class="w-10 h-10 text-blue-300"></i>
        </div>
        <h2 class="text-xl font-bold text-slate-800 mb-2">لا توجد مديريات مسجلة حالياً</h2>
        <p class="text-slate-500 max-w-sm mb-8">لم تقم بإضافة أي مديرية ولائية حتى الآن. ابدأ بإضافة أول مديرية للتحكم في معاهدها ومراكزها.</p>
        
        <div class="flex items-center gap-4">
            <button class="bg-blue-600 text-white px-8 py-3 rounded-xl font-bold text-sm hover:bg-blue-700 transition-all shadow-lg shadow-blue-500/20">
                إضافة أول مديرية
            </button>
            <button class="text-slate-500 font-bold text-sm hover:text-slate-700">
                مشاهدة دليل الاستخدام
            </button>
        </div>
    </div>

    <!-- Loading State Preview (Subtle) -->
    <div class="mt-20">
        <p class="text-xs font-bold text-slate-400 mb-4 text-center">معاينة حالة التحميل (Loading State)</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 opacity-40">
            @for($i=0; $i<3; $i++)
                <div class="bg-white p-6 rounded-2xl border border-slate-100 animate-pulse">
                    <div class="w-12 h-12 bg-slate-200 rounded-xl mb-4"></div>
                    <div class="h-4 bg-slate-200 rounded w-2/3 mb-2"></div>
                    <div class="h-3 bg-slate-100 rounded w-1/2"></div>
                </div>
            @endfor
        </div>
    </div>
@endsection

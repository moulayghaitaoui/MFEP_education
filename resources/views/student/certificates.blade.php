@extends('layouts.app')

@section('title', 'شهاداتي - إنجازاتي العلمية')

@section('content')
    <div>
        <div class="mb-12">
            <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-4">الشهادات الرقمية</h1>
            <p class="text-slate-500 font-medium text-lg">تحميل ومشاركة شهادات إتمام الدورات التدريبية المعتمدة.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            @foreach([
                ['title' => 'تصميم واجهات المستخدم UI/UX', 'date' => '20 ماي 2024', 'id' => 'CERT-7821-UX', 'color' => 'blue'],
                ['title' => 'قواعد البيانات SQL المتقدمة', 'date' => '15 أفريل 2024', 'id' => 'CERT-4410-DB', 'color' => 'indigo'],
            ] as $cert)
                <div class="bg-white rounded-[48px] p-2 border border-slate-100 shadow-sm overflow-hidden group hover:shadow-2xl transition-all duration-700">
                    <div class="bg-slate-50 rounded-[44px] p-10 border border-slate-100 relative overflow-hidden flex flex-col items-center text-center">
                         <!-- Certificate Watermark -->
                         <i data-lucide="award" class="absolute -top-10 -right-10 w-48 h-48 text-blue-600 opacity-5 -rotate-12"></i>
                         
                         <div class="w-20 h-20 bg-white rounded-3xl shadow-xl flex items-center justify-center mb-8 relative z-10 group-hover:scale-110 transition-transform">
                            <i data-lucide="award" class="w-10 h-10 text-blue-600"></i>
                         </div>
                         
                         <p class="text-[10px] font-black text-blue-600 uppercase tracking-[0.4em] mb-4 relative z-10">شهادة إتمام دورة</p>
                         <h3 class="text-2xl font-black text-slate-900 mb-2 relative z-10 leading-tight">{{ $cert['title'] }}</h3>
                         <p class="text-xs font-bold text-slate-400 mb-8 relative z-10">ممنوحة للطالب: محمد بن علي</p>
                         
                         <div class="w-full h-[1px] bg-slate-200/50 mb-8 relative z-10"></div>
                         
                         <div class="flex items-center justify-between w-full relative z-10">
                             <div class="text-right">
                                 <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">تاريخ الإصدار</p>
                                 <p class="text-xs font-bold text-slate-800">{{ $cert['date'] }}</p>
                             </div>
                             <div class="text-left">
                                 <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">رقم الشهادة</p>
                                 <p class="text-xs font-bold text-slate-800 font-mono">{{ $cert['id'] }}</p>
                             </div>
                         </div>
                    </div>
                    
                    <div class="p-6 flex items-center gap-4">
                        <button class="flex-1 bg-slate-900 text-white py-4 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-blue-600 transition-all flex items-center justify-center gap-3 shadow-xl shadow-slate-900/10">
                            <i data-lucide="download" class="w-4 h-4"></i>
                            تحميل PDF
                        </button>
                        <button class="w-14 h-14 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center hover:bg-blue-50 hover:text-blue-600 transition-all">
                            <i data-lucide="share-2" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>
            @endforeach

            <!-- Locked Certificate Preview -->
            <div class="bg-slate-50/50 rounded-[48px] p-2 border border-dashed border-slate-200 opacity-60 flex items-center justify-center min-h-[400px]">
                <div class="text-center space-y-4">
                    <div class="w-16 h-16 bg-white rounded-3xl mx-auto flex items-center justify-center text-slate-200">
                        <i data-lucide="lock" class="w-8 h-8"></i>
                    </div>
                    <div>
                        <p class="text-sm font-black text-slate-400 tracking-tight">شهادة تطوير الويب (Laravel)</p>
                        <p class="text-[10px] font-bold text-slate-300 uppercase tracking-widest mt-1">أكمل الكورس بنسبة 100% لفتح الشهادة</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

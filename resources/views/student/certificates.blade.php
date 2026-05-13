@extends('layouts.student')

@section('title', 'الشهادات - إنجازاتي الرقمية')

@section('content')
    <div>
        <div class="mb-12 animate-fade-in">
            <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-4">الشهادات المكتسبة</h1>
            <p class="text-slate-500 font-medium text-lg">تحميل ومشاركة شهادات إتمام التكوين المهني المعتمدة رقمياً.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            @foreach([
                ['title' => 'تصميم واجهات المستخدم UI/UX', 'id' => 'CERT-7821-UX', 'date' => '20 ماي 2024'],
                ['title' => 'قواعد البيانات SQL المتقدمة', 'id' => 'CERT-4410-DB', 'date' => '15 أفريل 2024'],
            ] as $cert)
                <div class="bg-white rounded-[48px] p-2 border border-slate-100 shadow-sm group hover:shadow-2xl transition-all duration-700 overflow-hidden">
                    <div class="bg-slate-900 rounded-[44px] p-12 relative overflow-hidden flex flex-col items-center text-center">
                        <!-- Watermark -->
                        <i data-lucide="award" class="absolute -top-10 -right-10 w-48 h-48 text-white/5 -rotate-12"></i>
                        
                        <div class="w-20 h-20 bg-white/10 backdrop-blur-xl rounded-3xl mb-10 flex items-center justify-center text-white border border-white/10 group-hover:scale-110 transition-transform">
                            <i data-lucide="award" class="w-10 h-10"></i>
                        </div>
                        
                        <h3 class="text-2xl font-black text-white mb-2 leading-tight relative z-10">{{ $cert['title'] }}</h3>
                        <p class="text-blue-400 text-[10px] font-black uppercase tracking-[0.3em] mb-12 relative z-10">شهادة إتمام معتمدة</p>
                        
                        <div class="w-full flex justify-between items-end relative z-10">
                             <div class="text-right">
                                 <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest">رقم الشهادة</p>
                                 <p class="text-xs font-bold text-white font-mono uppercase">{{ $cert['id'] }}</p>
                             </div>
                             <div class="text-left">
                                 <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest">تاريخ الإصدار</p>
                                 <p class="text-xs font-bold text-white uppercase">{{ $cert['date'] }}</p>
                             </div>
                        </div>

                        <!-- QR Code Placeholder -->
                        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center border border-white/5">
                             <i data-lucide="qr-code" class="w-6 h-6 text-white/40"></i>
                        </div>
                    </div>

                    <div class="p-6 flex items-center gap-4">
                        <button class="flex-1 bg-slate-100 text-slate-900 py-4 rounded-3xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all flex items-center justify-center gap-3">
                            <i data-lucide="download" class="w-4 h-4"></i>
                            تحميل PDF
                        </button>
                        <button class="w-16 h-16 bg-slate-100 text-slate-400 rounded-3xl flex items-center justify-center hover:bg-blue-50 hover:text-blue-600 transition-all">
                            <i data-lucide="share-2" class="w-5 h-5"></i>
                        </button>
                    </div>
                </div>
            @endforeach

            <!-- Locked Template -->
            <div class="bg-slate-50/50 rounded-[48px] p-2 border border-dashed border-slate-200 min-h-[400px] flex items-center justify-center opacity-60">
                 <div class="text-center">
                    <div class="w-16 h-16 bg-white rounded-3xl mx-auto flex items-center justify-center text-slate-200 mb-6 shadow-sm">
                        <i data-lucide="lock" class="w-8 h-8"></i>
                    </div>
                    <p class="text-sm font-black text-slate-400 uppercase tracking-widest">شهادة Laravel المتقدمة</p>
                    <p class="text-[10px] font-bold text-slate-300 mt-2 uppercase tracking-widest">أكمل الكورس بنسبة 100% لفتح الشهادة</p>
                 </div>
            </div>
        </div>
    </div>
@endsection

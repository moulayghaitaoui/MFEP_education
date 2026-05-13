@extends('layouts.admin')

@section('title', 'إدارة المديريات الولائية - وزارة التكوين المهني')

@section('navbar')
    <header class="h-24 bg-white/80 backdrop-blur-xl border-b border-slate-100 flex items-center justify-between px-12 z-20">
        <div class="flex items-center gap-8">
            <button @click="sidebarOpen = !sidebarOpen" class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 hover:text-slate-900 transition-all">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <h2 class="text-xl font-black text-slate-900 tracking-tight">إدارة المديريات الولائية (الـ 58 ولاية)</h2>
        </div>
        
        <div class="flex items-center gap-4">
            <button class="bg-gov-green text-white px-8 py-4 rounded-3xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-gov-green/20 hover:bg-gov-green-dark transition-all flex items-center gap-3">
                <i data-lucide="map-pin" class="w-5 h-5 text-gov-gold"></i>
                إحصائيات إقليمية
            </button>
        </div>
    </header>
@endsection

@section('content')
    <div class="p-12 space-y-12">
        <!-- Search and View Toggle -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8">
            <div class="flex-1 relative max-w-xl">
                <i data-lucide="search" class="absolute left-6 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-300"></i>
                <input type="text" placeholder="البحث عن مديرية ولاية..." class="w-full bg-white border border-slate-100 rounded-[32px] pl-16 pr-8 py-5 font-bold text-slate-800 outline-none focus:ring-4 focus:ring-gov-green/5 transition-all shadow-sm">
            </div>
            <div class="flex bg-white p-2 rounded-2xl border border-slate-100 shadow-sm">
                <button class="px-6 py-3 bg-gov-green text-white rounded-xl text-xs font-black uppercase">عرض الشبكة</button>
                <button class="px-6 py-3 text-slate-400 rounded-xl text-xs font-black uppercase hover:bg-slate-50">عرض الخريطة</button>
            </div>
        </div>

        <!-- Directions Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">
            @foreach([
                ['id' => '19', 'name' => 'سطيف', 'director' => 'كمال بن عيسى', 'institutes' => '42', 'teachers' => '1,850', 'status' => 'Stable'],
                ['id' => '16', 'name' => 'الجزائر العاصمة', 'director' => 'مراد فرحات', 'institutes' => '65', 'teachers' => '3,120', 'status' => 'Warning'],
                ['id' => '31', 'name' => 'وهران', 'director' => 'سامية بلحاج', 'institutes' => '38', 'teachers' => '2,400', 'status' => 'Stable'],
                ['id' => '25', 'name' => 'قسنطينة', 'director' => 'ياسين زواري', 'institutes' => '29', 'teachers' => '1,560', 'status' => 'Stable'],
                ['id' => '06', 'name' => 'بجاية', 'director' => 'فريد أوعمران', 'institutes' => '24', 'teachers' => '1,100', 'status' => 'Stable'],
                ['id' => '01', 'name' => 'أدرار', 'director' => 'سالم قادري', 'institutes' => '12', 'teachers' => '450', 'status' => 'Stable'],
                ['id' => '07', 'name' => 'بسكرة', 'director' => 'محمد طهراوي', 'institutes' => '21', 'teachers' => '890', 'status' => 'Stable'],
                ['id' => '47', 'name' => 'غرداية', 'director' => 'إبراهيم داود', 'institutes' => '15', 'teachers' => '620', 'status' => 'Stable'],
            ] as $dir)
            <div class="bg-white rounded-[40px] p-8 border border-slate-100 shadow-sm hover:shadow-2xl transition-all group">
                <div class="flex items-center justify-between mb-8">
                    <div class="w-14 h-14 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 group-hover:bg-gov-green transition-all group-hover:scale-110">
                        <span class="text-xl font-black">{{ $dir['id'] }}</span>
                    </div>
                    <span @class([
                        'w-3 h-3 rounded-full',
                        'bg-emerald-500 shadow-lg shadow-emerald-500/20' => $dir['status'] == 'Stable',
                        'bg-rose-500 shadow-lg shadow-rose-500/20 animate-pulse' => $dir['status'] == 'Warning',
                    ])></span>
                </div>

                <h3 class="text-2xl font-black text-slate-900 mb-1">مديرية {{ $dir['name'] }}</h3>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-8">المدير: {{ $dir['director'] }}</p>

                <div class="space-y-4 mb-8">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-black text-slate-400 uppercase">المعاهد</span>
                        <span class="text-xs font-black text-slate-900">{{ $dir['institutes'] }} مؤسسة</span>
                    </div>
                    <div class="w-full h-1.5 bg-slate-50 rounded-full overflow-hidden">
                        <div class="h-full bg-gov-green rounded-full" style="width: 75%"></div>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-black text-slate-400 uppercase">الأساتذة</span>
                        <span class="text-xs font-black text-slate-900">{{ $dir['teachers'] }} أستاذ</span>
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-50 flex gap-2">
                    <button class="flex-1 py-3 bg-slate-50 text-[10px] font-black text-slate-400 uppercase tracking-widest hover:bg-gov-green hover:text-white transition-all rounded-xl">عرض التفاصيل</button>
                    <button class="p-3 bg-slate-50 text-slate-400 rounded-xl hover:text-gov-gold hover:bg-gov-gold/10 transition-all"><i data-lucide="mail" class="w-4 h-4"></i></button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'إدارة التخصصات الوطنية - وزارة التكوين المهني')

@section('navbar')
    <header class="h-24 bg-white/80 backdrop-blur-xl border-b border-slate-100 flex items-center justify-between px-12 z-20">
        <div class="flex items-center gap-8">
            <button @click="sidebarOpen = !sidebarOpen" class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 hover:text-slate-900 transition-all">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <h2 class="text-xl font-black text-slate-900 tracking-tight">إدارة التخصصات والشعب المهنية</h2>
        </div>
        
        <div class="flex items-center gap-4">
            <button class="bg-gov-green text-white px-8 py-4 rounded-3xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-gov-green/20 hover:bg-gov-green-dark transition-all flex items-center gap-3">
                <i data-lucide="plus-square" class="w-5 h-5 text-gov-gold"></i>
                إضافة تخصص جديد
            </button>
        </div>
    </header>
@endsection

@section('content')
    <div class="p-12 space-y-12">
        <!-- Search & Filter Bar -->
        <div class="bg-white rounded-[40px] p-8 shadow-sm border border-slate-100 flex flex-wrap gap-6 items-center">
            <div class="flex-1 relative min-w-[300px]">
                <i data-lucide="search" class="absolute left-6 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-300"></i>
                <input type="text" placeholder="البحث عن تخصص أو شعبة..." class="w-full bg-slate-50 border-none rounded-[24px] pl-16 pr-8 py-5 font-bold text-slate-800 outline-none focus:ring-4 focus:ring-gov-green/5 transition-all">
            </div>
            <div class="flex items-center gap-4">
                <select class="bg-slate-50 border-none rounded-2xl px-8 py-5 text-xs font-black uppercase tracking-widest outline-none appearance-none cursor-pointer">
                    <option>جميع الشعب المهنية</option>
                    <option>الرقمنة وتكنولوجيات الإعلام</option>
                    <option>الفلاحة والصناعات الغذائية</option>
                    <option>البناء والأشغال العمومية</option>
                </select>
                <button class="w-16 h-16 bg-slate-900 text-white rounded-2xl flex items-center justify-center hover:bg-gov-green transition-all shadow-xl shadow-slate-900/10">
                    <i data-lucide="sliders-horizontal" class="w-6 h-6"></i>
                </button>
            </div>
        </div>

        <!-- Specializations Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
            @foreach([
                ['title' => 'تطوير تطبيقات الويب والهاتف', 'branch' => 'الرقمنة وتكنولوجيات الإعلام', 'level' => 'تقني سامي (TS)', 'duration' => '30 شهر', 'std' => '12,500', 'status' => 'Active'],
                ['title' => 'ميكانيك المحركات والآليات', 'branch' => 'ميكانيك المحركات والآليات', 'level' => 'تقني (T)', 'duration' => '24 شهر', 'std' => '8,200', 'status' => 'Active'],
                ['title' => 'التسيير المحاسبي والمالي', 'branch' => 'التسيير والإدارة', 'level' => 'تقني سامي (TS)', 'duration' => '30 شهر', 'std' => '15,400', 'status' => 'Updating'],
                ['title' => 'صيانة الطائرات والهياكل', 'branch' => 'الطيران والملاحة', 'level' => 'مهندس دولة', 'duration' => '36 شهر', 'std' => '1,100', 'status' => 'Active'],
                ['title' => 'صناعة الحلويات والمخبوزات', 'branch' => 'السياحة والفندقة', 'level' => 'CAP', 'duration' => '12 شهر', 'std' => '5,600', 'status' => 'Active'],
                ['title' => 'التصوير الفوتوغرافي والسينما', 'branch' => 'الفنون والسمعي البصري', 'level' => 'تقني (T)', 'duration' => '24 شهر', 'std' => '3,200', 'status' => 'Suspended'],
            ] as $spec)
            <div class="bg-white rounded-[48px] p-10 border border-slate-100 shadow-sm hover:shadow-2xl transition-all group relative overflow-hidden">
                <div class="absolute top-0 left-0 w-2 h-full bg-{{ $spec['status'] == 'Active' ? 'gov-green' : ($spec['status'] == 'Updating' ? 'gov-gold' : 'rose-500') }}"></div>
                
                <div class="flex items-center justify-between mb-8">
                    <div class="w-14 h-14 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 group-hover:text-gov-green transition-colors">
                        <i data-lucide="book-open" class="w-7 h-7"></i>
                    </div>
                    <span @class([
                        'px-4 py-1.5 rounded-lg text-[9px] font-black uppercase tracking-widest',
                        'bg-gov-green/10 text-gov-green' => $spec['status'] == 'Active',
                        'bg-gov-gold/10 text-gov-gold' => $spec['status'] == 'Updating',
                        'bg-rose-50 text-rose-500' => $spec['status'] == 'Suspended',
                    ])>{{ $spec['status'] }}</span>
                </div>

                <h4 class="text-xl font-black text-slate-900 mb-2 leading-tight">{{ $spec['title'] }}</h4>
                <p class="text-xs font-bold text-slate-400 mb-8">{{ $spec['branch'] }}</p>

                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="p-4 bg-slate-50 rounded-2xl">
                        <p class="text-[9px] font-black text-slate-400 uppercase mb-1">المستوى</p>
                        <p class="text-xs font-black text-slate-700">{{ $spec['level'] }}</p>
                    </div>
                    <div class="p-4 bg-slate-50 rounded-2xl">
                        <p class="text-[9px] font-black text-slate-400 uppercase mb-1">مدة التكوين</p>
                        <p class="text-xs font-black text-slate-700">{{ $spec['duration'] }}</p>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                    <div class="flex items-center gap-2">
                        <i data-lucide="users" class="w-4 h-4 text-gov-green"></i>
                        <span class="text-xs font-black text-slate-900">{{ $spec['std'] }} متربص</span>
                    </div>
                    <div class="flex gap-2">
                        <button class="w-10 h-10 bg-slate-50 text-slate-400 rounded-xl flex items-center justify-center hover:bg-gov-green hover:text-white transition-all"><i data-lucide="settings-2" class="w-4 h-4"></i></button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

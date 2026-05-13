@extends('layouts.admin')

@section('title', 'إدارة المعاهد والمديريات - وزارة التكوين المهني')

@section('navbar')
    <header class="h-24 bg-white/80 backdrop-blur-xl border-b border-slate-100 flex items-center justify-between px-12 z-20">
        <div class="flex items-center gap-8">
            <button @click="sidebarOpen = !sidebarOpen" class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 hover:text-slate-900 transition-all">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <h2 class="text-xl font-black text-slate-900 tracking-tight">إدارة المعاهد والمديريات</h2>
        </div>
    </header>
@endsection

@section('content')
    <div class="p-12 space-y-12">
        <!-- Search & Filters -->
        <div class="bg-white rounded-[48px] p-8 shadow-sm border border-slate-100 flex flex-wrap items-center justify-between gap-8">
            <div class="flex-1 min-w-[300px]">
                <div class="flex items-center gap-4 px-8 py-5 bg-slate-50 rounded-[32px] border border-slate-100 group focus-within:ring-4 focus-within:ring-cyan-600/10 transition-all">
                    <i data-lucide="search" class="w-6 h-6 text-slate-300"></i>
                    <input type="text" placeholder="ابحث عن معهد، ولاية، أو مديرية..." class="bg-transparent border-none p-0 text-sm font-bold text-slate-700 focus:ring-0 w-full outline-none">
                </div>
            </div>
            <div class="flex items-center gap-4">
                <select class="bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-[10px] font-black uppercase tracking-widest outline-none appearance-none">
                    <option>جميع الولايات</option>
                    <option>سطيف</option>
                    <option>الجزائر</option>
                </select>
                <select class="bg-slate-50 border border-slate-100 rounded-2xl px-6 py-4 text-[10px] font-black uppercase tracking-widest outline-none appearance-none">
                    <option>نوع المركز</option>
                    <option>INSFP</option>
                    <option>CFPA</option>
                </select>
                <button class="w-14 h-14 bg-slate-900 text-white rounded-2xl flex items-center justify-center hover:bg-cyan-500 transition-all shadow-xl shadow-slate-900/10">
                    <i data-lucide="filter" class="w-6 h-6"></i>
                </button>
            </div>
        </div>

        <!-- Institutes Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
            @foreach([
                ['name' => 'المعهد الوطني المتخصص - بئر مراد رايس', 'loc' => 'الجزائر العاصمة', 'std' => '1,120', 'stat' => 'active'],
                ['name' => 'مركز التكوين المهني - وادي تليلات', 'loc' => 'وهران', 'std' => '450', 'stat' => 'active'],
                ['name' => 'المعهد التقني للكهرباء والغاز', 'loc' => 'عنابة', 'std' => '890', 'stat' => 'maintenance'],
                ['name' => 'معهد الفنون المطبعية', 'loc' => 'الجزائر العاصمة', 'std' => '320', 'stat' => 'active'],
                ['name' => 'مركز التكوين المهني - تيزي وزو', 'loc' => 'تيزي وزو', 'std' => '980', 'stat' => 'active'],
                ['name' => 'معهد السياحة والفندقة', 'loc' => 'تلمسان', 'std' => '540', 'stat' => 'active'],
            ] as $inst)
                <x-admin-institute-card :name="$inst['name']" :location="$inst['loc']" :students="$inst['std']" :status="$inst['stat']" />
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center pt-8 pb-12">
            <div class="bg-white border border-slate-100 rounded-3xl p-2 flex gap-2">
                <button class="w-12 h-12 flex items-center justify-center rounded-2xl text-slate-300 hover:text-slate-900 hover:bg-slate-50 transition-all"><i data-lucide="chevron-right" class="w-5 h-5"></i></button>
                <button class="w-12 h-12 flex items-center justify-center rounded-2xl bg-slate-900 text-white font-black text-xs">1</button>
                <button class="w-12 h-12 flex items-center justify-center rounded-2xl text-slate-900 font-black text-xs hover:bg-slate-50 transition-all">2</button>
                <button class="w-12 h-12 flex items-center justify-center rounded-2xl text-slate-900 font-black text-xs hover:bg-slate-50 transition-all">3</button>
                <button class="w-12 h-12 flex items-center justify-center rounded-2xl text-slate-300 hover:text-slate-900 hover:bg-slate-50 transition-all"><i data-lucide="chevron-left" class="w-5 h-5"></i></button>
            </div>
        </div>
    </div>
@endsection

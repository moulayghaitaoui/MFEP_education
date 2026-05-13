@props(['name', 'location', 'type', 'students', 'status' => 'active'])

<div class="bg-white rounded-[48px] p-8 border border-slate-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-700 group relative overflow-hidden">
    <!-- Background Watermark -->
    <i data-lucide="building-2" class="absolute -bottom-10 -left-10 w-48 h-48 text-slate-50 -rotate-12 group-hover:text-cyan-500/5 transition-colors"></i>

    <div class="flex items-center justify-between mb-8 relative z-10">
        <div @class([
            'px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest',
            'bg-cyan-100 text-cyan-600' => $status == 'active',
            'bg-amber-100 text-amber-600' => $status == 'maintenance',
        ])>
            {{ $status == 'active' ? 'نشط عملياً' : 'تحت الصيانة' }}
        </div>
        <button class="text-slate-300 hover:text-slate-900 transition-colors"><i data-lucide="more-horizontal" class="w-6 h-6"></i></button>
    </div>

    <div class="mb-10 relative z-10">
        <h4 class="text-2xl font-black text-slate-900 tracking-tighter mb-2 leading-tight group-hover:text-cyan-600 transition-colors">{{ $name }}</h4>
        <div class="flex items-center gap-3 text-xs font-bold text-slate-400">
            <i data-lucide="map-pin" class="w-4 h-4"></i>
            {{ $location }}
        </div>
    </div>

    <div class="grid grid-cols-2 gap-6 relative z-10">
        <div class="p-6 bg-slate-50 rounded-3xl border border-transparent group-hover:border-slate-100 transition-all">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">المتربصين</p>
            <p class="text-xl font-black text-slate-900">{{ $students }}</p>
        </div>
        <div class="p-6 bg-slate-50 rounded-3xl border border-transparent group-hover:border-slate-100 transition-all">
            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">التخصصات</p>
            <p class="text-xl font-black text-slate-900">12</p>
        </div>
    </div>

    <div class="mt-8 flex gap-3 relative z-10">
        <button class="flex-1 bg-slate-900 text-white py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-cyan-500 transition-all shadow-xl shadow-slate-900/10">التفاصيل</button>
        <button class="w-14 h-14 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center hover:bg-slate-100 transition-all"><i data-lucide="bar-chart-2" class="w-5 h-5"></i></button>
    </div>
</div>

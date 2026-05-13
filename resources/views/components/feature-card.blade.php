@props(['title', 'desc', 'icon', 'color' => 'blue'])

<div class="bg-white rounded-[48px] p-10 border border-slate-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-700 group relative overflow-hidden">
    <!-- Icon Decor -->
    <div @class([
        'w-20 h-20 rounded-3xl flex items-center justify-center mb-10 transition-transform group-hover:scale-110 shadow-lg',
        'bg-blue-50 text-blue-600' => $color == 'blue',
        'bg-indigo-50 text-indigo-600' => $color == 'indigo',
        'bg-emerald-50 text-emerald-600' => $color == 'emerald',
    ])>
        <i data-lucide="{{ $icon }}" class="w-10 h-10"></i>
    </div>

    <h3 class="text-2xl font-black text-slate-900 tracking-tighter mb-4 leading-tight group-hover:text-blue-600 transition-colors">{{ $title }}</h3>
    <p class="text-slate-500 font-medium text-sm leading-relaxed mb-8">{{ $desc }}</p>

    <div class="flex items-center gap-2 text-[10px] font-black text-blue-600 uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-all">
        اكتشف المزيد
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
    </div>

    <!-- Background Pattern -->
    <div class="absolute -bottom-4 -left-4 w-24 h-24 bg-slate-50 rounded-full group-hover:scale-[3] transition-transform duration-700 -z-10"></div>
</div>

@props(['title', 'icon', 'color' => 'blue'])

<div {{ $attributes->merge(['class' => 'bg-white rounded-[40px] p-8 border border-slate-100 shadow-sm flex items-center gap-6 group hover:shadow-2xl transition-all']) }}>
    <div @class([
        'w-16 h-16 rounded-[24px] flex items-center justify-center transition-transform group-hover:scale-110 shadow-lg',
        'bg-blue-50 text-blue-600 shadow-blue-900/5' => $color == 'blue',
        'bg-amber-50 text-amber-600 shadow-amber-900/5' => $color == 'amber',
        'bg-emerald-50 text-emerald-600 shadow-emerald-900/5' => $color == 'emerald',
    ])>
        <i data-lucide="{{ $icon }}" class="w-8 h-8"></i>
    </div>
    <div>
        <h4 class="text-lg font-black text-slate-900 tracking-tight">{{ $title }}</h4>
        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">إنجاز جديد</p>
    </div>
    <div class="mr-auto">
        <i data-lucide="chevron-left" class="w-5 h-5 text-slate-200 group-hover:text-blue-600 transition-colors"></i>
    </div>
</div>

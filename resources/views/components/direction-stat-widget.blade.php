@props(['label', 'value', 'icon', 'color' => 'blue', 'progress' => null])

<div class="bg-white rounded-[40px] p-8 border border-slate-100 shadow-sm hover:shadow-xl transition-all group">
    <div class="flex items-center justify-between mb-8">
        <div @class([
            'w-14 h-14 rounded-2xl flex items-center justify-center transition-transform group-hover:scale-110 shadow-lg',
            'bg-gov-green text-white shadow-gov-green/10' => $color == 'gov-green',
            'bg-gov-gold text-white shadow-gov-gold/10' => $color == 'gov-gold',
            'bg-emerald-600 text-white shadow-emerald-900/10' => $color == 'emerald',
        ])>
            <i data-lucide="{{ $icon }}" class="w-7 h-7"></i>
        </div>
        @if($progress)
            <span class="text-[10px] font-black text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">+{{ $progress }}%</span>
        @endif
    </div>
    
    <div>
        <p class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">{{ $label }}</p>
        <h3 class="text-3xl font-black text-slate-900 tracking-tight">{{ $value }}</h3>
    </div>
</div>

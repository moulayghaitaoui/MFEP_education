@props(['value' => 0, 'label' => '', 'color' => 'blue'])

<div class="space-y-3">
    @if($label)
        <div class="flex justify-between text-[10px] font-black uppercase tracking-widest text-slate-400">
            <span>{{ $label }}</span>
            <span class="text-slate-900">{{ $value }}%</span>
        </div>
    @endif
    <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
        <div @class([
            'h-full rounded-full transition-all duration-1000',
            'bg-blue-600 shadow-lg shadow-blue-500/20' => $color == 'blue',
            'bg-emerald-500 shadow-lg shadow-emerald-500/20' => $color == 'green',
            'bg-rose-500 shadow-lg shadow-rose-500/20' => $color == 'red',
        ]) style="width: {{ $value }}%"></div>
    </div>
</div>

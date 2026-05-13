@props(['label', 'value', 'trend' => '', 'icon', 'color' => 'blue'])

<div class="bg-white rounded-[40px] p-8 border border-slate-100 shadow-sm group hover:shadow-2xl transition-all duration-500 hover:-translate-y-1">
    <div class="flex items-center justify-between mb-8">
        <div @class([
            'w-16 h-16 rounded-[24px] flex items-center justify-center transition-transform group-hover:rotate-12 shadow-lg',
            'bg-slate-900 text-white shadow-slate-900/10' => $color == 'blue',
            'bg-cyan-500 text-white shadow-cyan-500/10' => $color == 'cyan',
            'bg-indigo-600 text-white shadow-indigo-600/10' => $color == 'indigo',
        ])>
            <i data-lucide="{{ $icon }}" class="w-8 h-8"></i>
        </div>
        @if($trend)
            <div @class([
                'flex items-center gap-1 px-3 py-1 rounded-full text-[10px] font-black',
                'bg-emerald-50 text-emerald-600' => str_contains($trend, '+'),
                'bg-rose-50 text-rose-600' => str_contains($trend, '-'),
            ])>
                <i data-lucide="{{ str_contains($trend, '+') ? 'trending-up' : 'trending-down' }}" class="w-3 h-3"></i>
                {{ $trend }}
            </div>
        @endif
    </div>
    
    <div>
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">{{ $label }}</p>
        <h3 class="text-4xl font-black text-slate-900 tracking-tighter">{{ $value }}</h3>
    </div>

    <!-- Micro Chart Decoration -->
    <div class="mt-8 flex gap-1 h-2 items-end">
        @foreach([30, 60, 40, 90, 50, 70, 40, 80] as $h)
            <div class="flex-1 bg-slate-50 rounded-full group-hover:bg-slate-200 transition-colors" style="height: {{ $h }}%"></div>
        @endforeach
    </div>
</div>

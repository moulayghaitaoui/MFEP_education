@props(['icon', 'label', 'active' => false, 'collapsed' => false, 'href' => '#'])

<a href="{{ $href }}" @class([
    'flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 group overflow-hidden whitespace-nowrap',
    'bg-blue-600 text-white shadow-lg shadow-blue-900/20' => $active,
    'text-slate-400 hover:bg-white/5 hover:text-white' => !$active
]) title="{{ $collapsed ? $label : '' }}">
    <div class="flex-shrink-0 w-5 h-5 flex items-center justify-center">
        <i data-lucide="{{ $icon }}" @class([
            'w-5 h-5 transition-transform group-hover:scale-110',
            'text-white' => $active,
            'text-slate-400 group-hover:text-blue-300' => !$active
        ])></i>
    </div>
    
    <span x-show="sidebarOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" class="font-bold text-[13px] tracking-tight">{{ $label }}</span>
    
    @if($active && !$collapsed)
        <div x-show="sidebarOpen" class="mr-auto w-1.5 h-1.5 rounded-full bg-white shadow-glow"></div>
    @endif
</a>

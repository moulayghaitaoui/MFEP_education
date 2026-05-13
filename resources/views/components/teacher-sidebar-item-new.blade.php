@props(['icon', 'label', 'href', 'active' => false])

<a href="{{ $href }}" @class([
    'flex items-center gap-4 px-6 py-4 rounded-2xl transition-all duration-300 group overflow-hidden whitespace-nowrap border border-transparent',
    'bg-white text-gov-green-dark shadow-xl shadow-black/20' => $active,
    'text-white/70 hover:bg-white/5 hover:text-white hover:border-white/5' => !$active
]) :title="sidebarOpen ? '' : '{{ $label }}'">
    <div class="flex-shrink-0 w-6 h-6 flex items-center justify-center">
        <i data-lucide="{{ $icon }}" @class([
            'w-5 h-5 transition-transform group-hover:scale-110',
            'text-gov-green-dark' => $active,
            'text-gov-gold group-hover:text-white' => !$active
        ])></i>
    </div>
    <span x-show="sidebarOpen" x-transition class="font-black text-xs tracking-tight">{{ $label }}</span>
    
    @if($active)
        <div x-show="sidebarOpen" class="mr-auto w-1.5 h-1.5 rounded-full bg-gov-green-dark"></div>
    @endif
</a>

@props(['icon', 'label', 'href', 'active' => false])

<a href="{{ $href }}" @class([
    'flex items-center gap-4 px-5 py-4 rounded-[20px] transition-all duration-300 group overflow-hidden whitespace-nowrap',
    'bg-white/10 text-gov-gold shadow-xl' => $active,
    'text-white/60 hover:bg-white/5 hover:text-white' => !$active
]) :title="sidebarOpen ? '' : '{{ $label }}'">
    <div class="flex-shrink-0 w-6 h-6 flex items-center justify-center">
        <i data-lucide="{{ $icon }}" @class([
            'w-5 h-5 transition-transform group-hover:scale-110',
            'text-gov-gold' => $active,
            'text-white/60 group-hover:text-gov-gold' => !$active
        ])></i>
    </div>
    <span x-show="sidebarOpen" x-transition class="font-black text-[13px] tracking-tight">{{ $label }}</span>
</a>

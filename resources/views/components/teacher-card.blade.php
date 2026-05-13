@props(['title' => '', 'subtitle' => '', 'padding' => 'p-8'])

<div {{ $attributes->merge(['class' => "bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden $padding"]) }}>
    @if($title || $subtitle)
        <div class="mb-8">
            @if($title)
                <h3 class="text-xl font-black text-slate-900 tracking-tight">{{ $title }}</h3>
            @endif
            @if($subtitle)
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">{{ $subtitle }}</p>
            @endif
        </div>
    @endif
    {{ $slot }}
</div>

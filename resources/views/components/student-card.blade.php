@props(['title' => '', 'padding' => 'p-8'])

<div {{ $attributes->merge(['class' => "bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden $padding"]) }}>
    @if($title)
        <h3 class="text-xl font-black text-slate-900 tracking-tight mb-8">{{ $title }}</h3>
    @endif
    {{ $slot }}
</div>

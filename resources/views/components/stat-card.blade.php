@props(['label', 'value', 'trend', 'icon', 'color' => 'blue'])

@php
    $colors = [
        'blue' => 'bg-blue-50 text-blue-600',
        'green' => 'bg-emerald-50 text-emerald-600',
        'orange' => 'bg-orange-50 text-orange-600',
        'purple' => 'bg-purple-50 text-purple-600',
    ];
    $iconColor = $colors[$color] ?? $colors['blue'];
@endphp

<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
    <div class="flex items-center justify-between mb-4">
        <div class="w-12 h-12 rounded-xl {{ $iconColor }} flex items-center justify-center">
            <i data-lucide="{{ $icon }}" class="w-6 h-6"></i>
        </div>
        @if($trend > 0)
            <div class="flex items-center gap-1 text-emerald-600 text-xs font-bold bg-emerald-50 px-2 py-1 rounded-full">
                <i data-lucide="trending-up" class="w-3 h-3"></i>
                <span>+{{ $trend }}%</span>
            </div>
        @else
            <div class="flex items-center gap-1 text-red-600 text-xs font-bold bg-red-50 px-2 py-1 rounded-full">
                <i data-lucide="trending-down" class="w-3 h-3"></i>
                <span>{{ $trend }}%</span>
            </div>
        @endif
    </div>
    
    <div class="space-y-1">
        <p class="text-sm font-medium text-slate-500">{{ $label }}</p>
        <h3 class="text-3xl font-bold text-slate-800">{{ $value }}</h3>
    </div>
    
    <div class="mt-4 pt-4 border-t border-slate-50 flex items-center justify-between">
        <span class="text-xs text-slate-400">آخر تحديث: منذ ساعة</span>
        <a href="#" class="text-xs font-bold text-blue-600 hover:underline flex items-center gap-1">
            التفاصيل
            <i data-lucide="chevron-left" class="w-3 h-3"></i>
        </a>
    </div>
</div>

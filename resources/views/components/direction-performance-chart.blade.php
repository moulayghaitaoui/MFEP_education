@props(['title'])

<div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm">
    <div class="flex items-center justify-between mb-10">
        <h3 class="text-xl font-black text-slate-900 tracking-tight">{{ $title }}</h3>
        <div class="flex gap-2">
            <div class="flex items-center gap-2 text-[9px] font-black uppercase text-slate-400">
                <div class="w-2 h-2 bg-gov-green rounded-full"></div>
                هذا الأسبوع
            </div>
        </div>
    </div>

    <div class="h-64 flex items-end justify-between gap-3 px-2">
        @foreach([40, 70, 50, 90, 60, 85, 45, 95, 30, 75, 55, 80] as $h)
            <div class="flex-1 bg-slate-50 rounded-t-xl hover:bg-gov-green transition-all cursor-pointer relative group/bar" style="height: {{ $h }}%">
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-slate-900 text-white text-[9px] font-black px-2 py-1 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity z-10">{{ $h }}%</div>
            </div>
        @endforeach
    </div>
</div>

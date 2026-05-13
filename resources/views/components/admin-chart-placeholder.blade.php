@props(['title', 'height' => 'h-80'])

<div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm relative overflow-hidden group">
    <div class="flex items-center justify-between mb-10">
        <h3 class="text-xl font-black text-slate-900 tracking-tight">{{ $title }}</h3>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-slate-50 text-[10px] font-black text-slate-400 uppercase rounded-xl hover:bg-slate-900 hover:text-white transition-all">أسبوعي</button>
            <button class="px-4 py-2 bg-slate-900 text-[10px] font-black text-white uppercase rounded-xl">شهري</button>
        </div>
    </div>

    <div class="{{ $height }} w-full relative flex items-end justify-between gap-4">
        <!-- Decoration Grid -->
        <div class="absolute inset-0 flex flex-col justify-between -z-10">
            @for($i = 0; $i < 5; $i++)
                <div class="border-t border-slate-50 w-full h-px"></div>
            @endfor
        </div>

        @foreach([45, 65, 55, 85, 40, 95, 75, 60, 90, 50, 80, 70] as $h)
            <div class="flex-1 bg-slate-50 rounded-t-2xl hover:bg-cyan-500 cursor-pointer transition-all relative group/bar" style="height: {{ $h }}%">
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-slate-900 text-white text-[9px] font-black px-2 py-1 rounded opacity-0 group-hover/bar:opacity-100 transition-opacity whitespace-nowrap z-10">{{ $h }}%</div>
            </div>
        @endforeach
    </div>
</div>

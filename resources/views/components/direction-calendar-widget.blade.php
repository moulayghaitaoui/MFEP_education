<div class="bg-white rounded-[40px] p-8 border border-slate-100 shadow-sm h-full">
    <div class="flex items-center justify-between mb-8">
        <h3 class="text-xl font-black text-slate-900 tracking-tight">أجندة المديرية</h3>
        <button class="text-gov-green hover:text-gov-gold transition-colors"><i data-lucide="calendar" class="w-6 h-6"></i></button>
    </div>

    <div class="space-y-6">
        @foreach([
            ['day' => '14', 'month' => 'ماي', 'title' => 'اجتماع مع مدراء المعاهد', 'time' => '09:00 ص'],
            ['day' => '16', 'month' => 'ماي', 'title' => 'زيارة تفقيدية لمعهد سطيف', 'time' => '11:30 ص'],
            ['day' => '20', 'month' => 'ماي', 'title' => 'اليوم الدراسي للتكنولوجيا', 'time' => '08:00 ص'],
        ] as $event)
            <div class="flex items-center gap-6 group cursor-pointer hover:bg-gov-green/5 p-4 rounded-3xl transition-all border border-transparent hover:border-gov-green/10">
                <div class="flex flex-col items-center justify-center w-14 h-14 bg-slate-900 text-white rounded-2xl shadow-xl shadow-slate-900/10 group-hover:bg-gov-green transition-colors">
                    <span class="text-lg font-black leading-none group-hover:text-gov-gold transition-colors">{{ $event['day'] }}</span>
                    <span class="text-[8px] font-black uppercase tracking-widest mt-1">{{ $event['month'] }}</span>
                </div>
                <div>
                    <h4 class="text-xs font-black text-slate-900 group-hover:text-gov-green transition-colors">{{ $event['title'] }}</h4>
                    <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mt-1">{{ $event['time'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

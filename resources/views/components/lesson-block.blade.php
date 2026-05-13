@props(['type' => 'text', 'title' => ''])

<div {{ $attributes->merge(['class' => 'lesson-block mb-12 animate-fade-in']) }}>
    @if($title)
        <h3 class="text-2xl font-black text-slate-900 mb-6 tracking-tight">{{ $title }}</h3>
    @endif

    <div class="prose prose-slate max-w-none">
        @if($type == 'text')
            <div class="text-lg text-slate-600 leading-relaxed font-medium">
                {{ $slot }}
            </div>
        @elseif($type == 'video')
            <div class="aspect-video bg-slate-900 rounded-[40px] overflow-hidden shadow-2xl relative group">
                <div class="absolute inset-0 flex items-center justify-center">
                    <button class="w-20 h-20 bg-blue-600 text-white rounded-full flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform">
                        <i data-lucide="play" class="w-8 h-8 fill-current"></i>
                    </button>
                </div>
                <div class="absolute bottom-0 left-0 right-0 p-8 bg-gradient-to-t from-black/60 to-transparent flex items-center justify-between">
                     <span class="text-white font-black text-xs uppercase tracking-widest">فيديو شرح: مقدمة في المسار</span>
                     <span class="text-white/80 font-mono text-xs">12:45</span>
                </div>
            </div>
        @elseif($type == 'pdf')
            <div class="bg-slate-50 border-2 border-slate-100 rounded-[32px] p-8 flex items-center justify-between group hover:border-blue-200 transition-all">
                <div class="flex items-center gap-6">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-rose-500 shadow-sm"><i data-lucide="file-text" class="w-8 h-8"></i></div>
                    <div>
                        <p class="text-sm font-black text-slate-900">ملخص الوحدة الرابعة.pdf</p>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">2.4 ميجابايت • 12 صفحة</p>
                    </div>
                </div>
                <button class="bg-white text-slate-900 px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest border border-slate-100 hover:bg-blue-600 hover:text-white transition-all shadow-sm">تحميل الملف</button>
            </div>
        @endif
    </div>
</div>

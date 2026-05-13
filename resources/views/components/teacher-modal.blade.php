@props(['name', 'title'])

<div x-show="{{ $name }}" 
     x-cloak
     class="fixed inset-0 z-[100] flex items-center justify-center p-6 md:p-10"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100">
    
    <!-- Backdrop -->
    <div @click="{{ $name }} = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

    <!-- Content -->
    <div class="relative bg-white w-full max-w-2xl rounded-[48px] shadow-2xl overflow-hidden animate-fade-in-up">
        <div class="p-10 border-b border-slate-50 flex items-center justify-between">
            <h3 class="text-2xl font-black text-slate-900 tracking-tight">{{ $title }}</h3>
            <button @click="{{ $name }} = false" class="p-3 bg-slate-50 text-slate-400 hover:text-slate-900 rounded-2xl transition-all">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>
        <div class="p-10">
            {{ $slot }}
        </div>
    </div>
</div>

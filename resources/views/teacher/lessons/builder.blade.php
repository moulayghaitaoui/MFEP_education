@extends('layouts.teacher')

@section('title', 'منشئ الدروس التفاعلية - فضاء الأستاذ')

@section('content')
    <div x-data="{ 
        blocks: [
            { id: 1, type: 'text', content: 'مرحباً بك في هذا الدرس التفاعلي. سنقوم بشرح أساسيات البرمجة بلغة PHP.' },
            { id: 2, type: 'mcq', content: '' }
        ],
        showAddQuestion: false,
        previewMode: false
    }" class="max-w-5xl mx-auto">
        
        <!-- Builder Header -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8 mb-12 animate-fade-in">
            <div class="flex items-center gap-6">
                <a href="{{ route('teacher.lessons') }}" class="w-14 h-14 bg-white border border-slate-200 rounded-2xl flex items-center justify-center text-slate-400 hover:text-indigo-600 transition-all shadow-sm">
                    <i data-lucide="arrow-right" class="w-6 h-6"></i>
                </a>
                <div>
                    <div class="flex items-center gap-3 mb-1">
                        <h1 class="text-3xl font-black text-slate-900 tracking-tighter">بناء درس تفاعلي</h1>
                        <span class="px-2 py-0.5 bg-emerald-100 text-emerald-600 text-[8px] font-black rounded uppercase tracking-widest">محفوظ تلقائياً</span>
                    </div>
                    <p class="text-slate-400 font-medium italic">ادمج الشرح بالأسئلة لزيادة تفاعل المتربصين.</p>
                </div>
            </div>
            <div class="flex gap-4">
                 <button @click="previewMode = !previewMode" :class="previewMode ? 'bg-slate-900 text-white' : 'bg-white text-slate-900'" class="px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest border border-slate-200 shadow-sm transition-all flex items-center gap-3">
                    <i data-lucide="eye" class="w-4 h-4"></i>
                    <span x-text="previewMode ? 'العودة للمحرر' : 'معاينة الدرس'"></span>
                 </button>
                 <button class="bg-indigo-600 text-white px-8 py-4 rounded-2xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 transition-all">نشر الدرس</button>
            </div>
        </div>

        <!-- Toolbar -->
        <div x-show="!previewMode" x-transition>
            <x-lesson-editor-toolbar />
        </div>

        <!-- Editor Surface -->
        <div :class="previewMode ? 'bg-white p-16 rounded-[60px] shadow-2xl border border-slate-50' : 'bg-transparent'" class="transition-all duration-700">
            
            <!-- Title Area -->
            <div class="mb-12">
                 <input type="text" placeholder="عنوان الدرس التفاعلي..." class="w-full bg-transparent border-none p-0 text-5xl font-black text-slate-900 focus:ring-0 outline-none placeholder:text-slate-200 tracking-tighter">
                 <div class="h-1.5 w-32 bg-indigo-600 mt-6 rounded-full"></div>
            </div>

            <!-- Dynamic Blocks -->
            <div class="space-y-4">
                <template x-for="(block, index) in blocks" :key="block.id">
                    <div>
                        <!-- Text Block -->
                        <template x-if="block.type === 'text'">
                            <div class="group relative py-4">
                                <div x-show="!previewMode" class="absolute -right-12 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button @click="blocks = blocks.filter(b => b.id !== block.id)" class="text-slate-300 hover:text-rose-500"><i data-lucide="trash-2" class="w-5 h-5"></i></button>
                                </div>
                                <textarea x-model="block.content" @input="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px'" 
                                          class="w-full bg-transparent border-none p-0 text-xl font-bold text-slate-600 focus:ring-0 outline-none resize-none leading-relaxed placeholder:text-slate-200"
                                          placeholder="ابدأ الكتابة هنا..."></textarea>
                            </div>
                        </template>

                        <!-- Question Block -->
                        <template x-if="['mcq', 'tf', 'essay'].includes(block.type)">
                            <div>
                                <x-inline-question />
                            </div>
                        </template>
                    </div>
                </template>

                <!-- New Block Trigger -->
                <div x-show="!previewMode" class="py-12 border-t border-slate-100 mt-12 flex justify-center">
                    <button @click="blocks.push({id: Date.now(), type: 'text', content: ''})" class="text-slate-300 hover:text-indigo-600 transition-all flex items-center gap-3 group">
                        <i data-lucide="plus" class="w-6 h-6 group-hover:rotate-90 transition-transform"></i>
                        <span class="text-xs font-black uppercase tracking-widest">إضافة فقرة جديدة</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Add Question Modal -->
        <x-teacher-modal name="showAddQuestion" title="إدراج سؤال تفاعلي">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach([
                    ['type' => 'mcq', 'label' => 'اختيار من متعدد', 'icon' => 'list-checks', 'desc' => 'عدة خيارات وإجابة واحدة صحيحة'],
                    ['type' => 'tf', 'label' => 'صح أو خطأ', 'icon' => 'check-circle-2', 'desc' => 'إجابة مباشرة وسريعة'],
                    ['type' => 'essay', 'label' => 'سؤال نصي', 'icon' => 'file-text', 'desc' => 'مساحة كتابة حرة للمتربص'],
                ] as $qType)
                    <button @click="blocks.push({id: Date.now(), type: '{{ $qType['type'] }}', content: ''}); showAddQuestion = false" 
                            class="p-8 bg-slate-50 rounded-[32px] border border-transparent hover:border-indigo-100 hover:bg-white hover:shadow-xl transition-all group text-right">
                        <div class="w-12 h-12 bg-indigo-600 text-white rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-indigo-600/20 group-hover:scale-110 transition-transform">
                            <i data-lucide="{{ $qType['icon'] }}" class="w-6 h-6"></i>
                        </div>
                        <h4 class="text-lg font-black text-slate-900 mb-2">{{ $qType['label'] }}</h4>
                        <p class="text-[10px] font-bold text-slate-400 uppercase leading-relaxed">{{ $qType['desc'] }}</p>
                    </button>
                @endforeach
            </div>
        </x-teacher-modal>

        <!-- Preview Indicator -->
        <div x-show="previewMode" x-transition class="fixed bottom-10 left-1/2 -translate-x-1/2 bg-slate-900 text-white px-10 py-5 rounded-full shadow-2xl z-50 flex items-center gap-6 border border-white/10 backdrop-blur-xl">
             <div class="flex items-center gap-3">
                <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                <span class="text-xs font-black uppercase tracking-widest">وضع المعاينة النشط</span>
             </div>
             <div class="w-px h-6 bg-white/10"></div>
             <button @click="previewMode = false" class="text-[10px] font-black text-indigo-400 hover:text-white transition-colors uppercase tracking-widest">إغلاق المعاينة</button>
        </div>
    </div>
@endsection

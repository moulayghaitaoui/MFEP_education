@extends('layouts.student')

@section('title', 'مشاهدة الدرس - رحلة التعلم')

@section('content')
    <div class="flex flex-col xl:flex-row gap-12">
        <!-- Main Video Area -->
        <div class="flex-1 space-y-10">
            <!-- Video Player -->
            <div class="bg-slate-900 rounded-[48px] overflow-hidden aspect-video relative shadow-2xl shadow-slate-900/40 group border-4 border-white">
                <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover opacity-60" alt="">
                
                <div class="absolute inset-0 flex items-center justify-center">
                    <button class="w-24 h-24 bg-blue-600 rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-transform shadow-blue-600/40 border-4 border-white/20">
                        <i data-lucide="play" class="w-10 h-10 text-white fill-white ml-1"></i>
                    </button>
                </div>

                <div class="absolute bottom-10 left-10 right-10 flex items-center justify-between opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="flex items-center gap-6">
                        <button class="text-white hover:text-blue-400 transition-colors"><i data-lucide="rotate-ccw" class="w-6 h-6"></i></button>
                        <span class="text-[10px] font-black text-white/80 font-mono">15:20 / 45:00</span>
                    </div>
                    <div class="flex items-center gap-6">
                        <button class="text-white hover:text-blue-400 transition-colors"><i data-lucide="settings" class="w-6 h-6"></i></button>
                        <button class="text-white hover:text-blue-400 transition-colors"><i data-lucide="maximize-2" class="w-6 h-6"></i></button>
                    </div>
                </div>
                
                <div class="absolute bottom-0 left-0 right-0 h-1.5 bg-white/10">
                    <div class="h-full bg-blue-600 w-[33%] shadow-[0_0_15px_rgba(37,99,235,0.8)]"></div>
                </div>
            </div>

            <!-- Lesson Details -->
            <x-student-card padding="p-10">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10 pb-10 border-b border-slate-50">
                    <div class="space-y-2">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[9px] font-black rounded-lg uppercase tracking-widest">الوحدة الرابعة</span>
                            <span class="text-[9px] font-bold text-slate-400">نشر في 12 ماي 2024</span>
                        </div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">هيكلية مشروع Laravel وكيفية التعامل مع الملفات</h2>
                    </div>
                    <div class="flex gap-3">
                         <button class="p-4 bg-slate-50 text-slate-400 hover:bg-blue-50 hover:text-blue-600 rounded-2xl transition-all border border-slate-100">
                            <i data-lucide="bookmark" class="w-6 h-6"></i>
                         </button>
                         <button class="px-8 py-4 bg-emerald-500 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-xl shadow-emerald-500/20 hover:bg-emerald-600 transition-all flex items-center gap-2">
                            <i data-lucide="check-circle" class="w-4 h-4"></i>
                            إكمال الدرس
                         </button>
                    </div>
                </div>

                <div class="prose prose-slate max-w-none mb-12">
                    <p class="text-slate-600 font-bold leading-relaxed text-lg">في هذا الدرس سنقوم بجولة تفصيلية داخل بنية مجلدات إطار العمل Laravel. سنتعرف على أهمية كل مجلد وكيفية تنظيم الكود المصدري لضمان سهولة الصيانة والتوسع في المستقبل.</p>
                </div>

                <!-- Downloads Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100 flex items-center justify-between group hover:bg-white hover:border-blue-200 transition-all cursor-pointer">
                        <div class="flex items-center gap-6">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-rose-500 shadow-sm group-hover:bg-rose-50 transition-colors">
                                <i data-lucide="file-text" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <p class="text-sm font-black text-slate-900">ملخص الوحدة (PDF)</p>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">2.4 MB</p>
                            </div>
                        </div>
                        <i data-lucide="download" class="w-5 h-5 text-slate-300 group-hover:text-blue-600 transition-colors"></i>
                    </div>
                    
                    <div class="p-6 bg-slate-50 rounded-3xl border border-slate-100 flex items-center justify-between group hover:bg-white hover:border-blue-200 transition-all cursor-pointer">
                        <div class="flex items-center gap-6">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-indigo-600 shadow-sm group-hover:bg-indigo-50 transition-colors">
                                <i data-lucide="code-2" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <p class="text-sm font-black text-slate-900">أمثلة برمجية (Zip)</p>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">15 MB</p>
                            </div>
                        </div>
                        <i data-lucide="download" class="w-5 h-5 text-slate-300 group-hover:text-blue-600 transition-colors"></i>
                    </div>
                </div>
            </x-student-card>
        </div>

        <!-- Sidebar: Course Content -->
        <div class="w-full xl:w-[400px]">
            <x-student-card padding="p-0" class="flex flex-col h-[calc(100vh-14rem)] sticky top-32">
                <div class="p-8 border-b border-slate-50 bg-slate-50/30">
                    <h3 class="text-xl font-black text-slate-900 tracking-tight mb-2">محتوى الدورة</h3>
                    <div class="flex items-center justify-between text-[10px] font-black uppercase tracking-widest text-slate-400">
                        <span>12 درس • 8 ساعات</span>
                        <span class="text-blue-600">35% مكتمل</span>
                    </div>
                </div>
                
                <div class="flex-1 overflow-y-auto custom-scrollbar p-4 space-y-3">
                    @foreach([
                        ['title' => 'مقدمة في بيئة العمل', 'time' => '12:00', 'status' => 'completed'],
                        ['title' => 'تثبيت Laravel و Composer', 'time' => '45:30', 'status' => 'completed'],
                        ['title' => 'بنية المجلدات والملفات', 'time' => '32:15', 'status' => 'active'],
                        ['title' => 'أساسيات الـ MVC في Laravel', 'time' => '45:00', 'status' => 'locked'],
                        ['title' => 'التعامل مع الـ Routes', 'time' => '55:20', 'status' => 'locked'],
                        ['title' => 'قواعد البيانات و Migrations', 'time' => '1:15:00', 'status' => 'locked'],
                    ] as $lesson)
                        <div @class([
                            'p-5 rounded-[24px] border transition-all cursor-pointer group flex items-center gap-4',
                            'bg-slate-900 border-slate-900 shadow-xl shadow-slate-900/20' => $lesson['status'] == 'active',
                            'bg-white border-slate-50 hover:border-blue-100' => $lesson['status'] != 'active'
                        ])>
                            <div @class([
                                'w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0',
                                'bg-white/10 text-white' => $lesson['status'] == 'active',
                                'bg-emerald-50 text-emerald-500' => $lesson['status'] == 'completed',
                                'bg-slate-50 text-slate-300' => $lesson['status'] == 'locked',
                            ])>
                                <i data-lucide="{{ $lesson['status'] == 'completed' ? 'check-circle' : ($lesson['status'] == 'locked' ? 'lock' : 'play') }}" class="w-4 h-4"></i>
                            </div>
                            <div class="flex-1 overflow-hidden">
                                <p @class([
                                    'text-[11px] font-black truncate',
                                    'text-white' => $lesson['status'] == 'active',
                                    'text-slate-800' => $lesson['status'] != 'active',
                                ])>{{ $lesson['title'] }}</p>
                                <span @class([
                                    'text-[9px] font-bold uppercase tracking-widest mt-1 block',
                                    'text-white/60' => $lesson['status'] == 'active',
                                    'text-slate-400' => $lesson['status'] != 'active',
                                ])>{{ $lesson['time'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="p-6 border-t border-slate-50">
                    <a href="{{ route('student.quizzes', ['id' => 1]) }}" class="w-full py-4 bg-blue-600 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-700 transition-all shadow-xl shadow-blue-500/30 flex items-center justify-center gap-3">
                        بدء اختبار الوحدة
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    </a>
                </div>
            </x-student-card>
        </div>
    </div>
@endsection

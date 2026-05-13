@extends('layouts.app')

@section('title', 'مشاهدة الدرس - رحلة التعلم')

@section('content')
    <div class="flex flex-col lg:flex-row gap-10">
        <!-- Main Learning Area -->
        <div class="flex-1 space-y-10">
            <!-- Video Player (Custom Styled) -->
            <div class="bg-slate-900 rounded-[48px] overflow-hidden aspect-video relative shadow-2xl shadow-blue-900/20 group">
                <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover opacity-60" alt="">
                
                <!-- Play Overlay -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <button class="w-24 h-24 bg-blue-600 rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-transform shadow-blue-600/40">
                        <i data-lucide="play" class="w-10 h-10 text-white fill-white ml-1"></i>
                    </button>
                </div>

                <!-- Custom Controls Placeholder -->
                <div class="absolute bottom-10 left-10 right-10 flex items-center justify-between opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="flex items-center gap-6">
                        <button class="text-white hover:text-blue-400 transition-colors"><i data-lucide="skip-back" class="w-6 h-6"></i></button>
                        <button class="text-white hover:text-blue-400 transition-colors"><i data-lucide="volume-2" class="w-6 h-6"></i></button>
                        <span class="text-xs font-black text-white/80 font-mono">12:45 / 45:00</span>
                    </div>
                    <div class="flex items-center gap-6">
                        <button class="text-white hover:text-blue-400 transition-colors"><i data-lucide="settings" class="w-6 h-6"></i></button>
                        <button class="text-white hover:text-blue-400 transition-colors"><i data-lucide="maximize" class="w-6 h-6"></i></button>
                    </div>
                </div>
                
                <!-- Progress Bar -->
                <div class="absolute bottom-0 left-0 right-0 h-1.5 bg-white/20">
                    <div class="h-full bg-blue-600 w-[28%] relative">
                        <div class="absolute top-1/2 -right-2 -translate-y-1/2 w-4 h-4 bg-white rounded-full shadow-lg scale-0 group-hover:scale-100 transition-transform"></div>
                    </div>
                </div>
            </div>

            <!-- Lesson Info -->
            <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
                    <div class="space-y-2">
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight">الوحدة 4: أساسيات الـ MVC في Laravel</h2>
                        <div class="flex items-center gap-4 text-xs font-bold text-slate-400 uppercase tracking-widest">
                            <span class="text-blue-600">بواسطة أ. توفيق بوزيد</span>
                            <span>•</span>
                            <span>تم النشر في 12 ماي 2024</span>
                        </div>
                    </div>
                    <div class="flex gap-3">
                         <button class="p-4 bg-slate-50 text-slate-400 hover:bg-blue-50 hover:text-blue-600 rounded-2xl transition-all">
                            <i data-lucide="share-2" class="w-6 h-6"></i>
                         </button>
                         <button class="p-4 bg-slate-50 text-slate-400 hover:bg-blue-50 hover:text-blue-600 rounded-2xl transition-all">
                            <i data-lucide="bookmark" class="w-6 h-6"></i>
                         </button>
                    </div>
                </div>

                <div class="space-y-6">
                    <p class="text-slate-600 font-bold leading-relaxed">في هذا الدرس، سنقوم بشرح مفهوم Model-View-Controller بالتفصيل، وكيف يقوم Laravel بتنظيم الملفات لضمان سهولة الصيانة والتوسع في التطبيقات الكبيرة. سنبدأ بإنشاء أول Route ثم التحكم به من خلال Controller.</p>
                </div>
                
                <div class="pt-10 mt-10 border-t border-slate-50 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="p-6 bg-blue-50/50 rounded-3xl border border-blue-100 flex items-center gap-6 group hover:bg-blue-50 transition-all cursor-pointer">
                        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-blue-600 shadow-sm">
                            <i data-lucide="file-text" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-sm font-black text-slate-900">ملخص الدرس (PDF)</p>
                            <p class="text-[10px] font-bold text-slate-400 uppercase">تحميل المستند المرافق</p>
                        </div>
                    </div>
                    <div class="p-6 bg-slate-50/50 rounded-3xl border border-slate-100 flex items-center gap-6 group hover:bg-white transition-all cursor-pointer">
                        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-slate-400 group-hover:text-blue-600 shadow-sm transition-colors">
                            <i data-lucide="code" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-sm font-black text-slate-900">الكود المصدري</p>
                            <p class="text-[10px] font-bold text-slate-400 uppercase">رابط GitHub للمشروع</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Playlist Sidebar -->
        <div class="w-full lg:w-96 space-y-8">
            <div class="bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden flex flex-col h-[calc(100vh-12rem)]">
                <div class="p-8 border-b border-slate-100">
                    <h3 class="text-xl font-black text-slate-900 tracking-tight mb-2">محتوى الدورة</h3>
                    <div class="flex items-center justify-between">
                         <span class="text-[10px] font-black text-blue-600 uppercase tracking-widest">12 درس • 8 ساعات</span>
                         <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">مكتمل 4/12</span>
                    </div>
                </div>
                
                <div class="flex-1 overflow-y-auto custom-scrollbar p-4 space-y-3 bg-slate-50/30">
                    @foreach([
                        ['title' => 'مقدمة في بيئة العمل', 'time' => '12:00', 'status' => 'completed'],
                        ['title' => 'تثبيت Laravel و Composer', 'time' => '45:30', 'status' => 'completed'],
                        ['title' => 'بنية المجلدات والملفات', 'time' => '32:15', 'status' => 'completed'],
                        ['title' => 'أساسيات الـ MVC في Laravel', 'time' => '45:00', 'status' => 'active'],
                        ['title' => 'التعامل مع الـ Routes والـ Views', 'time' => '55:20', 'status' => 'locked'],
                        ['title' => 'قواعد البيانات و Eloquent ORM', 'time' => '1:15:00', 'status' => 'locked'],
                        ['title' => 'بناء أنظمة تسجيل الدخول', 'time' => '58:45', 'status' => 'locked'],
                        ['title' => 'رفع الموقع على السيرفر', 'time' => '40:10', 'status' => 'locked'],
                    ] as $lesson)
                        <div @class([
                            'p-5 rounded-[24px] border transition-all cursor-pointer group',
                            'bg-blue-600 border-blue-600 shadow-xl shadow-blue-500/20' => $lesson['status'] == 'active',
                            'bg-white border-slate-100 hover:border-blue-200' => $lesson['status'] != 'active'
                        ])>
                            <div class="flex items-center gap-4">
                                <div @class([
                                    'w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0',
                                    'bg-white/20 text-white' => $lesson['status'] == 'active',
                                    'bg-emerald-50 text-emerald-600' => $lesson['status'] == 'completed',
                                    'bg-slate-50 text-slate-300' => $lesson['status'] == 'locked',
                                ])>
                                    <i data-lucide="{{ $lesson['status'] == 'completed' ? 'check-circle' : ($lesson['status'] == 'locked' ? 'lock' : 'play-circle') }}" class="w-4 h-4"></i>
                                </div>
                                <div class="flex-1">
                                    <p @class([
                                        'text-[11px] font-black tracking-tight leading-tight',
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
                        </div>
                    @endforeach
                </div>
                
                <div class="p-6 bg-slate-900 border-t border-white/5">
                    <a href="{{ route('student.quiz', ['id' => 1]) }}" class="flex items-center justify-center gap-3 w-full py-4 bg-blue-600 text-white rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-700 transition-all shadow-xl shadow-blue-500/20">
                        اجراء الاختبار التجريبي
                        <i data-lucide="chevron-left" class="w-3 h-3"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

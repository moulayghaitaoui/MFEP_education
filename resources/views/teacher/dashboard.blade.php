@extends('layouts.app')

@section('title', 'لوحة تحكم الأستاذ - بوابتك للتميز')

@section('content')
    <!-- Welcome Header -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-12">
        <div class="space-y-2">
            <h1 class="text-4xl font-black text-slate-900 tracking-tighter">مرحباً بك مجدداً، أستاذ توفيق</h1>
            <p class="text-slate-500 font-medium text-lg">لديك 3 حصص مجدولة لليوم و 12 طلباً جديداً للمراجعة.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-indigo-600 text-white px-8 py-4 rounded-[20px] font-bold text-sm shadow-xl shadow-indigo-500/20 hover:bg-indigo-700 transition-all flex items-center gap-3">
                <i data-lucide="plus-circle" class="w-5 h-5"></i>
                إضافة محتوى جديد
            </button>
        </div>
    </div>

    <!-- Instructor Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        @foreach([
            ['label' => 'إجمالي الطلاب', 'value' => '1,280', 'icon' => 'users', 'color' => 'indigo', 'trend' => '+12%'],
            ['label' => 'مشاهدات الدروس', 'value' => '45.2k', 'icon' => 'play-circle', 'color' => 'emerald', 'trend' => '+5.4%'],
            ['label' => 'تقييم الأستاذ', 'value' => '4.9/5', 'icon' => 'star', 'color' => 'amber', 'trend' => 'ثابت'],
            ['label' => 'الأرباح المحققة', 'value' => '12.5k', 'icon' => 'banknote', 'color' => 'rose', 'trend' => '+8%'],
        ] as $stat)
            <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-sm relative overflow-hidden group hover:shadow-xl transition-all duration-500">
                <div @class([
                    'absolute -top-10 -left-10 w-32 h-32 opacity-5 rounded-full',
                    'bg-indigo-600' => $stat['color'] == 'indigo',
                    'bg-emerald-600' => $stat['color'] == 'emerald',
                    'bg-amber-600' => $stat['color'] == 'amber',
                    'bg-rose-600' => $stat['color'] == 'rose',
                ])></div>
                
                <div class="flex items-center justify-between mb-6 relative z-10">
                    <div @class([
                        'w-14 h-14 rounded-2xl flex items-center justify-center',
                        'bg-indigo-50 text-indigo-600' => $stat['color'] == 'indigo',
                        'bg-emerald-50 text-emerald-600' => $stat['color'] == 'emerald',
                        'bg-amber-50 text-amber-600' => $stat['color'] == 'amber',
                        'bg-rose-50 text-rose-600' => $stat['color'] == 'rose',
                    ])>
                        <i data-lucide="{{ $stat['icon'] }}" class="w-7 h-7"></i>
                    </div>
                    <span class="text-[10px] font-black px-2 py-1 bg-slate-50 text-slate-400 rounded-lg">{{ $stat['trend'] }}</span>
                </div>
                
                <h3 class="text-3xl font-black text-slate-900 tracking-tighter mb-1">{{ $stat['value'] }}</h3>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ $stat['label'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-10">
        <!-- Courses & Progress -->
        <div class="xl:col-span-2 space-y-10">
            <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm">
                <div class="flex items-center justify-between mb-10">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight">إدارة دوراتي التعليمية</h3>
                    <button class="text-indigo-600 font-black text-xs uppercase tracking-widest hover:underline">عرض جميع الدورات</button>
                </div>
                
                <div class="space-y-8">
                    @foreach([
                        ['title' => 'أساسيات تطوير الويب الحديث', 'students' => 450, 'progress' => 85, 'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=300&h=180&auto=format&fit=crop'],
                        ['title' => 'برمجة تطبيقات الهاتف باستخدام Flutter', 'students' => 320, 'progress' => 42, 'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=300&h=180&auto=format&fit=crop'],
                        ['title' => 'تصميم واجهات المستخدم UI/UX', 'students' => 510, 'progress' => 12, 'image' => 'https://images.unsplash.com/photo-1586717791821-3f44a563eb4c?q=80&w=300&h=180&auto=format&fit=crop'],
                    ] as $course)
                        <div class="flex flex-col md:flex-row items-center gap-8 group">
                            <div class="w-full md:w-48 h-28 rounded-2xl overflow-hidden flex-shrink-0 relative">
                                <img src="{{ $course['image'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="">
                                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
                            </div>
                            <div class="flex-1 space-y-3">
                                <h4 class="text-lg font-black text-slate-800 group-hover:text-indigo-600 transition-colors">{{ $course['title'] }}</h4>
                                <div class="flex items-center gap-6 text-xs font-bold text-slate-400 uppercase tracking-widest">
                                    <span class="flex items-center gap-2"><i data-lucide="users" class="w-4 h-4"></i> {{ $course['students'] }} طالب</span>
                                    <span class="flex items-center gap-2"><i data-lucide="video" class="w-4 h-4"></i> 24 درس</span>
                                </div>
                                <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-indigo-600 rounded-full" style="width: {{ $course['progress'] }}%"></div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <button class="p-3 bg-slate-50 text-slate-400 hover:bg-indigo-50 hover:text-indigo-600 rounded-2xl transition-all"><i data-lucide="edit-3" class="w-5 h-5"></i></button>
                                <button class="p-3 bg-slate-50 text-slate-400 hover:bg-slate-100 rounded-2xl transition-all"><i data-lucide="bar-chart" class="w-5 h-5"></i></button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Student Feedback / Reviews -->
            <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm">
                <h3 class="text-2xl font-black text-slate-900 tracking-tight mb-10">آخر تقييمات الطلاب</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach([
                        ['name' => 'ياسين أحمد', 'review' => 'شرح ممتاز جداً ومبسط، شكراً أستاذ على المجهود الرائع في كورس الفلاتر.', 'rating' => 5],
                        ['name' => 'سارة كمال', 'review' => 'الدورة غنية بالمعلومات التطبيقية، أتمنى إضافة المزيد من المشاريع العملية.', 'rating' => 4],
                    ] as $review)
                        <div class="p-6 bg-slate-50 rounded-[32px] border border-slate-100 relative">
                            <i data-lucide="quote" class="absolute top-6 left-6 w-12 h-12 text-slate-200 opacity-20"></i>
                            <div class="flex items-center gap-2 mb-4">
                                @for($i=0; $i<$review['rating']; $i++) <i data-lucide="star" class="w-3 h-3 text-amber-400 fill-amber-400"></i> @endfor
                            </div>
                            <p class="text-sm font-bold text-slate-600 leading-relaxed mb-4">{{ $review['review'] }}</p>
                            <p class="text-xs font-black text-slate-900 uppercase tracking-widest">{{ $review['name'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sidebar Components -->
        <div class="space-y-10">
            <!-- Scheduled Sessions (Calendar UI) -->
            <div class="bg-indigo-900 rounded-[40px] p-10 text-white shadow-2xl relative overflow-hidden shadow-indigo-900/40">
                <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
                <h3 class="text-xl font-black mb-8 relative z-10">الحصص القادمة</h3>
                <div class="space-y-6 relative z-10">
                    @foreach([
                        ['time' => '10:00 AM', 'title' => 'مباشر: مراجعة المشروع النهائي', 'type' => 'Live'],
                        ['time' => '02:30 PM', 'title' => 'مناقشة: أمن المعلومات', 'type' => 'Workshop'],
                    ] as $session)
                        <div class="flex gap-4 group cursor-pointer">
                            <div class="text-right">
                                <p class="text-[10px] font-black text-indigo-300 uppercase tracking-widest">{{ $session['time'] }}</p>
                                <p class="text-sm font-bold mt-1 group-hover:text-indigo-200 transition-colors">{{ $session['title'] }}</p>
                            </div>
                            <div class="w-1.5 h-12 bg-white/20 rounded-full overflow-hidden flex-shrink-0">
                                <div class="w-full bg-indigo-400 h-1/2"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="w-full mt-10 py-4 bg-white/10 hover:bg-white/20 border border-white/10 rounded-2xl text-xs font-black uppercase tracking-[0.2em] transition-all">
                    عرض الجدول الكامل
                </button>
            </div>

            <!-- Teaching Resources -->
            <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm">
                <h3 class="text-2xl font-black text-slate-900 tracking-tight mb-8">ملفاتي التعليمية</h3>
                <div class="space-y-4">
                    @foreach([
                        ['name' => 'Lecture_Notes.pdf', 'size' => '2.4 MB', 'icon' => 'file-text', 'color' => 'blue'],
                        ['name' => 'Project_Source.zip', 'size' => '45.1 MB', 'icon' => 'file-archive', 'color' => 'amber'],
                        ['name' => 'Intro_Video.mp4', 'size' => '120.0 MB', 'icon' => 'video', 'color' => 'emerald'],
                    ] as $file)
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-slate-100 group hover:border-indigo-200 transition-all">
                            <div class="flex items-center gap-3">
                                <div @class([
                                    'w-10 h-10 rounded-xl flex items-center justify-center',
                                    'bg-blue-50 text-blue-600' => $file['color'] == 'blue',
                                    'bg-amber-50 text-amber-600' => $file['color'] == 'amber',
                                    'bg-emerald-50 text-emerald-600' => $file['color'] == 'emerald',
                                ])>
                                    <i data-lucide="{{ $file['icon'] }}" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-black text-slate-800 line-clamp-1">{{ $file['name'] }}</p>
                                    <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">{{ $file['size'] }}</p>
                                </div>
                            </div>
                            <button class="p-2 text-slate-300 hover:text-indigo-600"><i data-lucide="download" class="w-4 h-4"></i></button>
                        </div>
                    @endforeach
                </div>
                <button class="w-full mt-8 py-3 rounded-xl border border-dashed border-slate-200 text-xs font-black text-slate-400 hover:bg-slate-50 transition-all">
                    إدارة المستندات
                </button>
            </div>
        </div>
    </div>
@endsection

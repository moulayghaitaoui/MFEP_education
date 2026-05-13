@extends('layouts.app')

@section('title', 'قائمة كورساتي - فضاء المتربص')

@section('content')
    <div x-data="{ category: 'all' }">
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-4">كورساتي التعليمية</h1>
            <p class="text-slate-500 font-medium text-lg">تصفح وتابع جميع الدورات التدريبية المسجل بها.</p>
        </div>

        <!-- Filter Tabs -->
        <div class="flex items-center gap-2 mb-12 bg-white p-2 rounded-[24px] border border-slate-100 shadow-sm w-fit">
            <button @click="category = 'all'" :class="category === 'all' ? 'bg-slate-900 text-white' : 'text-slate-500 hover:bg-slate-50'" class="px-8 py-3 rounded-[18px] text-xs font-black transition-all">الكل</button>
            <button @click="category = 'ongoing'" :class="category === 'ongoing' ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/20' : 'text-slate-500 hover:bg-slate-50'" class="px-8 py-3 rounded-[18px] text-xs font-black transition-all">قيد الدراسة</button>
            <button @click="category = 'completed'" :class="category === 'completed' ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-500/20' : 'text-slate-500 hover:bg-slate-50'" class="px-8 py-3 rounded-[18px] text-xs font-black transition-all">مكتملة</button>
        </div>

        <!-- Course Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach([
                ['id' => 1, 'title' => 'برمجة الويب باستخدام Laravel', 'instructor' => 'أ. توفيق بوزيد', 'progress' => 68, 'status' => 'ongoing', 'image' => 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=600&auto=format&fit=crop'],
                ['id' => 2, 'title' => 'تصميم واجهات المستخدم UI/UX', 'instructor' => 'أ. ليلى كمال', 'progress' => 100, 'status' => 'completed', 'image' => 'https://images.unsplash.com/photo-1586717791821-3f44a563eb4c?q=80&w=600&auto=format&fit=crop'],
                ['id' => 3, 'title' => 'أمن المعلومات والشبكات', 'instructor' => 'أ. سليم محمودي', 'progress' => 25, 'status' => 'ongoing', 'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=600&auto=format&fit=crop'],
                ['id' => 4, 'title' => 'تطوير تطبيقات Flutter', 'instructor' => 'أ. كريم زدام', 'progress' => 10, 'status' => 'ongoing', 'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=600&auto=format&fit=crop'],
                ['id' => 5, 'title' => 'قواعد البيانات SQL المتقدمة', 'instructor' => 'أ. نوال زيتوني', 'progress' => 100, 'status' => 'completed', 'image' => 'https://images.unsplash.com/photo-1544383835-bda2bc66a55d?q=80&w=600&auto=format&fit=crop'],
            ] as $course)
                <div x-show="category === 'all' || category === '{{ $course['status'] }}'" class="bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden group hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 relative">
                    <div class="h-52 relative overflow-hidden">
                        <img src="{{ $course['image'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute top-6 left-6">
                            <span @class([
                                'px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest',
                                'bg-emerald-500 text-white shadow-lg shadow-emerald-500/20' => $course['status'] == 'completed',
                                'bg-blue-600 text-white shadow-lg shadow-blue-500/20' => $course['status'] == 'ongoing',
                            ])>
                                {{ $course['status'] == 'completed' ? 'مكتمل' : 'مستمر' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-8">
                        <h3 class="text-xl font-black text-slate-900 mb-2 leading-tight group-hover:text-blue-600 transition-colors">{{ $course['title'] }}</h3>
                        <p class="text-xs font-bold text-slate-400 mb-8">{{ $course['instructor'] }}</p>
                        
                        <div class="space-y-3 mb-10">
                            <div class="flex justify-between text-[10px] font-black uppercase tracking-widest text-slate-400">
                                <span>التقدم في الدراسة</span>
                                <span class="text-slate-900">{{ $course['progress'] }}%</span>
                            </div>
                            <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                <div @class([
                                    'h-full rounded-full transition-all duration-1000',
                                    'bg-emerald-500' => $course['status'] == 'completed',
                                    'bg-blue-600' => $course['status'] == 'ongoing',
                                ]) style="width: {{ $course['progress'] }}%"></div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3">
                             <a href="{{ route('student.learning', ['id' => $course['id']]) }}" class="flex-1 bg-slate-900 text-white text-center py-4 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-blue-600 transition-all shadow-xl shadow-slate-900/10">
                                {{ $course['status'] == 'completed' ? 'مراجعة الكورس' : 'مواصلة التعلم' }}
                             </a>
                             <button class="w-14 h-14 border border-slate-100 rounded-2xl flex items-center justify-center hover:bg-slate-50 transition-all">
                                <i data-lucide="info" class="w-5 h-5 text-slate-400"></i>
                             </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

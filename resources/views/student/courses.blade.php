@extends('layouts.student')

@section('title', 'كورساتي - فضاء المتربص')

@section('content')
    <div x-data="{ category: 'ongoing' }">
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-4">مسيرتي التعليمية</h1>
            <p class="text-slate-500 font-medium text-lg">تصفح وتابع جميع الدورات التدريبية المسجل بها حالياً.</p>
        </div>

        <!-- Filter Tabs -->
        <div class="flex items-center gap-3 mb-12 bg-white p-2 rounded-[24px] border border-slate-100 shadow-sm w-fit">
            <button @click="category = 'ongoing'" :class="category === 'ongoing' ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/20' : 'text-slate-500 hover:bg-slate-50'" class="px-8 py-3 rounded-[18px] text-[10px] font-black uppercase tracking-widest transition-all">قيد الدراسة</button>
            <button @click="category = 'completed'" :class="category === 'completed' ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-500/20' : 'text-slate-500 hover:bg-slate-50'" class="px-8 py-3 rounded-[18px] text-[10px] font-black uppercase tracking-widest transition-all">الدورات المكتملة</button>
            <button @click="category = 'wishlist'" :class="category === 'wishlist' ? 'bg-slate-900 text-white shadow-lg shadow-slate-900/20' : 'text-slate-500 hover:bg-slate-50'" class="px-8 py-3 rounded-[18px] text-[10px] font-black uppercase tracking-widest transition-all">المفضلة</button>
        </div>

        <!-- Course Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach([
                ['id' => 1, 'title' => 'برمجة الويب باستخدام Laravel', 'instructor' => 'أ. توفيق بوزيد', 'progress' => 68, 'category' => 'ongoing', 'image' => 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=600&auto=format&fit=crop'],
                ['id' => 2, 'title' => 'تصميم واجهات المستخدم UI/UX', 'instructor' => 'أ. ليلى كمال', 'progress' => 100, 'category' => 'completed', 'image' => 'https://images.unsplash.com/photo-1586717791821-3f44a563eb4c?q=80&w=600&auto=format&fit=crop'],
                ['id' => 3, 'title' => 'أمن المعلومات والشبكات', 'instructor' => 'أ. سليم محمودي', 'progress' => 25, 'category' => 'ongoing', 'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=600&auto=format&fit=crop'],
            ] as $course)
                <div x-show="category === '{{ $course['category'] }}'" 
                     x-transition
                     class="bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden group hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 relative">
                    
                    <div class="h-56 relative overflow-hidden">
                        <img src="{{ $course['image'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
                        <div class="absolute top-6 left-6">
                            <span @class([
                                'px-3 py-1 rounded-lg text-[9px] font-black uppercase tracking-widest text-white shadow-lg',
                                'bg-emerald-500 shadow-emerald-500/20' => $course['category'] == 'completed',
                                'bg-blue-600 shadow-blue-500/20' => $course['category'] == 'ongoing',
                            ])>
                                {{ $course['category'] == 'completed' ? 'مكتمل' : 'قيد الدراسة' }}
                            </span>
                        </div>
                    </div>

                    <div class="p-8">
                        <h3 class="text-xl font-black text-slate-900 mb-2 leading-tight group-hover:text-blue-600 transition-colors">{{ $course['title'] }}</h3>
                        <p class="text-xs font-bold text-slate-400 mb-8">{{ $course['instructor'] }}</p>
                        
                        <div class="mb-10">
                            <x-student-progress :value="$course['progress']" label="التقدم الدراسي" color="{{ $course['category'] == 'completed' ? 'green' : 'blue' }}" />
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <a href="{{ route('student.lesson', ['id' => $course['id']]) }}" class="flex-1 bg-slate-900 text-white text-center py-4 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-blue-600 transition-all shadow-xl shadow-slate-900/10">
                                {{ $course['category'] == 'completed' ? 'مراجعة المادة' : 'متابعة التعلم' }}
                            </a>
                            <button class="w-14 h-14 border border-slate-100 rounded-2xl flex items-center justify-center hover:bg-slate-50 transition-all text-slate-400">
                                <i data-lucide="more-vertical" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Empty State (Hidden) -->
        <div x-show="category === 'wishlist'" class="py-20 text-center animate-fade-in">
             <div class="w-32 h-32 bg-slate-100 text-slate-300 rounded-[40px] mx-auto flex items-center justify-center mb-8">
                <i data-lucide="heart" class="w-16 h-16"></i>
             </div>
             <h3 class="text-2xl font-black text-slate-900 mb-2">قائمة الأمنيات فارغة</h3>
             <p class="text-slate-400 font-medium max-w-sm mx-auto">لم تقم بإضافة أي دورات إلى مفضلتك بعد. تصفح الكتالوج لاكتشاف دورات جديدة.</p>
        </div>
    </div>
@endsection

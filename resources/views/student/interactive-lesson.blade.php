@extends('layouts.student')

@section('title', 'الدرس التفاعلي - تجربة تعلم ذكية')

@section('content')
    <div x-data="{ notesOpen: false }" class="relative">
        
        <!-- Floating Progress -->
        <x-progress-bar-floating />

        <!-- Floating Action Menu -->
        <div class="fixed bottom-10 left-10 z-40 flex flex-col gap-4">
             <button @click="notesOpen = true" class="w-16 h-16 bg-blue-600 text-white rounded-full shadow-2xl flex items-center justify-center hover:scale-110 transition-transform group relative">
                <i data-lucide="edit-3" class="w-7 h-7"></i>
                <span class="absolute right-20 bg-slate-900 text-white px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">ملاحظات الدرس</span>
             </button>
             <button class="w-16 h-16 bg-white text-slate-400 rounded-full shadow-2xl border border-slate-100 flex items-center justify-center hover:scale-110 transition-transform group relative">
                <i data-lucide="download" class="w-7 h-7"></i>
                <span class="absolute right-20 bg-slate-900 text-white px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">تحميل المصادر</span>
             </button>
        </div>

        <!-- Sidebar Notes -->
        <x-notes-sidebar />

        <div class="max-w-4xl mx-auto py-12">
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-4 mb-12 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                <span>الكورسات</span>
                <i data-lucide="chevron-left" class="w-3 h-3"></i>
                <span>تطوير تطبيقات الويب</span>
                <i data-lucide="chevron-left" class="w-3 h-3"></i>
                <span class="text-blue-600">هيكلية الـ MVC</span>
            </div>

            <!-- Title Section -->
            <div class="mb-16">
                <h1 class="text-5xl md:text-7xl font-black text-slate-900 tracking-tighter mb-8 leading-tight">فهم هيكلية الـ MVC في إطار العمل Laravel</h1>
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-3">
                         <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center">
                            <i data-lucide="user" class="w-5 h-5 text-slate-400"></i>
                         </div>
                         <span class="text-xs font-black text-slate-800">د. سمير بوزيد</span>
                    </div>
                    <div class="w-px h-4 bg-slate-200"></div>
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">15 دقيقة قراءة</span>
                </div>
            </div>

            <!-- Content Blocks -->
            <div class="space-y-4">
                <x-lesson-block type="text">
                    تعتبر هيكلية **Model-View-Controller (MVC)** حجر الزاوية في تطوير الويب الحديث. هي نمط تصميمي يفصل منطق التطبيق إلى ثلاثة مكونات رئيسية، مما يسهل عملية الصيانة والتطوير.
                </x-lesson-block>

                <x-lesson-block type="video" />

                <x-lesson-block type="text" title="1. الموديل (Model)">
                    الموديل هو المكون المسؤول عن إدارة البيانات والمنطق التجاري للتطبيق. في Laravel، نتعامل عادة مع Eloquent ORM لتمثيل الجداول ككائنات.
                </x-lesson-block>

                <!-- Inline Question -->
                <x-question-card-student question="ما هو الدور الأساسي للـ Model في هيكلية MVC؟" type="mcq" />

                <x-lesson-block type="text" title="2. العرض (View)">
                    الـ View هو الواجهة التي يراها المستخدم. في Laravel نستخدم محرك Blade لإنشاء واجهات ديناميكية بسهولة.
                </x-lesson-block>

                <!-- Another Inline Question -->
                <x-question-card-student question="هل يمكن للـ View الوصول مباشرة لقاعدة البيانات؟" type="tf" />

                <x-lesson-block type="pdf" />

                <x-lesson-block type="text">
                    في الختام، فإن MVC ليست مجرد تقسيم للملفات، بل هي فلسفة تنظيمية تضمن بقاء الكود نظيفاً وقابلاً للتوسع.
                </x-lesson-block>
            </div>

            <!-- Navigation Actions -->
            <div class="mt-20 pt-20 border-t border-slate-100 flex items-center justify-between">
                 <button class="flex items-center gap-4 text-slate-400 hover:text-blue-600 transition-colors group">
                    <div class="w-12 h-12 rounded-2xl border border-slate-100 flex items-center justify-center group-hover:border-blue-200"><i data-lucide="arrow-right" class="w-5 h-5"></i></div>
                    <div class="text-right">
                        <p class="text-[9px] font-black uppercase tracking-widest text-slate-300">الدرس السابق</p>
                        <p class="text-sm font-black uppercase">أساسيات PHP</p>
                    </div>
                 </button>

                 <div class="text-center">
                    <div class="w-16 h-16 bg-blue-600 text-white rounded-3xl flex items-center justify-center shadow-xl shadow-blue-900/20 mb-4 mx-auto cursor-pointer hover:scale-110 transition-transform">
                        <i data-lucide="check" class="w-8 h-8"></i>
                    </div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-blue-600">إكمال الدرس</p>
                 </div>

                 <button class="flex items-center gap-4 text-slate-400 hover:text-blue-600 transition-colors group">
                    <div class="text-left">
                        <p class="text-[9px] font-black uppercase tracking-widest text-slate-300">الدرس التالي</p>
                        <p class="text-sm font-black uppercase">التعامل مع الـ Routes</p>
                    </div>
                    <div class="w-12 h-12 rounded-2xl border border-slate-100 flex items-center justify-center group-hover:border-blue-200"><i data-lucide="arrow-left" class="w-5 h-5"></i></div>
                 </button>
            </div>
        </div>
    </div>
@endsection

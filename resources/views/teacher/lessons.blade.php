@extends('layouts.app')

@section('title', 'رفع المحتوى التعليمي - فضاء الأستاذ')

@section('content')
    <div x-data="{ dragging: false }">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter">رفع درس جديد</h1>
                <p class="text-slate-500 font-medium text-lg">أضف محتوى تفاعلياً لدوراتك التدريبية.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <button class="bg-white border border-slate-200 px-6 py-3 rounded-2xl font-bold text-sm text-slate-600 hover:bg-slate-50 transition-all">
                    مسودة الدروس
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Left: Upload Form -->
            <div class="lg:col-span-2 space-y-10">
                <!-- Dropzone UI -->
                <div @dragover.prevent="dragging = true" 
                     @dragleave.prevent="dragging = false"
                     @drop.prevent="dragging = false"
                     :class="dragging ? 'border-indigo-600 bg-indigo-50/50' : 'border-slate-200 bg-white'"
                     class="group relative border-[3px] border-dashed rounded-[48px] p-20 flex flex-col items-center text-center transition-all duration-300">
                    
                    <div class="w-24 h-24 bg-indigo-50 rounded-full flex items-center justify-center mb-8 transition-transform group-hover:scale-110">
                        <i data-lucide="cloud-upload" class="w-10 h-10 text-indigo-600"></i>
                    </div>
                    
                    <h3 class="text-2xl font-black text-slate-900 mb-4 tracking-tight">اسحب الملفات هنا أو قم بالاختيار</h3>
                    <p class="text-slate-500 font-bold text-sm max-w-sm mb-10 leading-relaxed">يدعم النظام رفع الفيديوهات (MP4, WEBM) والمستندات (PDF, DOCX) حتى حجم 500 ميجابايت.</p>
                    
                    <button class="bg-slate-900 text-white px-10 py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-slate-900/20 hover:bg-indigo-600 transition-all">
                        اختر الملف من جهازك
                    </button>
                    
                    <!-- Progress Preview (Alpine.js simulation) -->
                    <div class="absolute bottom-10 left-10 right-10 opacity-0 group-hover:opacity-100 transition-opacity">
                         <div class="flex items-center justify-between text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2 px-2">
                             <span>Uploading Course_Intro.mp4</span>
                             <span>65%</span>
                         </div>
                         <div class="w-full h-1.5 bg-slate-100 rounded-full overflow-hidden">
                             <div class="h-full bg-indigo-600 rounded-full w-[65%]"></div>
                         </div>
                    </div>
                </div>

                <!-- Lesson Details Form -->
                <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm space-y-8">
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight">تفاصيل الدرس</h3>
                    
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-widest px-1">عنوان الدرس</label>
                            <input type="text" placeholder="مثال: مقدمة في بنية البيانات" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all">
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest px-1">الدورة التابعة</label>
                                <select class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all appearance-none">
                                    <option>أساسيات تطوير الويب</option>
                                    <option>برمجة تطبيقات Flutter</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest px-1">القسم / الوحدة</label>
                                <select class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all appearance-none">
                                    <option>الوحدة 1: الأساسيات</option>
                                    <option>الوحدة 2: المستوى المتقدم</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-widest px-1">وصف موجز</label>
                            <textarea rows="4" placeholder="اكتب نبذة قصيرة عن محتوى هذا الدرس..." class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all resize-none"></textarea>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-6">
                        <button class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-widest hover:bg-slate-50 rounded-2xl transition-all">حفظ كمؤقت</button>
                        <button class="px-10 py-4 bg-indigo-600 text-white rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-indigo-700 transition-all shadow-xl shadow-indigo-500/20">نشر الدرس الآن</button>
                    </div>
                </div>
            </div>

            <!-- Right: Settings & Preview -->
            <div class="space-y-10">
                <!-- Visibility & Access -->
                <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm space-y-8">
                    <h3 class="text-xl font-black text-slate-900 tracking-tight">إعدادات العرض</h3>
                    
                    <div class="space-y-6">
                         @foreach([
                            ['label' => 'عرض عام', 'desc' => 'الدرس متاح لجميع الطلاب المسجلين', 'icon' => 'eye', 'active' => true],
                            ['label' => 'حماية بكلمة مرور', 'desc' => 'يتطلب كود دخول لمشاهدة المحتوى', 'icon' => 'lock', 'active' => false],
                            ['label' => 'متاح أوفلاين', 'desc' => 'السماح للطلاب بتحميل الفيديو والمرفقات', 'icon' => 'download', 'active' => true],
                        ] as $toggle)
                            <div class="flex items-center justify-between group">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400 group-hover:text-indigo-600 transition-colors">
                                        <i data-lucide="{{ $toggle['icon'] }}" class="w-4 h-4"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs font-black text-slate-800">{{ $toggle['label'] }}</p>
                                        <p class="text-[9px] font-bold text-slate-400">{{ $toggle['desc'] }}</p>
                                    </div>
                                </div>
                                <div x-data="{ on: {{ $toggle['active'] ? 'true' : 'false' }} }" @click="on = !on" :class="on ? 'bg-indigo-600' : 'bg-slate-200'" class="w-10 h-5 rounded-full relative cursor-pointer transition-colors duration-300">
                                    <div :class="on ? 'translate-x-1' : 'translate-x-6'" class="absolute top-0.5 right-0.5 w-4 h-4 bg-white rounded-full shadow-sm transition-transform duration-300"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Video Preview Placeholder -->
                <div class="bg-slate-900 rounded-[40px] p-2 overflow-hidden aspect-video relative group border-4 border-white shadow-2xl shadow-indigo-900/10">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover rounded-[36px] opacity-40 group-hover:scale-105 transition-transform duration-700" alt="">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <button class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-transform">
                            <i data-lucide="play" class="w-6 h-6 text-slate-900 ml-1"></i>
                        </button>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <p class="text-[10px] font-black text-white/60 uppercase tracking-widest mb-1">معاينة الفيديو</p>
                        <p class="text-xs font-bold text-white truncate">Course_Structure_Final.mp4</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

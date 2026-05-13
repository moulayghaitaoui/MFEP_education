@extends('layouts.teacher')

@section('title', 'إنشاء درس جديد - فضاء الأستاذ')

@section('content')
    <div class="max-w-5xl mx-auto">
        <!-- Header -->
        <div class="flex items-center gap-6 mb-12 animate-fade-in">
            <a href="{{ route('teacher.lessons') }}" class="w-14 h-14 bg-white border border-slate-200 rounded-2xl flex items-center justify-center text-slate-400 hover:text-indigo-600 hover:border-indigo-100 transition-all shadow-sm">
                <i data-lucide="arrow-right" class="w-6 h-6"></i>
            </a>
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tighter">إضافة درس جديد للمنصة</h1>
                <p class="text-slate-400 font-medium">قم بتعبئة بيانات الدرس ورفع الملحقات التعليمية.</p>
            </div>
        </div>

        <form class="space-y-10">
            <!-- Basic Info -->
            <x-teacher-card title="المعلومات الأساسية">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">عنوان الدرس</label>
                        <input type="text" placeholder="مثلاً: بنية الـ MVC في Laravel" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-600/10 outline-none transition-all">
                    </div>
                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">المادة / التخصص</label>
                        <select class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-600/10 outline-none transition-all appearance-none">
                            <option>تطوير تطبيقات الويب</option>
                            <option>أمن المعلومات والشبكات</option>
                            <option>تصميم الواجهات UI/UX</option>
                        </select>
                    </div>
                    <div class="md:col-span-2 space-y-3">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">وصف الدرس</label>
                        <textarea rows="4" placeholder="اكتب وصفاً تفصيلياً لمحتوى الدرس..." class="w-full bg-slate-50 border-none rounded-3xl px-6 py-5 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-600/10 outline-none transition-all resize-none"></textarea>
                    </div>
                </div>
            </x-teacher-card>

            <!-- Video Upload -->
            <x-teacher-card title="محتوى الفيديو (MP4)" subtitle="يُفضل استخدام جودة 1080p لضمان أفضل تجربة">
                <div class="w-full h-80 bg-slate-50 rounded-[40px] border-4 border-dashed border-slate-100 flex flex-col items-center justify-center group hover:bg-indigo-50 hover:border-indigo-200 transition-all cursor-pointer relative overflow-hidden">
                    <div class="absolute inset-0 bg-indigo-600/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="w-20 h-20 bg-white rounded-[28px] flex items-center justify-center text-slate-300 group-hover:text-indigo-600 group-hover:scale-110 transition-all shadow-xl shadow-slate-200/50 mb-6 relative z-10">
                        <i data-lucide="video" class="w-10 h-10"></i>
                    </div>
                    <p class="text-lg font-black text-slate-900 mb-2 relative z-10">اضغط لرفع الفيديو أو اسحب الملف هنا</p>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] relative z-10">الحد الأقصى لحجم الملف: 500 ميجابايت</p>
                    <input type="file" class="absolute inset-0 opacity-0 cursor-pointer">
                </div>
            </x-teacher-card>

            <!-- Attachments -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <x-teacher-card title="المرفقات (PDF/Zip)" padding="p-10">
                    <div class="space-y-6">
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl border border-transparent hover:border-indigo-100 transition-all group cursor-pointer">
                             <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-rose-500 shadow-sm"><i data-lucide="file-text" class="w-5 h-5"></i></div>
                                <span class="text-xs font-black text-slate-800">ملخص الدرس.pdf</span>
                             </div>
                             <button class="text-slate-300 hover:text-rose-500 transition-colors"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                        </div>
                        <button type="button" class="w-full py-4 border-2 border-dashed border-slate-100 rounded-2xl text-[10px] font-black text-slate-400 uppercase tracking-widest hover:bg-slate-50 hover:border-indigo-200 transition-all flex items-center justify-center gap-3">
                            <i data-lucide="upload-cloud" class="w-4 h-4"></i>
                            رفع ملف جديد
                        </button>
                    </div>
                </x-teacher-card>

                <x-teacher-card title="إعدادات النشر" padding="p-10">
                    <div class="space-y-8">
                         <div class="flex items-center justify-between">
                            <div class="space-y-1">
                                <p class="text-xs font-black text-slate-800">إتاحة للجميع</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase">يمكن لجميع المتربصين رؤية الدرس</p>
                            </div>
                            <div class="w-12 h-6 bg-indigo-600 rounded-full relative cursor-pointer">
                                <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-all translate-x-6"></div>
                            </div>
                         </div>
                         <div class="flex items-center justify-between">
                            <div class="space-y-1">
                                <p class="text-xs font-black text-slate-800">تفعيل التعليقات</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase">السماح للمتربصين بترك أسئلة</p>
                            </div>
                            <div class="w-12 h-6 bg-slate-200 rounded-full relative cursor-pointer">
                                <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-all"></div>
                            </div>
                         </div>
                    </div>
                </x-teacher-card>
            </div>

            <!-- Final Actions -->
            <div class="flex gap-4 pt-10">
                <button type="submit" class="flex-1 bg-indigo-600 text-white py-6 rounded-3xl font-black text-sm uppercase tracking-[0.2em] shadow-2xl shadow-indigo-500/30 hover:bg-indigo-700 active:scale-[0.98] transition-all">
                    نشر الدرس الآن
                </button>
                <button type="button" class="px-10 bg-white text-slate-400 py-6 rounded-3xl font-black text-sm uppercase tracking-[0.2em] border border-slate-200 hover:bg-slate-50 transition-all">
                    حفظ كمسودة
                </button>
            </div>
        </form>
    </div>
@endsection

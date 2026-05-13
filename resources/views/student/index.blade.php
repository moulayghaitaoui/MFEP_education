@extends('layouts.app')

@section('title', 'إدارة المتربصين - وزارة التكوين المهني')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-3xl shadow-xl shadow-blue-900/5 overflow-hidden border border-slate-100">
            <!-- Form Header -->
            <div class="sidebar-gradient p-8 text-white relative overflow-hidden">
                <div class="relative z-10">
                    <h1 class="text-2xl font-bold mb-2">تسجيل متربص جديد</h1>
                    <p class="text-blue-100/80 text-sm">يرجى إدخال كافة المعلومات المطلوبة بدقة لضمان صحة البيانات في المنصة الوطنية.</p>
                </div>
                <i data-lucide="user-plus" class="absolute -bottom-4 -left-4 w-48 h-48 text-white/10 rotate-12"></i>
            </div>

            <!-- Form Content -->
            <form action="#" class="p-8 space-y-8">
                <!-- Section 1: Basic Info -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                            <i data-lucide="user" class="w-4 h-4"></i>
                        </div>
                        <h2 class="font-bold text-slate-800">المعلومات الشخصية</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 block">الاسم الكامل (بالعربية)</label>
                            <input type="text" placeholder="مثال: محمد بن علي" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 block">الاسم الكامل (باللاتينية)</label>
                            <input type="text" dir="ltr" placeholder="Ex: Mohamed Ben Ali" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none text-right">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 block">رقم التعريف الوطني (NIN)</label>
                            <input type="text" placeholder="000000000000000000" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none">
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 block">تاريخ الميلاد</label>
                            <input type="date" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none">
                        </div>
                    </div>
                </div>

                <!-- Section 2: Educational Info -->
                <div class="space-y-6">
                    <div class="flex items-center gap-3 border-b border-slate-100 pb-4">
                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                            <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                        </div>
                        <h2 class="font-bold text-slate-800">معلومات التكوين</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 block">المعهد / المركز</label>
                            <select class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none appearance-none">
                                <option>اختر المؤسسة...</option>
                                <option>معهد القبة</option>
                                <option>مركز سيدي بلعباس</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 block">التخصص</label>
                            <select class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none appearance-none">
                                <option>اختر التخصص...</option>
                                <option>تقني سامي في المعلوماتية</option>
                                <option>كهرباء صناعية</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Form Footer -->
                <div class="pt-8 border-t border-slate-100 flex items-center justify-end gap-4">
                    <button type="button" class="px-8 py-3 rounded-xl text-sm font-bold text-slate-500 hover:bg-slate-50 transition-colors">إلغاء</button>
                    <button type="submit" class="px-8 py-3 rounded-xl text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-500/20 transition-all flex items-center gap-2">
                        <i data-lucide="check" class="w-4 h-4"></i>
                        تأكيد التسجيل
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

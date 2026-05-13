@extends('layouts.app')

@section('title', 'إعدادات المنصة المركزية - الإدارة العليا')

@section('content')
    <div x-data="{ currentTab: 'general' }" class="max-w-[1200px]">
        <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-10">إعدادات النظام</h1>

        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Sidebar Navigation -->
            <div class="lg:w-72 space-y-2">
                @foreach([
                    ['id' => 'general', 'label' => 'الإعدادات العامة', 'icon' => 'settings'],
                    ['id' => 'security', 'label' => 'الأمان والوصول', 'icon' => 'shield-check'],
                    ['id' => 'notifications', 'label' => 'نظام التنبيهات', 'icon' => 'bell'],
                    ['id' => 'api', 'label' => 'مفاتيح الربط (API)', 'icon' => 'code-2'],
                    ['id' => 'backup', 'label' => 'النسخ الاحتياطي', 'icon' => 'database'],
                ] as $item)
                    <button @click="currentTab = '{{ $item['id'] }}'" 
                            :class="currentTab === '{{ $item['id'] }}' ? 'bg-slate-900 text-white shadow-xl shadow-slate-900/20' : 'text-slate-500 hover:bg-white hover:shadow-sm'"
                            class="w-full flex items-center gap-4 px-6 py-4 rounded-2xl font-bold text-[13px] transition-all duration-300">
                        <i data-lucide="{{ $item['icon'] }}" class="w-5 h-5"></i>
                        {{ $item['label'] }}
                    </button>
                @endforeach
            </div>

            <!-- Content Area -->
            <div class="flex-1">
                <!-- General Settings -->
                <div x-show="currentTab === 'general'" x-transition class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm space-y-10">
                    <div>
                        <h2 class="text-2xl font-black text-slate-900 mb-2 tracking-tight">إعدادات الهوية الوطنية</h2>
                        <p class="text-slate-500 text-sm font-medium">تعديل المعلومات الأساسية للمنصة الرقمية.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-widest block">اسم المنصة الرسمي</label>
                            <input type="text" value="المنصة الوطنية للتحول الرقمي - MFEP" class="w-full px-6 py-4 rounded-2xl bg-slate-50 border-none focus:ring-4 focus:ring-blue-500/10 font-bold text-slate-800 outline-none transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-widest block">البريد الإلكتروني التقني</label>
                            <input type="email" value="support@mfep.gov.dz" class="w-full px-6 py-4 rounded-2xl bg-slate-50 border-none focus:ring-4 focus:ring-blue-500/10 font-bold text-slate-800 outline-none transition-all">
                        </div>
                    </div>

                    <div class="pt-10 border-t border-slate-50">
                        <h3 class="text-lg font-black text-slate-900 mb-6 tracking-tight">حالة التسجيل الوطني</h3>
                        <div class="flex items-center justify-between p-6 bg-slate-50 rounded-3xl border border-slate-100 group">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-emerald-500 flex items-center justify-center text-white shadow-lg shadow-emerald-500/20">
                                    <i data-lucide="toggle-right" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <p class="font-black text-slate-800">فتح باب التسجيل للمتربصين</p>
                                    <p class="text-xs text-slate-500 font-bold">تفعيل أو تعطيل رابط التسجيل في الموقع العام</p>
                                </div>
                            </div>
                            <div x-data="{ on: true }" @click="on = !on" :class="on ? 'bg-emerald-500' : 'bg-slate-300'" class="w-14 h-8 rounded-full relative cursor-pointer transition-colors duration-300">
                                <div :class="on ? 'translate-x-1' : 'translate-x-7'" class="absolute top-1 right-1 w-6 h-6 bg-white rounded-full shadow-md transition-transform duration-300"></div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-10 border-t border-slate-50">
                        <button class="px-8 py-4 rounded-2xl text-xs font-black text-slate-500 hover:bg-slate-50 transition-all uppercase tracking-widest">إعادة تعيين</button>
                        <button class="px-10 py-4 rounded-2xl bg-slate-900 text-white text-xs font-black hover:bg-blue-600 transition-all shadow-xl shadow-slate-900/10 uppercase tracking-widest">حفظ التعديلات</button>
                    </div>
                </div>

                <!-- Security Settings -->
                <div x-show="currentTab === 'security'" x-transition class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm space-y-10">
                    <div>
                        <h2 class="text-2xl font-black text-slate-900 mb-2 tracking-tight">الأمان والوصول</h2>
                        <p class="text-slate-500 text-sm font-medium">إدارة حماية البيانات وصلاحيات الوصول العليا.</p>
                    </div>

                    <div class="space-y-6">
                        @foreach([
                            ['label' => 'المصادقة الثنائية (2FA)', 'desc' => 'إلزام جميع المديرين باستخدام تطبيق المصادقة للدخول', 'active' => true],
                            ['label' => 'تقييد IP', 'desc' => 'السماح بالدخول فقط من عناوين IP الخاصة بالوزارة والمديريات', 'active' => false],
                            ['label' => 'تشفير سجلات النشاط', 'desc' => 'تشفير جميع سجلات النظام لمنع الوصول غير المصرح به', 'active' => true],
                        ] as $sec)
                            <div class="flex items-center justify-between p-6 border border-slate-50 rounded-3xl hover:border-blue-100 transition-all">
                                <div>
                                    <p class="font-black text-slate-800">{{ $sec['label'] }}</p>
                                    <p class="text-xs text-slate-500 font-bold">{{ $sec['desc'] }}</p>
                                </div>
                                <div x-data="{ on: {{ $sec['active'] ? 'true' : 'false' }} }" @click="on = !on" :class="on ? 'bg-blue-600' : 'bg-slate-300'" class="w-12 h-6 rounded-full relative cursor-pointer transition-colors duration-300">
                                    <div :class="on ? 'translate-x-1' : 'translate-x-7'" class="absolute top-0.5 right-0.5 w-5 h-5 bg-white rounded-full shadow-md transition-transform duration-300"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Fallback for other tabs -->
                <div x-show="['notifications', 'api', 'backup'].includes(currentTab)" x-transition class="h-96 flex items-center justify-center text-slate-300 bg-white rounded-[40px] border border-dashed border-slate-200">
                    <div class="text-center">
                        <i data-lucide="shield" class="w-12 h-12 mx-auto mb-4 opacity-20 text-slate-900"></i>
                        <p class="font-black text-xs uppercase tracking-widest">Advanced Module Locked</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

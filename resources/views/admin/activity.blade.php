@extends('layouts.admin')

@section('title', 'سجلات النظام والمراقبة - وزارة التكوين المهني')

@section('navbar')
    <header class="h-24 bg-white/80 backdrop-blur-xl border-b border-slate-100 flex items-center justify-between px-12 z-20">
        <div class="flex items-center gap-8">
            <button @click="sidebarOpen = !sidebarOpen" class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 hover:text-slate-900 transition-all">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <h2 class="text-xl font-black text-slate-900 tracking-tight">سجلات النشاط ومراقبة الأمن</h2>
        </div>
        
        <div class="flex items-center gap-4">
            <button class="bg-rose-50 text-rose-600 px-8 py-4 rounded-3xl font-black text-[10px] uppercase tracking-widest hover:bg-rose-600 hover:text-white transition-all flex items-center gap-3">
                <i data-lucide="trash-2" class="w-5 h-5"></i>
                مسح السجلات القديمة
            </button>
        </div>
    </header>
@endsection

@section('content')
    <div class="p-12 space-y-12">
        <!-- Live Monitoring Header -->
        <div class="bg-slate-900 rounded-[48px] p-12 text-white relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-full h-full opacity-10 pointer-events-none">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-gov-green via-transparent to-transparent"></div>
            </div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-12">
                <div class="flex items-center gap-8">
                    <div class="w-24 h-24 bg-gov-green/20 rounded-full flex items-center justify-center border-4 border-gov-green/30 animate-pulse">
                        <i data-lucide="activity" class="w-12 h-12 text-gov-green"></i>
                    </div>
                    <div>
                        <h3 class="text-3xl font-black mb-2 tracking-tight">مراقبة النظام الحية</h3>
                        <p class="text-slate-400 font-bold">حالة السيرفر الوطني: <span class="text-gov-green uppercase tracking-widest ml-2">مستقر (DZ-AL-01)</span></p>
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="text-center px-8 py-4 bg-white/5 rounded-[32px] border border-white/10">
                        <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">العمليات اليومية</p>
                        <p class="text-2xl font-black text-gov-gold">45,240</p>
                    </div>
                    <div class="text-center px-8 py-4 bg-white/5 rounded-[32px] border border-white/10">
                        <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">محاولات الدخول</p>
                        <p class="text-2xl font-black text-rose-500">1,240</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Logs Table -->
        <div class="bg-white rounded-[48px] border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-10 border-b border-slate-50 flex items-center justify-between">
                <h3 class="text-xl font-black text-slate-900">سجل الأحداث الأخيرة</h3>
                <div class="flex items-center gap-4">
                    <select class="bg-slate-50 border-none rounded-2xl px-6 py-3 text-[10px] font-black uppercase tracking-widest outline-none">
                        <option>جميع الأحداث</option>
                        <option>الأمان والخصوصية</option>
                        <option>تعديل البيانات</option>
                        <option>أخطاء النظام</option>
                    </select>
                </div>
            </div>

            <div class="divide-y divide-slate-50">
                @foreach([
                    ['user' => 'أحمد بوزيدي', 'action' => 'تعديل بيانات معهد سطيف 01', 'type' => 'Data Edit', 'time' => 'منذ 5 دقائق', 'icon' => 'edit-3', 'color' => 'gov-green'],
                    ['user' => 'سارة مسعودي', 'action' => 'تصدير تقرير النتائج الفصلية', 'type' => 'Report Export', 'time' => 'منذ 12 دقيقة', 'icon' => 'file-text', 'color' => 'blue'],
                    ['user' => 'نظام الحماية', 'action' => 'حجب محاولة دخول مشبوهة (IP: 192.168.1.45)', 'type' => 'Security', 'time' => 'منذ 25 دقيقة', 'icon' => 'shield-alert', 'color' => 'rose-500'],
                    ['user' => 'مراد فرحات', 'action' => 'إضافة تخصص جديد: الذكاء الاصطناعي', 'type' => 'Specialization', 'time' => 'منذ ساعة', 'icon' => 'plus-circle', 'color' => 'gov-gold'],
                    ['user' => 'النظام الملقائي', 'action' => 'نسخ احتياطي ناجح لقاعدة البيانات', 'type' => 'System', 'time' => 'منذ ساعتين', 'icon' => 'hard-drive', 'color' => 'emerald-500'],
                    ['user' => 'أحمد بوزيدي', 'action' => 'تغيير صلاحيات مستخدم: ليلى كريم', 'type' => 'Permissions', 'time' => 'منذ 3 ساعات', 'icon' => 'key', 'color' => 'amber-500'],
                ] as $log)
                <div class="p-8 flex items-center justify-between hover:bg-slate-50 transition-all group">
                    <div class="flex items-center gap-8">
                        <div class="w-14 h-14 rounded-[20px] bg-{{ $log['color'] }}/10 text-{{ $log['color'] }} flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i data-lucide="{{ $log['icon'] }}" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <p class="text-sm font-black text-slate-900 mb-1">{{ $log['action'] }}</p>
                            <div class="flex items-center gap-4">
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">{{ $log['user'] }}</span>
                                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                <span class="text-[10px] font-black text-{{ $log['color'] }} uppercase tracking-widest">{{ $log['type'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">{{ $log['time'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="p-8 bg-slate-50/50 border-t border-slate-50 text-center">
                <button class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] hover:text-gov-green transition-colors">تحميل المزيد من السجلات</button>
            </div>
        </div>
    </div>
@endsection

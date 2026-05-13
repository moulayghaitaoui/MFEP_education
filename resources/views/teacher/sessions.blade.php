@extends('layouts.teacher')

@section('title', 'إدارة الحصص والجدولة - فضاء الأستاذ')

@section('content')
    <div x-data="{ addSession: false, sessionSettings: false, joinActive: false }">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-2">الجدول الزمني والحصص</h1>
                <p class="text-slate-500 font-medium text-lg">نظم حصصك المباشرة والحضورية وتابع التزاماتك اليومية.</p>
            </div>
            
            <button @click="addSession = true" class="bg-gov-green text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-gov-green/20 hover:bg-gov-green-dark transition-all flex items-center gap-3">
                <i data-lucide="plus" class="w-5 h-5 text-gov-gold"></i>
                حصة جديدة
            </button>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-4 gap-12">
            <!-- Calendar Preview -->
            <div class="xl:col-span-1 space-y-8">
                <x-teacher-card title="ماي 2024">
                    <div class="grid grid-cols-7 gap-2 text-center text-[10px] font-black text-slate-400 uppercase tracking-widest mb-6">
                        <span>ح</span><span>ن</span><span>ث</span><span>ر</span><span>خ</span><span>ج</span><span>س</span>
                    </div>
                    <div class="grid grid-cols-7 gap-2 text-center">
                        @for($i = 1; $i <= 31; $i++)
                            <button @class([
                                'w-8 h-8 rounded-xl text-xs font-black transition-all flex items-center justify-center',
                                'bg-gov-green text-white shadow-lg shadow-gov-green/30' => $i == 13,
                                'text-slate-700 hover:bg-gov-green/10' => $i != 13,
                                'relative' => in_array($i, [15, 22, 28])
                            ])>
                                {{ $i }}
                                @if(in_array($i, [15, 22, 28]))
                                    <span class="absolute bottom-1 left-1/2 -translate-x-1/2 w-1 h-1 bg-gov-gold rounded-full"></span>
                                @endif
                            </button>
                        @endfor
                    </div>
                </x-teacher-card>

                <x-teacher-card title="فلترة الحصص">
                    <div class="space-y-4">
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl cursor-pointer hover:bg-gov-green/5 transition-all">
                            <input type="checkbox" checked class="w-5 h-5 rounded-lg border-none bg-white text-gov-green focus:ring-4 focus:ring-gov-green/10">
                            <span class="text-xs font-black text-slate-700 uppercase tracking-tight">حصص حضورية</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl cursor-pointer hover:bg-gov-green/5 transition-all">
                            <input type="checkbox" checked class="w-5 h-5 rounded-lg border-none bg-white text-gov-gold focus:ring-4 focus:ring-gov-gold/10">
                            <span class="text-xs font-black text-slate-700 uppercase tracking-tight">بث مباشر (Online)</span>
                        </label>
                    </div>
                </x-teacher-card>
            </div>

            <!-- Sessions List -->
            <div class="xl:col-span-3 space-y-10">
                <div class="flex items-center justify-between px-4">
                    <h3 class="text-xl font-black text-slate-900 tracking-tight">حصص اليوم <span class="text-gov-green">(13 ماي)</span></h3>
                    <div class="flex gap-2">
                        <button class="p-2 text-slate-400 hover:text-gov-green transition-all"><i data-lucide="chevron-right" class="w-6 h-6"></i></button>
                        <button class="p-2 text-slate-400 hover:text-gov-green transition-all"><i data-lucide="chevron-left" class="w-6 h-6"></i></button>
                    </div>
                </div>

                <div class="space-y-6">
                    @foreach([
                        ['title' => 'برمجة الواجهات المتقدمة', 'time' => '08:30 - 10:30', 'room' => 'قاعة 12', 'group' => 'فوج A1', 'status' => 'Ongoing'],
                        ['title' => 'مراجعة خوارزميات البحث', 'time' => '11:00 - 01:00', 'room' => 'مختبر 04', 'group' => 'فوج B2', 'status' => 'Pending'],
                        ['title' => 'جلسة أسئلة وأجوبة (مباشر)', 'time' => '03:00 - 04:30', 'room' => 'رابط Zoom', 'group' => 'الجميع', 'status' => 'Upcoming'],
                    ] as $session)
                        <div class="bg-white p-8 rounded-[40px] border border-slate-100 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-8 group hover:shadow-xl hover:border-gov-green/10 transition-all duration-500 relative overflow-hidden">
                            @if($session['status'] == 'Ongoing')
                                <div class="absolute top-0 right-0 w-2 h-full bg-gov-green"></div>
                            @endif
                            
                            <div class="flex items-center gap-8">
                                <div @class([
                                    'w-16 h-16 rounded-[24px] flex items-center justify-center flex-shrink-0',
                                    'bg-gov-green text-white shadow-xl shadow-gov-green/30' => $session['status'] == 'Ongoing',
                                    'bg-slate-50 text-slate-400' => $session['status'] != 'Ongoing'
                                ])>
                                    <i data-lucide="{{ $session['room'] == 'رابط Zoom' ? 'video' : 'building-2' }}" class="w-7 h-7 {{ $session['status'] == 'Ongoing' ? 'text-gov-gold' : '' }}"></i>
                                </div>
                                <div>
                                    <div class="flex items-center gap-3 mb-1">
                                        <h3 class="text-xl font-black text-slate-900 group-hover:text-gov-green transition-colors">{{ $session['title'] }}</h3>
                                        @if($session['status'] == 'Ongoing')
                                            <span class="flex h-2 w-2 relative">
                                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex items-center gap-4 text-xs font-bold text-slate-400">
                                        <span class="flex items-center gap-2 font-mono"><i data-lucide="clock" class="w-4 h-4"></i> {{ $session['time'] }}</span>
                                        <span class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i> {{ $session['room'] }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center gap-6">
                                <div class="text-left">
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">الفوج المستهدف</p>
                                    <p class="text-sm font-black text-slate-800">{{ $session['group'] }}</p>
                                </div>
                                <div class="flex gap-2">
                                     <button @click="joinActive = true" class="px-6 py-3 bg-gov-green text-white rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-gov-green-dark transition-all">دخول الحصة</button>
                                     <button @click="sessionSettings = true" class="p-3 bg-slate-50 text-slate-400 rounded-xl hover:text-gov-green transition-all"><i data-lucide="settings" class="w-5 h-5"></i></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Add Session Modal -->
        <x-teacher-modal name="addSession" title="جدولة حصة جديدة">
            <div class="space-y-8">
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">عنوان الحصة</label>
                        <input type="text" placeholder="مثلاً: مراجعة نهائية" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-gov-green/10 outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">نوع الحصة</label>
                        <select class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 outline-none appearance-none">
                            <option>حضورياً (Classroom)</option>
                            <option>بث مباشر (Online)</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">التاريخ</label>
                        <input type="date" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">الوقت</label>
                        <input type="time" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 outline-none">
                    </div>
                </div>
                <button @click="addSession = false" class="w-full bg-gov-green text-white py-5 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-gov-green/20 hover:bg-gov-green-dark transition-all">تأكيد الجدولة</button>
            </div>
        </x-teacher-modal>

        <!-- Session Settings Modal -->
        <x-teacher-modal name="sessionSettings" title="إعدادات الحصة المتقدمة">
            <div class="space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Feature Toggles -->
                    <div class="space-y-4">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">إعدادات البث والتسجيل</p>
                        @foreach([
                            ['label' => 'تسجيل الحصة آلياً', 'icon' => 'video'],
                            ['label' => 'السماح بالدردشة العامة', 'icon' => 'message-square'],
                            ['label' => 'تفعيل الكاميرا للجميع', 'icon' => 'camera'],
                        ] as $pref)
                            <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl">
                                <div class="flex items-center gap-3">
                                    <i data-lucide="{{ $pref['icon'] }}" class="w-4 h-4 text-gov-green"></i>
                                    <span class="text-xs font-bold text-slate-700">{{ $pref['label'] }}</span>
                                </div>
                                <div class="w-10 h-5 bg-gov-green rounded-full relative">
                                    <div class="absolute right-1 top-1 w-3 h-3 bg-white rounded-full"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Room Settings -->
                    <div class="space-y-4">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">إدارة الحضور</p>
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-slate-400">الحد الأقصى للمتربصين</label>
                            <input type="number" value="40" class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 font-bold text-slate-800 outline-none">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold text-slate-400">كلمة مرور الغرفة (اختياري)</label>
                            <input type="password" placeholder="••••••••" class="w-full bg-slate-50 border-none rounded-xl px-4 py-3 font-bold text-slate-800 outline-none">
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 flex gap-4">
                    <button @click="sessionSettings = false" class="flex-1 py-4 bg-slate-100 text-slate-500 rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-slate-200 transition-all">إلغاء</button>
                    <button @click="sessionSettings = false" class="flex-[2] py-4 bg-gov-green text-white rounded-2xl font-black text-[10px] uppercase tracking-widest hover:bg-gov-green-dark transition-all">حفظ التغييرات</button>
                </div>
            </div>
        </x-teacher-modal>

        <!-- Join Session Modal (Simulation) -->
        <x-teacher-modal name="joinActive" title="دخول الغرفة الافتراضية">
            <div class="text-center py-10">
                <div class="w-32 h-32 bg-gov-green/10 text-gov-green rounded-[40px] mx-auto flex items-center justify-center mb-8 relative group">
                    <div class="absolute inset-0 bg-gov-green rounded-[40px] animate-ping opacity-20 group-hover:opacity-40"></div>
                    <i data-lucide="video" class="w-16 h-16 text-gov-gold relative z-10"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-2">جاري التحضير للبث المباشر...</h3>
                <p class="text-slate-500 text-sm font-medium mb-12">يرجى التأكد من عمل الميكروفون والكاميرا قبل الدخول.</p>
                
                <div class="grid grid-cols-2 gap-4 mb-12">
                    <div class="p-6 bg-slate-50 rounded-3xl border-2 border-gov-green">
                         <i data-lucide="mic" class="w-6 h-6 text-gov-green mx-auto mb-3"></i>
                         <p class="text-[10px] font-black uppercase text-gov-green">الميكروفون نشط</p>
                    </div>
                    <div class="p-6 bg-slate-50 rounded-3xl border-2 border-slate-100">
                         <i data-lucide="camera" class="w-6 h-6 text-slate-300 mx-auto mb-3"></i>
                         <p class="text-[10px] font-black uppercase text-slate-400">الكاميرا معطلة</p>
                    </div>
                </div>

                <button @click="joinActive = false" class="w-full bg-gov-green text-white py-6 rounded-[32px] font-black text-sm uppercase tracking-[0.2em] shadow-2xl shadow-gov-green/40 hover:bg-gov-green-dark transition-all flex items-center justify-center gap-4">
                    ابدأ الحصة الآن
                    <i data-lucide="arrow-left" class="w-6 h-6 text-gov-gold"></i>
                </button>
            </div>
        </x-teacher-modal>
    </div>
@endsection

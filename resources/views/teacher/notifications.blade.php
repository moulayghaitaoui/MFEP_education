@extends('layouts.teacher')

@section('title', 'مركز الإشعارات - فضاء الأستاذ')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-4">مركز الإشعارات والتنبيهات</h1>
            <p class="text-slate-500 font-medium text-lg">تابع كافة المستجدات المتعلقة بدوراتك، طلابك، والتوجيهات الإدارية.</p>
        </div>

        <div class="space-y-6">
            @foreach([
                ['type' => 'student', 'title' => 'متربص جديد أنهى الاختبار', 'desc' => 'أكمل المتربص "كريم زدام" اختبار الوحدة 4 بنجاح بمعدل 19/20.', 'time' => 'منذ 5 دقائق', 'unread' => true],
                ['type' => 'system', 'title' => 'تحديث منصة الأستاذ v2.4', 'desc' => 'تم إضافة ميزات جديدة لمنشئ الاختبارات الذكي، يرجى الاطلاع على دليل الاستخدام.', 'time' => 'منذ ساعتين', 'unread' => true],
                ['type' => 'admin', 'title' => 'اجتماع تنسيقي بيداغوجي', 'desc' => 'تمت جدولة اجتماع عبر المنصة لجميع أساتذة قسم البرمجيات يوم الخميس القادم.', 'time' => 'منذ يوم', 'unread' => false],
                ['type' => 'request', 'title' => 'طلب مراجعة مشروع', 'desc' => 'أرسلت الطالبة "سارة منصوري" نسخة من مشروعها النهائي للمراجعة والتقييم.', 'time' => 'منذ يومين', 'unread' => false],
            ] as $notif)
                <div @class([
                    'bg-white p-8 rounded-[40px] border flex items-center gap-8 group transition-all duration-300 relative overflow-hidden',
                    'border-indigo-100 shadow-xl shadow-indigo-900/5' => $notif['unread'],
                    'border-slate-100 opacity-80 hover:opacity-100 shadow-sm' => !$notif['unread'],
                ])>
                    @if($notif['unread'])
                        <div class="absolute top-0 right-0 w-2 h-full bg-indigo-600"></div>
                    @endif
                    
                    <div @class([
                        'w-16 h-16 rounded-[24px] flex items-center justify-center flex-shrink-0 transition-transform group-hover:scale-110',
                        'bg-indigo-600 text-white shadow-xl shadow-indigo-600/30' => $notif['type'] == 'student' || $notif['type'] == 'request',
                        'bg-amber-100 text-amber-600' => $notif['type'] == 'system',
                        'bg-emerald-100 text-emerald-600' => $notif['type'] == 'admin',
                    ])>
                        <i data-lucide="{{ $notif['type'] == 'student' ? 'user-check' : ($notif['type'] == 'system' ? 'zap' : ($notif['type'] == 'admin' ? 'calendar-check' : 'message-square')) }}" class="w-8 h-8"></i>
                    </div>

                    <div class="flex-1">
                        <div class="flex items-center gap-4 mb-2">
                            <h3 class="text-xl font-black text-slate-900 group-hover:text-indigo-600 transition-colors">{{ $notif['title'] }}</h3>
                            @if($notif['unread'])
                                <span class="px-2 py-0.5 bg-indigo-100 text-indigo-600 text-[8px] font-black rounded-md uppercase tracking-widest animate-pulse">جديد</span>
                            @endif
                        </div>
                        <p class="text-slate-500 font-bold leading-relaxed mb-4">{{ $notif['desc'] }}</p>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ $notif['time'] }}</p>
                    </div>

                    <button class="p-4 bg-slate-50 text-slate-300 rounded-2xl group-hover:bg-indigo-50 group-hover:text-indigo-600 transition-all">
                        <i data-lucide="chevron-left" class="w-6 h-6"></i>
                    </button>
                </div>
            @endforeach
        </div>

        <div class="mt-12 text-center">
            <button class="px-10 py-5 bg-white border border-slate-200 text-slate-400 rounded-3xl text-xs font-black uppercase tracking-widest hover:text-indigo-600 hover:border-indigo-100 transition-all shadow-sm">
                تحميل المزيد من الإشعارات
            </button>
        </div>
    </div>
@endsection

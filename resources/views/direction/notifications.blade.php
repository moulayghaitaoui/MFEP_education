@extends('layouts.app')

@section('title', 'مركز التنبيهات الولائي - مديرية سطيف')

@section('content')
    <div x-data="{ filter: 'all' }">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tighter">سجل التنبيهات والإشعارات</h1>
                <p class="text-slate-500 font-medium mt-1">متابعة كافة الأحداث والتقارير الواردة من المعاهد والمراكز.</p>
            </div>
            
            <div class="flex items-center gap-3">
                <button class="bg-white border border-slate-200 px-6 py-3 rounded-2xl font-bold text-sm text-slate-600 hover:bg-slate-50 transition-all">
                    تحديد الكل كمقروء
                </button>
            </div>
        </div>

        <!-- Notification Filters -->
        <div class="flex items-center gap-2 mb-10 bg-white p-2 rounded-[24px] border border-slate-100 shadow-sm w-fit">
            <button @click="filter = 'all'" :class="filter === 'all' ? 'bg-slate-900 text-white' : 'text-slate-500 hover:bg-slate-50'" class="px-8 py-3 rounded-[18px] text-xs font-black transition-all">الكل</button>
            <button @click="filter = 'urgent'" :class="filter === 'urgent' ? 'bg-red-600 text-white shadow-lg shadow-red-500/20' : 'text-slate-500 hover:bg-slate-50'" class="px-8 py-3 rounded-[18px] text-xs font-black transition-all">عاجل</button>
            <button @click="filter = 'academic'" :class="filter === 'academic' ? 'bg-slate-900 text-white' : 'text-slate-500 hover:bg-slate-50'" class="px-8 py-3 rounded-[18px] text-xs font-black transition-all">بيداغوجي</button>
            <button @click="filter = 'admin'" :class="filter === 'admin' ? 'bg-slate-900 text-white' : 'text-slate-500 hover:bg-slate-50'" class="px-8 py-3 rounded-[18px] text-xs font-black transition-all">إداري</button>
        </div>

        <!-- Notifications List -->
        <div class="space-y-4">
            @php
                $notifications = [
                    ['id' => 1, 'title' => 'تعديل جدول الحصص', 'desc' => 'قام معهد سطيف 01 بتعديل الجدول الزمني لفوج المعلوماتية (السداسي الثاني).', 'time' => 'منذ 5 دقائق', 'type' => 'academic', 'priority' => 'normal', 'icon' => 'calendar'],
                    ['id' => 2, 'title' => 'غياب جماعي للأساتذة', 'desc' => 'تم تسجيل غياب لـ 4 أساتذة في مركز العلمة بسبب إضراب مفاجئ.', 'time' => 'منذ ساعة', 'type' => 'urgent', 'priority' => 'high', 'icon' => 'alert-circle'],
                    ['id' => 3, 'title' => 'طلب ميزانية تسيير', 'desc' => 'معهد عين الكبيرة يطلب مراجعة ميزانية الصيانة للفصل القادم.', 'time' => 'منذ 3 ساعات', 'type' => 'admin', 'priority' => 'normal', 'icon' => 'credit-card'],
                    ['id' => 4, 'title' => 'جاهزية نتائج الاختبارات', 'desc' => 'تم الانتهاء من تصحيح ورفع نتائج دورة فيفري لمركز بوقاعة.', 'time' => 'منذ 5 ساعات', 'type' => 'academic', 'priority' => 'normal', 'icon' => 'clipboard-check'],
                    ['id' => 5, 'title' => 'عطل تقني في السيرفر', 'desc' => 'فشل الاتصال بقاعدة بيانات معهد حمام السخنة (جاري الإصلاح).', 'time' => 'منذ يوم', 'type' => 'urgent', 'priority' => 'high', 'icon' => 'server-off'],
                ];
            @endphp

            @foreach($notifications as $notif)
                <div x-show="filter === 'all' || filter === '{{ $notif['type'] }}' || (filter === 'urgent' && '{{ $notif['priority'] }}' === 'high')" 
                     class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-sm hover:shadow-md transition-all group relative">
                    <div class="flex flex-col md:flex-row md:items-center gap-8">
                        <div @class([
                            'w-16 h-16 rounded-[24px] flex items-center justify-center flex-shrink-0 transition-transform group-hover:scale-110',
                            'bg-blue-50 text-blue-600' => $notif['type'] == 'academic',
                            'bg-red-50 text-red-600' => $notif['type'] == 'urgent',
                            'bg-slate-50 text-slate-600' => $notif['type'] == 'admin',
                        ])>
                            <i data-lucide="{{ $notif['icon'] }}" class="w-8 h-8"></i>
                        </div>
                        
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <h3 class="text-xl font-black text-slate-900 tracking-tight">{{ $notif['title'] }}</h3>
                                @if($notif['priority'] == 'high')
                                    <span class="px-2 py-0.5 bg-red-100 text-red-600 text-[9px] font-black rounded uppercase">عاجل</span>
                                @endif
                            </div>
                            <p class="text-sm font-bold text-slate-500 leading-relaxed">{{ $notif['desc'] }}</p>
                        </div>
                        
                        <div class="md:text-left flex flex-col md:items-end gap-4">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">{{ $notif['time'] }}</span>
                            <div class="flex gap-2">
                                <button class="px-6 py-2.5 bg-slate-900 text-white rounded-xl text-[11px] font-black hover:bg-blue-600 transition-all">معالجة</button>
                                <button class="p-2.5 bg-slate-50 text-slate-400 hover:bg-slate-100 rounded-xl transition-all"><i data-lucide="archive" class="w-4 h-4"></i></button>
                            </div>
                        </div>
                    </div>
                    @if($notif['priority'] == 'high')
                        <div class="absolute top-4 left-4 w-2 h-2 bg-red-500 rounded-full animate-ping"></div>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Empty State Preview -->
        <div x-show="false" class="h-96 flex flex-col items-center justify-center text-slate-300">
            <i data-lucide="bell-off" class="w-20 h-20 mb-6 opacity-20"></i>
            <p class="font-black text-lg uppercase tracking-widest">لا توجد تنبيهات حالياً</p>
        </div>
    </div>
@endsection

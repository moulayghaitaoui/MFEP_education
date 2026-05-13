<div class="flex flex-col h-full bg-white">
    <!-- Header -->
    <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-slate-50">
        <h2 class="text-xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
            <i data-lucide="bell" class="w-5 h-5 text-blue-600"></i>
            الإشعارات المركزية
        </h2>
        <button @click="notificationsOpen = false" class="p-2 hover:bg-slate-200 rounded-lg transition-colors">
            <i data-lucide="x" class="w-5 h-5 text-slate-500"></i>
        </button>
    </div>

    <!-- Content -->
    <div class="flex-1 overflow-y-auto p-4 space-y-4 custom-scrollbar">
        @php
            $notifications = [
                ['title' => 'تنبيه أمان', 'desc' => 'محاولة دخول مشبوهة من عنوان IP: 192.168.1.45', 'time' => 'منذ 5 دقائق', 'type' => 'alert', 'icon' => 'shield-alert'],
                ['title' => 'تقرير جديد', 'desc' => 'تم إنشاء التقرير السنوي لمديرية وهران بنجاح', 'time' => 'منذ ساعة', 'type' => 'info', 'icon' => 'file-text'],
                ['title' => 'تحديث النظام', 'desc' => 'تمت ترقية المنصة إلى النسخة 2.4.0 بنجاح', 'time' => 'منذ 3 ساعات', 'type' => 'success', 'icon' => 'check-circle'],
                ['title' => 'طلب مساعدة', 'desc' => 'معهد القبة يطلب تحديث صلاحيات الوصول للأساتذة', 'time' => 'منذ 5 ساعات', 'type' => 'warning', 'icon' => 'help-circle'],
                ['title' => 'إحصائيات المتربصين', 'desc' => 'ارتفاع نسبة التسجيل بـ 12% في ولاية سطيف', 'time' => 'منذ يوم', 'type' => 'info', 'icon' => 'trending-up'],
            ];
        @endphp

        @foreach($notifications as $notif)
            <div class="p-4 rounded-2xl border border-slate-100 hover:border-blue-100 hover:bg-blue-50/30 transition-all group relative">
                <div class="flex gap-4">
                    <div @class([
                        'w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0',
                        'bg-red-50 text-red-600' => $notif['type'] == 'alert',
                        'bg-blue-50 text-blue-600' => $notif['type'] == 'info',
                        'bg-emerald-50 text-emerald-600' => $notif['type'] == 'success',
                        'bg-amber-50 text-amber-600' => $notif['type'] == 'warning',
                    ])>
                        <i data-lucide="{{ $notif['icon'] }}" class="w-5 h-5"></i>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start mb-1">
                            <h4 class="text-sm font-bold text-slate-800">{{ $notif['title'] }}</h4>
                            <span class="text-[10px] font-medium text-slate-400 whitespace-nowrap">{{ $notif['time'] }}</span>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed">{{ $notif['desc'] }}</p>
                    </div>
                </div>
                <div class="absolute top-2 left-2 w-2 h-2 bg-blue-600 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </div>
        @endforeach
    </div>

    <!-- Footer -->
    <div class="p-6 border-t border-slate-100 bg-slate-50">
        <button class="w-full py-3 bg-white border border-slate-200 text-blue-600 font-bold text-sm rounded-xl hover:bg-blue-600 hover:text-white transition-all shadow-sm">
            مشاهدة جميع التنبيهات
        </button>
    </div>
</div>

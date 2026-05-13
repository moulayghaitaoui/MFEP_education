@extends('layouts.admin')

@section('title', 'الإحصائيات العامة والتحليلات - وزارة التكوين المهني')

@section('navbar')
    <header class="h-24 bg-white/80 backdrop-blur-xl border-b border-slate-100 flex items-center justify-between px-12 z-20">
        <div class="flex items-center gap-8">
            <button @click="sidebarOpen = !sidebarOpen" class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 hover:text-slate-900 transition-all">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <h2 class="text-xl font-black text-slate-900 tracking-tight">مركز البيانات والتحليلات الوطنية</h2>
        </div>
        
        <div class="flex items-center gap-4">
            <button class="bg-gov-green text-white px-8 py-4 rounded-3xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-gov-green/20 hover:bg-gov-green-dark transition-all flex items-center gap-3">
                <i data-lucide="download" class="w-5 h-5 text-gov-gold"></i>
                تصدير البيانات (Excel)
            </button>
        </div>
    </header>
@endsection

@section('content')
    <div class="p-12 space-y-12">
        <!-- Analytics Header -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-10 rounded-[48px] border border-slate-100 shadow-sm relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-[10px] font-black text-gov-green uppercase tracking-widest mb-2">معدل النمو الوطني</p>
                    <h3 class="text-4xl font-black text-slate-900">+14.2%</h3>
                    <p class="text-xs text-slate-400 mt-4 font-bold">زيادة في عدد المسجلين مقارنة بالسنة الماضية</p>
                </div>
                <i data-lucide="trending-up" class="absolute -bottom-4 -left-4 w-24 h-24 text-gov-green/5 -rotate-12 group-hover:scale-110 transition-transform"></i>
            </div>
            <div class="bg-white p-10 rounded-[48px] border border-slate-100 shadow-sm relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-[10px] font-black text-gov-gold uppercase tracking-widest mb-2">التخصصات الأكثر طلباً</p>
                    <h3 class="text-4xl font-black text-slate-900">الرقمنة</h3>
                    <p class="text-xs text-slate-400 mt-4 font-bold">تمثل 32% من إجمالي الاختيارات الوطنية</p>
                </div>
                <i data-lucide="cpu" class="absolute -bottom-4 -left-4 w-24 h-24 text-gov-gold/5 -rotate-12 group-hover:scale-110 transition-transform"></i>
            </div>
            <div class="bg-white p-10 rounded-[48px] border border-slate-100 shadow-sm relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-[10px] font-black text-emerald-600 uppercase tracking-widest mb-2">نسبة إدماج الخريجين</p>
                    <h3 class="text-4xl font-black text-slate-900">76%</h3>
                    <p class="text-xs text-slate-400 mt-4 font-bold">معدل التوظيف المباشر بعد التخرج</p>
                </div>
                <i data-lucide="briefcase" class="absolute -bottom-4 -left-4 w-24 h-24 text-emerald-600/5 -rotate-12 group-hover:scale-110 transition-transform"></i>
            </div>
        </div>

        <!-- Main Analytics Charts -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-12">
            <div class="bg-white rounded-[48px] p-12 border border-slate-100 shadow-sm">
                <div class="flex items-center justify-between mb-12">
                    <h3 class="text-xl font-black text-slate-900">توزيع المتربصين حسب الفئات العمرية</h3>
                    <i data-lucide="pie-chart" class="w-6 h-6 text-slate-300"></i>
                </div>
                <div class="h-80 flex items-center justify-center bg-slate-50 rounded-[40px] border-2 border-dashed border-slate-100">
                    <p class="text-sm font-black text-slate-400 uppercase tracking-widest">مخطط تفاعلي (Age Distribution Chart)</p>
                </div>
            </div>
            <div class="bg-white rounded-[48px] p-12 border border-slate-100 shadow-sm">
                <div class="flex items-center justify-between mb-12">
                    <h3 class="text-xl font-black text-slate-900">معدل الانقطاع عن التكوين (وطني)</h3>
                    <i data-lucide="bar-chart-3" class="w-6 h-6 text-slate-300"></i>
                </div>
                <div class="h-80 flex items-center justify-center bg-slate-50 rounded-[40px] border-2 border-dashed border-slate-100">
                    <p class="text-sm font-black text-slate-400 uppercase tracking-widest">مخطط الانحدار (Regression Chart)</p>
                </div>
            </div>
        </div>

        <!-- Geographical Stats Table -->
        <div class="bg-white rounded-[48px] border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-10 border-b border-slate-50 bg-slate-50/30">
                <h3 class="text-xl font-black text-slate-900">تحليل الأداء الإقليمي</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-right">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-10 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">الإقليم / الولاية</th>
                            <th class="px-10 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">عدد المسجلين</th>
                            <th class="px-10 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">نسبة النجاح</th>
                            <th class="px-10 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">كفاءة الموارد</th>
                            <th class="px-10 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">التوجه المهني</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach([
                            ['name' => 'الجزائر العاصمة', 'count' => '142,500', 'rate' => '94%', 'eff' => 'عالية جداً', 'pref' => 'إلكترونيك'],
                            ['name' => 'سطيف', 'count' => '45,240', 'rate' => '89%', 'eff' => 'عالية', 'pref' => 'بناء'],
                            ['name' => 'وهران', 'count' => '88,900', 'rate' => '91%', 'eff' => 'متوسطة', 'pref' => 'بتروكيمياء'],
                            ['name' => 'ورقلة', 'count' => '32,100', 'rate' => '82%', 'eff' => 'تحت التطوير', 'pref' => 'طاقة'],
                        ] as $row)
                        <tr class="hover:bg-slate-50 transition-all group">
                            <td class="px-10 py-6 text-sm font-black text-slate-900">{{ $row['name'] }}</td>
                            <td class="px-10 py-6 text-sm font-bold text-slate-600">{{ $row['count'] }}</td>
                            <td class="px-10 py-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-16 h-2 bg-slate-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-gov-green" style="width: {{ $row['rate'] }}"></div>
                                    </div>
                                    <span class="text-xs font-black text-gov-green">{{ $row['rate'] }}</span>
                                </div>
                            </td>
                            <td class="px-10 py-6 text-xs font-black text-slate-500">{{ $row['eff'] }}</td>
                            <td class="px-10 py-6">
                                <span class="px-4 py-1.5 bg-slate-100 rounded-lg text-[10px] font-black text-slate-400 uppercase tracking-widest">{{ $row['pref'] }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'مركز التحكم الوطني الذكي - وزارة التكوين المهني')

@section('navbar')
    <header class="h-24 bg-white/80 backdrop-blur-xl border-b border-slate-100 flex items-center justify-between px-12 z-20">
        <div class="flex items-center gap-8">
            <button @click="sidebarOpen = !sidebarOpen" class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 hover:text-slate-900 transition-all">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <div>
                <h2 class="text-xl font-black text-slate-900 tracking-tight">لوحة الإدارة العليا</h2>
                <p class="text-[10px] font-black text-cyan-600 uppercase tracking-widest mt-0.5">الجمهورية الجزائرية الديمقراطية الشعبية</p>
            </div>
        </div>

        <div class="flex items-center gap-6">
            <div class="hidden md:flex items-center gap-3 px-6 py-3 bg-slate-50 rounded-2xl border border-slate-100">
                <i data-lucide="search" class="w-4 h-4 text-slate-400"></i>
                <input type="text" placeholder="البحث في النظام..." class="bg-transparent border-none p-0 text-xs font-bold focus:ring-0 w-48 outline-none">
            </div>
            <div class="flex items-center gap-4">
                <button class="relative w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 hover:text-slate-900 transition-all">
                    <i data-lucide="bell" class="w-6 h-6"></i>
                    <span class="absolute top-2 right-2 w-3 h-3 bg-rose-500 border-4 border-white rounded-full"></span>
                </button>
                <div class="w-12 h-12 rounded-2xl bg-slate-900 flex items-center justify-center text-white font-black text-xs shadow-xl shadow-slate-900/10 cursor-pointer hover:scale-105 transition-transform">
                    ADM
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="p-12 space-y-12">
        <!-- Welcome Section -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8 animate-fade-in">
            <div>
                <h1 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tighter mb-2 leading-tight">مرحباً، <span class="text-gov-green">سيادة الوزير</span></h1>
                <p class="text-slate-500 font-medium text-lg">نظرة شاملة على مؤشرات الأداء الوطني لقطاع التكوين المهني.</p>
            </div>
            <div class="flex gap-4">
                <button class="bg-gov-green text-white px-8 py-4 rounded-3xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-gov-green/20 hover:bg-gov-green-dark transition-all flex items-center gap-3">
                    <i data-lucide="plus" class="w-5 h-5 text-gov-gold"></i>
                    إضافة معهد جديد
                </button>
                <button class="bg-white text-slate-900 border border-slate-200 px-8 py-4 rounded-3xl font-black text-[10px] uppercase tracking-widest hover:bg-slate-50 transition-all flex items-center gap-3">
                    <i data-lucide="map" class="w-5 h-5 text-gov-green"></i>
                    إضافة مديرية
                </button>
            </div>
        </div>

        <!-- National Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">
            <x-admin-stat-card label="إجمالي المتربصين وطنياً" value="1.2M" trend="+12.5%" icon="users" color="blue" />
            <x-admin-stat-card label="عدد المعاهد والمراكز" value="1,452" trend="+2.4%" icon="building-2" color="indigo" />
            <x-admin-stat-card label="نسبة النجاح العامة" value="88.4%" trend="+4.1%" icon="graduation-cap" color="cyan" />
            <x-admin-stat-card label="المشاريع التكنولوجية" value="124" trend="+35%" icon="cpu" color="blue" />
        </div>

        <!-- Main Analytics Section -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-12">
            <!-- National Enrollment Chart -->
            <div class="xl:col-span-2">
                <x-admin-chart-placeholder title="تطور وتيرة التسجيلات الوطنية" />
            </div>

            <!-- Right Column: AI Insights & Real-time Feed -->
            <div class="space-y-12">
                <!-- AI Insights -->
                <div class="bg-slate-900 rounded-[48px] p-10 text-white relative overflow-hidden group">
                     <div class="absolute -top-24 -right-24 w-64 h-64 bg-cyan-500/20 rounded-full blur-[80px]"></div>
                     <div class="relative z-10">
                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-10 h-10 bg-cyan-500 rounded-xl flex items-center justify-center shadow-lg"><i data-lucide="sparkles" class="w-5 h-5"></i></div>
                            <span class="text-[10px] font-black uppercase tracking-widest text-cyan-400">توقعات الذكاء الاصطناعي</span>
                        </div>
                        <h4 class="text-2xl font-black mb-4 leading-tight">زيادة متوقعة بنسبة 15% في طلب تخصصات البرمجيات.</h4>
                        <p class="text-slate-400 text-sm font-medium mb-8">بناءً على اتجاهات السوق في الربع الأخير، ننصح بتوسيع الشعب التكنولوجية في ولايات الشرق.</p>
                        <button class="w-full py-4 bg-white/5 border border-white/10 rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-white/10 transition-all">تحميل التقرير الاستشاري</button>
                     </div>
                </div>

                <!-- Real-time Activity Feed -->
                <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm">
                    <h3 class="text-xl font-black text-slate-900 tracking-tight mb-8">آخر النشاطات الوطنية</h3>
                    <div class="space-y-8">
                        @foreach([
                            ['icon' => 'plus-circle', 'text' => 'افتتاح معهد جديد في ولاية سطيف', 'time' => 'منذ ساعة', 'color' => 'cyan'],
                            ['icon' => 'file-text', 'text' => 'إصدار القرار الوزاري رقم 421', 'time' => 'منذ 3 ساعات', 'color' => 'blue'],
                            ['icon' => 'alert-triangle', 'text' => 'تنبيه صيانة في مركز وهران 02', 'time' => 'منذ 5 ساعات', 'color' => 'amber'],
                        ] as $activity)
                            <div class="flex items-start gap-4">
                                <div @class([
                                    'w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0',
                                    'bg-cyan-50 text-cyan-600' => $activity['color'] == 'cyan',
                                    'bg-blue-50 text-blue-600' => $activity['color'] == 'blue',
                                    'bg-amber-50 text-amber-600' => $activity['color'] == 'amber',
                                ])><i data-lucide="{{ $activity['icon'] }}" class="w-4 h-4"></i></div>
                                <div>
                                    <p class="text-xs font-black text-slate-900 leading-tight mb-1">{{ $activity['text'] }}</p>
                                    <p class="text-[9px] font-bold text-slate-400 uppercase">{{ $activity['time'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Institutes Section -->
        <div class="space-y-8 pb-12">
            <div class="flex items-center justify-between px-4">
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">المعاهد النموذجية الأعلى أداءً</h3>
                <a href="{{ route('admin.institutes') }}" class="text-[10px] font-black text-cyan-600 uppercase tracking-widest hover:text-slate-900 transition-colors">عرض جميع المعاهد</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
                <x-admin-institute-card name="المعهد الوطني المتخصص في التكوين المهني - سطيف" location="سطيف، الجزائر" students="1,240" status="active" />
                <x-admin-institute-card name="مركز التكوين المهني والتمهين - الجزائر الوسطى" location="الجزائر العاصمة" students="850" status="active" />
                <x-admin-institute-card name="المعهد الوطني للفنون الجميلة والمهن" location="وهران، الجزائر" students="620" status="maintenance" />
            </div>
        </div>
    </div>
@endsection

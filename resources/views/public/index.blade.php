@extends('layouts.public')

@section('title', 'منصة التكوين والتعليم المهنيين - الرئيسية')

@section('content')
    <div class="bg-white overflow-x-hidden">
        <!-- Navbar -->
        <x-public-navbar />

        <!-- Hero Section -->
        <section class="relative pt-48 pb-32 lg:pt-64 lg:pb-48 overflow-hidden">
            <!-- Background Decorations -->
            <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-gov-green/5 rounded-full blur-[120px] -mr-96 -mt-96 animate-pulse"></div>
            <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-gov-gold/5 rounded-full blur-[100px] -ml-48 -mb-48"></div>

            <div class="max-w-7xl mx-auto px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                    <div class="animate-fade-in-up">
                        <div class="inline-flex items-center gap-3 px-5 py-2 bg-gov-green/10 text-gov-green rounded-full text-[10px] font-black uppercase tracking-[0.2em] mb-8 border border-gov-green/20 shadow-sm">
                            <i data-lucide="sparkles" class="w-4 h-4"></i>
                            التحول الرقمي لقطاع التكوين المهني
                        </div>
                        <h1 class="text-6xl lg:text-8xl font-black text-slate-900 tracking-tighter mb-8 leading-[1.1]">
                            منصة رقمية ذكية <br>
                            <span class="text-gov-green">لمستقبل مهاراتك</span>
                        </h1>
                        <p class="text-xl text-slate-500 font-medium mb-12 max-w-xl leading-relaxed">بوابة وطنية متكاملة تجمع بين التعليم الإلكتروني التفاعلي، إدارة المعاهد، والشهادات الرقمية المعتمدة لتمكين الشباب الجزائري.</p>
                        <div class="flex flex-wrap gap-6">
                            <a href="{{ route('login') }}" class="bg-gov-green text-white px-12 py-6 rounded-[32px] font-black text-xs uppercase tracking-[0.2em] shadow-2xl shadow-gov-green/40 hover:bg-gov-green-dark hover:-translate-y-1 transition-all">ابدأ رحلة التعلم</a>
                            <a href="#" class="bg-white text-slate-900 px-12 py-6 rounded-[32px] font-black text-xs uppercase tracking-[0.2em] border border-slate-200 hover:bg-slate-50 transition-all flex items-center gap-3">
                                <i data-lucide="play-circle" class="w-6 h-6 text-gov-green"></i>
                                جولة في المنصة
                            </a>
                        </div>
                        
                        <div class="mt-16 flex items-center gap-8">
                            <div class="flex -space-x-4">
                                @foreach([1,2,3,4] as $i)
                                    <div class="w-12 h-12 rounded-full border-4 border-white bg-slate-100 flex items-center justify-center text-[10px] font-black text-slate-400">U{{ $i }}</div>
                                @endforeach
                            </div>
                            <p class="text-[11px] font-black text-slate-400 uppercase tracking-widest">+1.2 مليون متربص مسجل حالياً</p>
                        </div>
                    </div>

                    <div class="relative animate-fade-in">
                        <div class="bg-white rounded-[60px] p-4 shadow-2xl border border-slate-100 relative group overflow-hidden">
                             <div class="absolute inset-0 bg-gradient-to-br from-gov-green/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                             <div class="aspect-[4/3] bg-slate-50 rounded-[48px] overflow-hidden relative">
                                <!-- Mockup Content -->
                                <div class="p-8 space-y-6">
                                    <div class="flex items-center justify-between">
                                        <div class="flex gap-2">
                                            <div class="w-3 h-3 rounded-full bg-rose-400"></div>
                                            <div class="w-3 h-3 rounded-full bg-gov-gold"></div>
                                            <div class="w-3 h-3 rounded-full bg-gov-green"></div>
                                        </div>
                                        <div class="w-32 h-2 bg-slate-200 rounded-full"></div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-6">
                                        <div class="h-32 bg-white rounded-3xl shadow-sm border border-slate-100 animate-pulse"></div>
                                        <div class="h-32 bg-white rounded-3xl shadow-sm border border-slate-100"></div>
                                    </div>
                                    <div class="h-48 bg-white rounded-[32px] shadow-sm border border-slate-100 flex items-center justify-center">
                                        <i data-lucide="layout-dashboard" class="w-16 h-16 text-gov-green/10"></i>
                                    </div>
                                </div>
                             </div>
                        </div>
                        <!-- Floating Badges -->
                        <div class="absolute -top-10 -left-10 bg-white p-6 rounded-[32px] shadow-2xl border border-slate-50 animate-bounce-slow">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-emerald-50 text-gov-green rounded-2xl flex items-center justify-center"><i data-lucide="check-circle" class="w-6 h-6"></i></div>
                                <div>
                                    <p class="text-xs font-black text-slate-900 uppercase">شهادة معتمدة</p>
                                    <p class="text-[9px] font-bold text-slate-400 uppercase">تم الحصول عليها</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics Section -->
        <section class="py-24 bg-slate-50">
            <div class="max-w-7xl mx-auto px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                    @foreach([
                        ['v' => '1.2M', 'l' => 'متربص نشط', 'i' => 'users'],
                        ['v' => '1.4K', 'l' => 'معهد ومركز', 'i' => 'building-2'],
                        ['v' => '120K', 'l' => 'شهادة رقمية', 'i' => 'award'],
                        ['v' => '450+', 'l' => 'تخصص تقني', 'i' => 'cpu'],
                    ] as $s)
                        <div class="text-center group">
                            <div class="w-16 h-16 bg-white rounded-2xl mx-auto flex items-center justify-center text-gov-green shadow-sm mb-6 transition-transform group-hover:-translate-y-2">
                                <i data-lucide="{{ $s['i'] }}" class="w-7 h-7"></i>
                            </div>
                            <h3 class="text-4xl font-black text-slate-900 tracking-tighter mb-2">{{ $s['v'] }}</h3>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">{{ $s['l'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-32">
            <div class="max-w-7xl mx-auto px-8">
                <div class="text-center max-w-2xl mx-auto mb-24">
                    <h2 class="text-4xl font-black text-slate-900 tracking-tighter mb-6">نظام تعليمي متكامل للقرن الواحد والعشرين</h2>
                    <p class="text-slate-500 font-medium">نجمع بين الخبرة البيداغوجية للوزارة وأحدث تقنيات التعليم الرقمي العالمي.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    <x-feature-card title="التعليم الإلكتروني التفاعلي" desc="دروس غامرة تحتوي على أسئلة مدمجة لضمان التفاعل المستمر وفهم المعلومة." icon="monitor-play" color="blue" />
                    <x-feature-card title="شهادات رقمية موثقة" desc="نظام شهادات فوري مع رمز QR للتحقق السريع من صحة المؤهلات عبر منصات التوظيف." icon="award" color="gold" />
                    <x-feature-card title="إدارة المعاهد الذكية" desc="لوحات تحكم متقدمة لمدراء المعاهد لمتابعة الأداء الأكاديمي والإداري لحظياً." icon="layout-grid" color="emerald" />
                    <x-feature-card title="مكتبة الموارد الوطنية" desc="الوصول إلى آلاف الكتب، الفيديوهات، والدروس في كافة التخصصات التقنية." icon="library" color="blue" />
                    <x-feature-card title="التحقق من الكفاءات" desc="اختبارات تقييم ذكية تحدد نقاط القوة والضعف لكل متربص وتوفر مسارات تعويضية." icon="target" color="gold" />
                    <x-feature-card title="التواصل المباشر" desc="ربط مباشر بين المتربصين والأساتذة من خلال غرف مناقشة تفاعلية ومنتديات متخصصة." icon="message-square" color="emerald" />
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-32">
            <div class="max-w-7xl mx-auto px-8">
                <div class="bg-gov-green rounded-[64px] p-20 relative overflow-hidden text-center flex flex-col items-center">
                    <div class="absolute -top-24 -left-24 w-96 h-96 bg-white/10 rounded-full blur-[100px]"></div>
                    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-gov-green-dark/40 rounded-full blur-[100px]"></div>
                    
                    <h2 class="text-4xl md:text-6xl font-black text-white tracking-tighter mb-10 leading-tight relative z-10">
                        هل أنت جاهز لتغيير <br>
                        <span class="text-gov-gold-light">مستقبلك المهني؟</span>
                    </h2>
                    <div class="flex flex-wrap justify-center gap-6 relative z-10">
                        <a href="{{ route('login') }}" class="bg-white text-gov-green px-12 py-6 rounded-[32px] font-black text-xs uppercase tracking-[0.2em] shadow-2xl hover:-translate-y-1 transition-all">ابدأ الآن مجاناً</a>
                        <a href="#" class="bg-gov-green-dark text-white px-12 py-6 rounded-[32px] font-black text-xs uppercase tracking-[0.2em] border border-gov-green/50 hover:bg-gov-green-dark/80 transition-all">تواصل مع الدعم</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer -->
        <x-public-footer />
    </div>
@endsection

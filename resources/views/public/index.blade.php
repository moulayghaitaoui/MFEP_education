<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بوابة وزارة التكوين والتعليم المهنيين - الجزائر</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Tajawal', sans-serif; }
        .hero-gradient {
            background: radial-gradient(circle at top right, #1e3a8a 0%, #1e40af 100%);
        }
    </style>
</head>
<body class="bg-slate-50">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-900 rounded-xl flex items-center justify-center text-white">
                    <i data-lucide="graduation-cap"></i>
                </div>
                <span class="font-bold text-xl text-blue-900">وزارة التكوين المهني</span>
            </div>
            
            <div class="hidden md:flex items-center gap-8 text-sm font-bold text-slate-600">
                <a href="#" class="hover:text-blue-600 transition-colors">عن الوزارة</a>
                <a href="#" class="hover:text-blue-600 transition-colors">التخصصات</a>
                <a href="#" class="hover:text-blue-600 transition-colors">المعاهد</a>
                <a href="#" class="hover:text-blue-600 transition-colors">اتصل بنا</a>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}" class="text-blue-600 text-sm font-bold">دخول المنصة</a>
                <button class="bg-blue-600 text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-blue-700 transition-all shadow-lg shadow-blue-500/20">تسجيل جديد</button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient py-24 text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-4 py-2 rounded-full text-xs font-bold">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    التحول الرقمي لقطاع التكوين المهني
                </div>
                <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight">بوابتك الرقمية <br> <span class="text-blue-300">لمستقبل مهني واعد</span></h1>
                <p class="text-lg text-blue-100 max-w-lg leading-relaxed">المنصة الوطنية الموحدة لإدارة كافة جوانب التكوين والتعليم المهنيين في الجزائر. من التسجيل إلى التخرج، كل شيء في مكان واحد.</p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <button class="bg-white text-blue-900 px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-2xl transition-all flex items-center gap-3">
                        ابدأ مسارك الآن
                        <i data-lucide="arrow-left" class="w-5 h-5"></i>
                    </button>
                    <button class="bg-transparent border border-white/30 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-white/5 transition-all">اكتشف التخصصات</button>
                </div>
            </div>
            
            <div class="relative">
                <div class="absolute -top-20 -left-20 w-64 h-64 bg-blue-400/20 rounded-full blur-3xl"></div>
                <div class="bg-white/10 backdrop-blur-xl border border-white/20 p-8 rounded-[40px] shadow-2xl relative z-10">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white/20 p-6 rounded-3xl space-y-2">
                            <p class="text-3xl font-extrabold">1200+</p>
                            <p class="text-xs text-blue-200">مؤسسة تكوينية</p>
                        </div>
                        <div class="bg-white/20 p-6 rounded-3xl space-y-2">
                            <p class="text-3xl font-extrabold">450+</p>
                            <p class="text-xs text-blue-200">تخصص مهني</p>
                        </div>
                        <div class="col-span-2 bg-blue-500/30 p-6 rounded-3xl flex items-center justify-between">
                            <div>
                                <p class="text-xl font-bold">شهادات رقمية</p>
                                <p class="text-xs text-blue-200">موثوقة ومؤمنة</p>
                            </div>
                            <i data-lucide="shield-check" class="w-12 h-12 text-blue-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <script>lucide.createIcons();</script>
</body>
</html>

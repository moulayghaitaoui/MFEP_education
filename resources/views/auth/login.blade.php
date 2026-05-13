<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - منصة التكوين والتعليم المهنيين</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }
        .bg-pattern {
            background-color: #f8fafc;
            background-image: radial-gradient(#cbd5e1 0.5px, transparent 0.5px);
            background-size: 24px 24px;
        }
        .login-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }
        [x-cloak] { display: none !important; }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-fade-in-down {
            animation: fadeInDown 0.8s ease-out;
        }
        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }
    </style>
</head>
<body class="bg-pattern min-h-screen flex items-center justify-center p-4">
    
    <div class="w-full max-w-lg" x-data="{ role: 'admin', loading: false }">
        <!-- Logo & Header -->
        <div class="text-center mb-10 animate-fade-in-down">
            <div class="w-24 h-24 bg-white rounded-3xl shadow-2xl shadow-slate-200 mx-auto flex items-center justify-center mb-6 border border-slate-100">
                <i data-lucide="graduation-cap" class="w-12 h-12 text-slate-900"></i>
            </div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tighter mb-2">منصة التكوين والتعليم المهنيين</h1>
            <p class="text-slate-500 font-medium">بوابة التحول الرقمي للتعليم المهني - الجزائر</p>
        </div>

        <!-- Login Card -->
        <div class="login-card p-10 md:p-12 rounded-[40px] shadow-2xl shadow-slate-200 border border-white relative overflow-hidden animate-fade-in">
            <!-- Decorative Gradient -->
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-blue-600/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-indigo-600/5 rounded-full blur-3xl"></div>

            <form @submit.prevent="loading = true; setTimeout(() => window.location.href = '/' + role, 1000)" class="space-y-8 relative z-10">
                <!-- Username -->
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] px-1">اسم المستخدم</label>
                    <div class="relative group">
                        <i data-lucide="user" class="w-5 h-5 absolute right-5 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-blue-600 transition-colors"></i>
                        <input type="text" placeholder="أدخل اسم المستخدم..." class="w-full bg-slate-50 border-none rounded-2xl pr-14 pl-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-blue-600/10 outline-none transition-all">
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] px-1">كلمة المرور</label>
                    <div class="relative group">
                        <i data-lucide="lock" class="w-5 h-5 absolute right-5 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-blue-600 transition-colors"></i>
                        <input type="password" placeholder="••••••••" class="w-full bg-slate-50 border-none rounded-2xl pr-14 pl-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-blue-600/10 outline-none transition-all">
                    </div>
                </div>

                <!-- Role Selection -->
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] px-1">نوع الحساب (الدور)</label>
                    <div class="grid grid-cols-2 gap-3">
                        @foreach([
                            ['id' => 'admin', 'label' => 'الإدارة العليا', 'icon' => 'shield-check'],
                            ['id' => 'direction', 'label' => 'المديرية', 'icon' => 'building-2'],
                            ['id' => 'teacher', 'label' => 'الأستاذ', 'icon' => 'user-check'],
                            ['id' => 'student', 'label' => 'المتربص', 'icon' => 'graduation-cap'],
                        ] as $r)
                            <button type="button" 
                                    @click="role = '{{ $r['id'] }}'"
                                    :class="role === '{{ $r['id'] }}' ? 'bg-slate-900 text-white shadow-xl shadow-slate-900/20' : 'bg-white border border-slate-100 text-slate-400 hover:bg-slate-50'"
                                    class="p-4 rounded-2xl flex flex-col items-center gap-2 transition-all">
                                <i data-lucide="{{ $r['icon'] }}" class="w-5 h-5"></i>
                                <span class="text-[10px] font-black uppercase tracking-widest">{{ $r['label'] }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Login Button -->
                <button type="submit" 
                        class="w-full bg-blue-600 text-white py-5 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl shadow-blue-500/30 hover:bg-blue-700 active:scale-[0.98] transition-all flex items-center justify-center gap-3">
                    <span x-show="!loading">تسجيل الدخول</span>
                    <span x-show="loading" class="flex items-center gap-2">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        جاري التحميل...
                    </span>
                    <i x-show="!loading" data-lucide="arrow-left" class="w-5 h-5"></i>
                </button>
            </form>
        </div>

        <!-- Footer Info -->
        <div class="mt-12 text-center">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest flex items-center justify-center gap-2">
                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                جميع حقوق الطبع محفوظة لوزارة التكوين المهني © {{ date('Y') }}
            </p>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>

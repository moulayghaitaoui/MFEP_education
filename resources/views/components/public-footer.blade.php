<footer class="bg-slate-900 text-white pt-24 pb-12 overflow-hidden relative">
    <!-- Background Decor -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-gov-green/10 rounded-full blur-[100px]"></div>
    
    <div class="max-w-7xl mx-auto px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-24">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center shadow-lg border border-slate-100 overflow-hidden">
                        <img src="/assets/logo.png" alt="Logo" class="w-12 h-12 object-contain" onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Seal_of_Algeria.svg/1024px-Seal_of_Algeria.svg.png';">
                    </div>
                    <div class="flex flex-col">
                        <span class="font-black text-xl tracking-tighter uppercase text-white leading-none">وزارة التكوين</span>
                        <span class="text-[9px] font-black text-gov-green uppercase tracking-widest mt-1">والتعليم المهنيين</span>
                    </div>
                </div>
                <p class="text-slate-400 text-sm font-medium mb-10 max-w-sm leading-relaxed">المنصة الوطنية الموحدة للتحول الرقمي في قطاع التكوين والتعليم المهنيين بالجزائر.</p>
                <div class="flex gap-4">
                    @foreach(['facebook', 'twitter', 'linkedin', 'youtube'] as $social)
                        <a href="#" class="w-10 h-10 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center text-slate-400 hover:text-gov-green hover:border-gov-green transition-all">
                            <i data-lucide="{{ $social }}" class="w-5 h-5"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <div>
                <h4 class="text-lg font-black mb-8 tracking-tight">روابط سريعة</h4>
                <ul class="space-y-4">
                    @foreach(['التخصصات المتاحة', 'منصة الأساتذة', 'حساب المتربص', 'التحقق من الشهادات', 'الأسئلة الشائعة'] as $link)
                        <li><a href="#" class="text-slate-400 hover:text-gov-green transition-colors text-sm font-bold flex items-center gap-3"><div class="w-1.5 h-1.5 rounded-full bg-gov-green opacity-0 group-hover:opacity-100 transition-opacity"></div> {{ $link }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-black mb-8 tracking-tight">عن الوزارة</h4>
                <ul class="space-y-4 text-slate-400 text-sm font-bold">
                    <li>وزارة التكوين والتعليم المهنيين</li>
                    <li>شارع أول نوفمبر، الجزائر العاصمة</li>
                    <li>الهاتف: +213 21 00 00 00</li>
                    <li>البريد: contact@mfep.gov.dz</li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-black mb-8 tracking-tight">النشرة البريدية</h4>
                <p class="text-slate-400 text-xs mb-6 font-bold leading-relaxed">اشترك لتصلك آخر أخبار المسابقات والدورات التكوينية.</p>
                <div class="flex gap-2">
                    <input type="email" placeholder="بريدك الإلكتروني" class="flex-1 bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-xs outline-none focus:ring-2 focus:ring-gov-green transition-all">
                    <button class="bg-gov-green text-white px-4 py-3 rounded-xl hover:bg-gov-green-dark transition-all"><i data-lucide="send" class="w-5 h-5"></i></button>
                </div>
            </div>
        </div>

        <div class="pt-12 border-t border-white/5 flex flex-col md:flex-row items-center justify-between gap-8 text-[10px] font-black text-slate-500 uppercase tracking-widest">
            <p>© 2026 جميع الحقوق محفوظة - وزارة التكوين والتعليم المهنيين</p>
            <div class="flex gap-8">
                <a href="#" class="hover:text-white transition-colors">سياسة الخصوصية</a>
                <a href="#" class="hover:text-white transition-colors">شروط الاستخدام</a>
            </div>
        </div>
    </div>
</footer>

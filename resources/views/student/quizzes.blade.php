@extends('layouts.student')

@section('title', 'الاختبارات - تقييم المعارف')

@section('content')
    <div x-data="{ currentQ: 1, totalQ: 5, answers: {}, finished: false }" class="max-w-4xl mx-auto py-12">
        
        <!-- Quiz UI -->
        <div x-show="!finished" x-transition class="space-y-12 animate-fade-in">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-6">
                    <div class="w-16 h-16 bg-slate-900 rounded-[28px] flex items-center justify-center text-white shadow-2xl shadow-slate-900/20">
                        <i data-lucide="help-circle" class="w-8 h-8"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-slate-900 tracking-tight">اختبار الوحدة 4: بنية MVC</h1>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mt-1">متبقي 24:15 دقيقة</p>
                    </div>
                </div>
                <div class="text-left">
                    <span class="text-4xl font-black text-slate-900" x-text="currentQ"></span>
                    <span class="text-slate-300 text-xl font-bold"> / 5</span>
                </div>
            </div>

            <!-- Progress -->
            <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full bg-blue-600 transition-all duration-500" :style="'width: ' + (currentQ / 5 * 100) + '%'"></div>
            </div>

            <!-- Question Card -->
            <x-student-card padding="p-12">
                <h2 class="text-3xl font-black text-slate-900 leading-tight mb-12">ما هو الدور الرئيسي لـ Controller في بنية MVC؟</h2>
                
                <div class="space-y-4">
                    @foreach([
                        ['id' => 'a', 'text' => 'إدارة الاتصال بقاعدة البيانات واسترجاع البيانات'],
                        ['id' => 'b', 'text' => 'عرض الواجهة النهائية للمستخدم (HTML/CSS)'],
                        ['id' => 'c', 'text' => 'استقبال طلبات المستخدم وتوجيه البيانات بين الـ Model والـ View'],
                        ['id' => 'd', 'text' => 'تخزين الصور والملفات المرفوعة على السيرفر'],
                    ] as $option)
                        <button @click="answers[currentQ] = '{{ $option['id'] }}'" 
                                :class="answers[currentQ] === '{{ $option['id'] }}' ? 'border-blue-600 bg-blue-50/50' : 'border-slate-100 bg-white hover:border-blue-200'"
                                class="w-full p-8 rounded-[32px] border-2 text-right transition-all group flex items-center justify-between">
                            <span class="text-lg font-black text-slate-700 group-hover:text-blue-600 transition-colors">{{ $option['text'] }}</span>
                            <div :class="answers[currentQ] === '{{ $option['id'] }}' ? 'bg-blue-600 border-blue-600' : 'border-slate-200'" class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition-all">
                                <div x-show="answers[currentQ] === '{{ $option['id'] }}'" class="w-2 h-2 bg-white rounded-full"></div>
                            </div>
                        </button>
                    @endforeach
                </div>
            </x-student-card>

            <!-- Actions -->
            <div class="flex items-center justify-between pt-10">
                <button @click="currentQ--" :disabled="currentQ === 1" class="px-10 py-5 text-xs font-black text-slate-400 uppercase tracking-widest hover:bg-slate-50 rounded-2xl transition-all disabled:opacity-20 flex items-center gap-3">
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                    السؤال السابق
                </button>
                
                <button @click="currentQ === totalQ ? finished = true : currentQ++" 
                        class="bg-slate-900 text-white px-12 py-5 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-slate-900/20 hover:bg-blue-600 transition-all flex items-center gap-3">
                    <span x-text="currentQ === totalQ ? 'إرسال الإجابات' : 'السؤال التالي'"></span>
                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                </button>
            </div>
        </div>

        <!-- Result Preview -->
        <div x-show="finished" x-transition class="text-center py-20 animate-fade-in">
             <div class="w-32 h-32 bg-emerald-100 text-emerald-600 rounded-[40px] mx-auto flex items-center justify-center mb-10 shadow-xl shadow-emerald-500/10">
                <i data-lucide="award" class="w-16 h-16"></i>
             </div>
             <h2 class="text-4xl font-black text-slate-900 mb-4 tracking-tighter">لقد أكملت الاختبار بنجاح!</h2>
             <p class="text-slate-500 font-bold mb-12 text-lg">تم تسجيل إجاباتك بنجاح. يمكنك الآن مراجعة نتائجك النهائية.</p>
             
             <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-xl mx-auto">
                 <a href="{{ route('student.results') }}" class="bg-blue-600 text-white py-5 rounded-3xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-blue-500/30 hover:bg-blue-700 transition-all">عرض كشف النقاط</a>
                 <a href="{{ route('student.dashboard') }}" class="bg-slate-100 text-slate-500 py-5 rounded-3xl font-black text-[10px] uppercase tracking-widest hover:bg-slate-200 transition-all">العودة للرئيسية</a>
             </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'إنشاء حصة مجدولة - فضاء الأستاذ')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-10 text-center">جدولة حصة تعليمية</h1>
        
        <div class="bg-white rounded-[40px] p-10 border border-slate-100 shadow-sm space-y-8 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-50 rounded-bl-[100px] -z-10"></div>
            
            <form class="space-y-8">
                <div class="space-y-4 text-center mb-10">
                    <div class="w-20 h-20 bg-indigo-600 rounded-[28px] mx-auto flex items-center justify-center text-white shadow-xl shadow-indigo-500/30">
                        <i data-lucide="calendar-plus" class="w-10 h-10"></i>
                    </div>
                    <p class="text-slate-500 font-bold">املأ البيانات أدناه لجدولة حصة مباشرة أو حضورية جديدة.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-xs font-black text-slate-400 uppercase tracking-widest px-1">نوع الحصة</label>
                        <div class="flex gap-4">
                            <button type="button" class="flex-1 py-4 rounded-2xl bg-indigo-600 text-white font-black text-xs uppercase tracking-widest shadow-lg shadow-indigo-500/20">مباشرة (Online)</button>
                            <button type="button" class="flex-1 py-4 rounded-2xl bg-slate-50 text-slate-500 font-black text-xs uppercase tracking-widest border border-slate-100">حضورية</button>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-black text-slate-400 uppercase tracking-widest px-1">الدورة المستهدفة</label>
                        <select class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all">
                            <option>أساسيات تطوير الويب</option>
                            <option>برمجة تطبيقات الهاتف</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-black text-slate-400 uppercase tracking-widest px-1">تاريخ الحصة</label>
                        <input type="date" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-black text-slate-400 uppercase tracking-widest px-1">وقت البدء</label>
                        <input type="time" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-black text-slate-400 uppercase tracking-widest px-1">رابط الاجتماع (اختياري)</label>
                    <input type="url" placeholder="Zoom, Google Meet, or Jitsi link..." class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all">
                </div>

                <div class="pt-6 border-t border-slate-50 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                         <div x-data="{ on: true }" @click="on = !on" :class="on ? 'bg-indigo-600' : 'bg-slate-200'" class="w-10 h-5 rounded-full relative cursor-pointer transition-colors duration-300">
                             <div :class="on ? 'translate-x-1' : 'translate-x-6'" class="absolute top-0.5 right-0.5 w-4 h-4 bg-white rounded-full shadow-sm transition-transform duration-300"></div>
                         </div>
                         <span class="text-xs font-bold text-slate-500">إرسال تنبيه للطلاب فور الحفظ</span>
                    </div>
                    <button type="submit" class="px-12 py-4 bg-indigo-600 text-white rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-indigo-700 transition-all shadow-xl shadow-indigo-500/20">تأكيد الجدولة</button>
                </div>
            </form>
        </div>
    </div>
@endsection

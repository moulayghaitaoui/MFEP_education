@extends('layouts.app')

@section('title', 'إدارة المعاهد والمراكز - مديرية سطيف')

@section('content')
    <div x-data="{ showModal: false }">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tighter">المعاهد والمراكز التكوينية</h1>
                <p class="text-slate-500 font-medium mt-1">إدارة وتنسيق كافة المؤسسات التابعة لمديرية ولاية سطيف.</p>
            </div>
            
            <button @click="showModal = true" class="bg-blue-600 text-white px-6 py-3 rounded-2xl font-bold text-sm shadow-xl shadow-blue-500/20 hover:bg-blue-700 transition-all flex items-center gap-2">
                <i data-lucide="plus" class="w-4 h-4"></i>
                إضافة مؤسسة جديدة
            </button>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
            <div class="bg-white p-6 rounded-[32px] border border-slate-100 shadow-sm flex items-center gap-6">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i data-lucide="school" class="w-7 h-7"></i>
                </div>
                <div>
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">إجمالي المؤسسات</p>
                    <p class="text-2xl font-black text-slate-900">42 مؤسسة</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-[32px] border border-slate-100 shadow-sm flex items-center gap-6">
                <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <i data-lucide="check-circle" class="w-7 h-7"></i>
                </div>
                <div>
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">مؤسسات مفعلة</p>
                    <p class="text-2xl font-black text-slate-900">38 مؤسسة</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-[32px] border border-slate-100 shadow-sm flex items-center gap-6">
                <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center">
                    <i data-lucide="alert-triangle" class="w-7 h-7"></i>
                </div>
                <div>
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest">تحت المراجعة</p>
                    <p class="text-2xl font-black text-slate-900">4 مؤسسات</p>
                </div>
            </div>
        </div>

        <!-- Institutes Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['name' => 'المعهد الوطني المتخصص - سطيف 01', 'type' => 'INSFP', 'manager' => 'د. محمودي سليم', 'students' => 1200, 'status' => 'active'],
                ['name' => 'مركز التكوين المهني - العلمة', 'type' => 'CFPA', 'manager' => 'أ. بن مبروك علي', 'students' => 850, 'status' => 'active'],
                ['name' => 'المعهد الوطني المتخصص - عين الكبيرة', 'type' => 'INSFP', 'manager' => 'د. زيتوني نوال', 'students' => 640, 'status' => 'active'],
                ['name' => 'مركز التكوين المهني - بوقاعة', 'type' => 'CFPA', 'manager' => 'أ. لعرابة صالح', 'students' => 420, 'status' => 'warning'],
                ['name' => 'المعهد الوطني - سطيف 02', 'type' => 'INSFP', 'manager' => 'د. خلفاوي كمال', 'students' => 980, 'status' => 'active'],
                ['name' => 'مركز التكوين المهني - حمام السخنة', 'type' => 'CFPA', 'manager' => 'أ. جبار رابح', 'students' => 310, 'status' => 'warning'],
            ] as $inst)
                <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm overflow-hidden group hover:shadow-xl transition-all">
                    <div class="h-32 bg-slate-50 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600/5 to-transparent"></div>
                        <i data-lucide="building-2" class="w-12 h-12 text-slate-200 group-hover:text-blue-200 transition-colors"></i>
                        <div class="absolute top-4 right-4">
                            <span @class([
                                'px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest',
                                'bg-emerald-100 text-emerald-700' => $inst['status'] == 'active',
                                'bg-amber-100 text-amber-700' => $inst['status'] == 'warning',
                            ])>
                                {{ $inst['status'] == 'active' ? 'نشط' : 'مراجعة' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-[10px] font-black text-blue-600 bg-blue-50 px-2 py-0.5 rounded uppercase">{{ $inst['type'] }}</span>
                            <h3 class="text-lg font-black text-slate-900 line-clamp-1">{{ $inst['name'] }}</h3>
                        </div>
                        <p class="text-xs font-bold text-slate-400 mb-6">{{ $inst['manager'] }}</p>
                        
                        <div class="flex items-center justify-between py-4 border-y border-slate-50 mb-6">
                            <div class="text-center flex-1">
                                <p class="text-xs font-black text-slate-900">{{ $inst['students'] }}</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">متربص</p>
                            </div>
                            <div class="w-[1px] h-8 bg-slate-100"></div>
                            <div class="text-center flex-1">
                                <p class="text-xs font-black text-slate-900">{{ rand(20, 50) }}</p>
                                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">أستاذ</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <button class="flex-1 py-3 bg-slate-900 text-white rounded-xl text-xs font-black hover:bg-blue-600 transition-all">تسيير المؤسسة</button>
                            <button class="w-12 h-11 bg-slate-50 text-slate-400 rounded-xl flex items-center justify-center hover:bg-slate-100 transition-all"><i data-lucide="settings" class="w-5 h-5"></i></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Add Institute Modal (Alpine.js) -->
        <template x-if="showModal">
            <div class="fixed inset-0 z-[100] flex items-center justify-center p-4">
                <div @click="showModal = false" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm"></div>
                <div class="bg-white w-full max-w-2xl rounded-[40px] shadow-2xl relative z-10 overflow-hidden" x-transition>
                    <div class="p-10 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                        <h2 class="text-2xl font-black text-slate-900 tracking-tight">إضافة مؤسسة تكوينية جديدة</h2>
                        <button @click="showModal = false" class="p-2 hover:bg-slate-200 rounded-xl transition-all"><i data-lucide="x" class="w-6 h-6 text-slate-400"></i></button>
                    </div>
                    <form class="p-10 space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest">اسم المؤسسة</label>
                                <input type="text" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-black text-slate-400 uppercase tracking-widest">نوع المؤسسة</label>
                                <select class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all">
                                    <option>معهد وطني متخصص (INSFP)</option>
                                    <option>مركز تكوين مهني (CFPA)</option>
                                </select>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-widest">اسم المدير المسير</label>
                            <input type="text" class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all">
                        </div>
                        <div class="flex items-center justify-end gap-4 pt-6">
                            <button type="button" @click="showModal = false" class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-widest hover:bg-slate-50 rounded-2xl transition-all">إلغاء</button>
                            <button type="submit" class="px-10 py-4 bg-blue-600 text-white rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-blue-700 transition-all shadow-xl shadow-blue-500/20">تأكيد الإضافة</button>
                        </div>
                    </form>
                </div>
            </div>
        </template>
    </div>
@endsection

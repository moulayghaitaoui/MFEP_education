@extends('layouts.admin')

@section('title', 'إدارة المستخدمين - وزارة التكوين المهني')

@section('navbar')
    <header class="h-24 bg-white/80 backdrop-blur-xl border-b border-slate-100 flex items-center justify-between px-12 z-20">
        <div class="flex items-center gap-8">
            <button @click="sidebarOpen = !sidebarOpen" class="w-12 h-12 bg-slate-50 rounded-2xl flex items-center justify-center text-slate-400 hover:text-slate-900 transition-all">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <h2 class="text-xl font-black text-slate-900 tracking-tight">إدارة المستخدمين والصلاحيات</h2>
        </div>
        
        <div class="flex items-center gap-4">
            <button class="bg-gov-green text-white px-8 py-4 rounded-3xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-gov-green/20 hover:bg-gov-green-dark transition-all flex items-center gap-3">
                <i data-lucide="user-plus" class="w-5 h-5 text-gov-gold"></i>
                إضافة مستخدم
            </button>
        </div>
    </header>
@endsection

@section('content')
    <div class="p-12 space-y-12" x-data="{ roleFilter: 'all' }">
        <!-- Stats Summary -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @foreach([
                ['label' => 'إجمالي المستخدمين', 'value' => '1,240', 'icon' => 'users', 'color' => 'gov-green'],
                ['label' => 'مدراء المديريات', 'value' => '58', 'icon' => 'shield-check', 'color' => 'gov-gold'],
                ['label' => 'الأساتذة', 'value' => '950', 'icon' => 'graduation-cap', 'color' => 'emerald'],
                ['label' => 'موظفو الإدارة', 'value' => '232', 'icon' => 'user-cog', 'color' => 'blue'],
            ] as $stat)
                <div class="bg-white p-8 rounded-[40px] border border-slate-100 shadow-sm flex items-center gap-6 group hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-{{ $stat['color'] }}/10 text-{{ $stat['color'] }} rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i data-lucide="{{ $stat['icon'] }}" class="w-7 h-7"></i>
                    </div>
                    <div>
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">{{ $stat['label'] }}</p>
                        <h4 class="text-2xl font-black text-slate-900">{{ $stat['value'] }}</h4>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- User Management Table -->
        <div class="bg-white rounded-[48px] border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-50 flex items-center justify-between bg-slate-50/50">
                <div class="flex items-center gap-4">
                    <button @click="roleFilter = 'all'" :class="roleFilter === 'all' ? 'bg-gov-green text-white' : 'bg-white text-slate-500'" class="px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-sm transition-all border border-slate-100">الكل</button>
                    <button @click="roleFilter = 'admin'" :class="roleFilter === 'admin' ? 'bg-gov-green text-white' : 'bg-white text-slate-500'" class="px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-sm transition-all border border-slate-100">الإدارة العليا</button>
                    <button @click="roleFilter = 'direction'" :class="roleFilter === 'direction' ? 'bg-gov-green text-white' : 'bg-white text-slate-500'" class="px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-sm transition-all border border-slate-100">مدراء المديريات</button>
                    <button @click="roleFilter = 'teacher'" :class="roleFilter === 'teacher' ? 'bg-gov-green text-white' : 'bg-white text-slate-500'" class="px-6 py-3 rounded-xl text-[10px] font-black uppercase tracking-widest shadow-sm transition-all border border-slate-100">الأساتذة</button>
                </div>
                <div class="relative">
                    <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-300"></i>
                    <input type="text" placeholder="بحث عن مستخدم..." class="bg-white border border-slate-100 rounded-2xl pl-12 pr-6 py-3 text-xs font-bold focus:ring-4 focus:ring-gov-green/5 outline-none w-64">
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-right">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">المستخدم</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">الدور الوظيفي</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">الجهة التابع لها</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">تاريخ الانضمام</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-widest text-left">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach([
                            ['name' => 'أحمد بوزيدي', 'email' => 'ahmed.b@mfep.gov.dz', 'role' => 'إدارة عليا', 'entity' => 'الوزارة المركزية', 'date' => '2024-01-12', 'status' => 'admin'],
                            ['name' => 'سارة مسعودي', 'email' => 's.messaoudi@direction.dz', 'role' => 'مدير ولاية', 'entity' => 'مديرية سطيف', 'date' => '2024-02-05', 'status' => 'direction'],
                            ['name' => 'سمير بوزيد', 'email' => 's.bouzid@insfp.edu.dz', 'role' => 'أستاذ مكون', 'entity' => 'INSFP سطيف 01', 'date' => '2024-03-20', 'status' => 'teacher'],
                            ['name' => 'ليلى كريم', 'email' => 'l.karim@mfep.gov.dz', 'role' => 'محلل بيانات', 'entity' => 'قسم الإحصاء', 'date' => '2024-01-15', 'status' => 'admin'],
                        ] as $user)
                        <tr class="hover:bg-slate-50 transition-all group" x-show="roleFilter === 'all' || roleFilter === '{{ $user['status'] }}'">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-black text-xs text-slate-500">{{ substr($user['name'], 0, 1) }}</div>
                                    <div>
                                        <p class="text-sm font-black text-slate-900">{{ $user['name'] }}</p>
                                        <p class="text-[10px] font-bold text-slate-400">{{ $user['email'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-xs font-black text-slate-600">{{ $user['role'] }}</td>
                            <td class="px-8 py-6 text-xs font-bold text-slate-500">{{ $user['entity'] }}</td>
                            <td class="px-8 py-6 text-xs font-bold text-slate-400 font-mono">{{ $user['date'] }}</td>
                            <td class="px-8 py-6">
                                <div class="flex items-center justify-end gap-2">
                                    <button class="p-2 bg-slate-100 text-slate-400 rounded-lg hover:text-gov-green hover:bg-gov-green/10 transition-all"><i data-lucide="edit-3" class="w-4 h-4"></i></button>
                                    <button class="p-2 bg-slate-100 text-slate-400 rounded-lg hover:text-rose-600 hover:bg-rose-50 transition-all"><i data-lucide="shield-alert" class="w-4 h-4"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

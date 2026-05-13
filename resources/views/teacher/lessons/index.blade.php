@extends('layouts.teacher')

@section('title', 'إدارة الدروس - فضاء الأستاذ')

@section('content')
    <div x-data="{ viewMode: 'grid' }">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-2">إدارة المحتوى التعليمي</h1>
                <p class="text-slate-500 font-medium text-lg">تحكم في دروسك، الفيديوهات، والمرفقات التعليمية بكل سهولة.</p>
            </div>
            
            <div class="flex gap-4">
                <div class="bg-white p-1.5 rounded-2xl border border-slate-100 shadow-sm flex gap-1">
                    <button @click="viewMode = 'grid'" :class="viewMode === 'grid' ? 'bg-indigo-600 text-white shadow-lg' : 'text-slate-400 hover:bg-slate-50'" class="p-3 rounded-xl transition-all">
                        <i data-lucide="layout-grid" class="w-5 h-5"></i>
                    </button>
                    <button @click="viewMode = 'list'" :class="viewMode === 'list' ? 'bg-indigo-600 text-white shadow-lg' : 'text-slate-400 hover:bg-slate-50'" class="p-3 rounded-xl transition-all">
                        <i data-lucide="list" class="w-5 h-5"></i>
                    </button>
                </div>
                <a href="{{ route('teacher.create-lesson') }}" class="bg-indigo-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 transition-all flex items-center gap-3">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                    إضافة درس
                </a>
            </div>
        </div>

        <!-- Grid View -->
        <div x-show="viewMode === 'grid'" x-transition class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach([
                ['title' => 'أساسيات الـ Node.js', 'subject' => 'تطوير الويب', 'views' => '4.5k', 'image' => 'https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=400&h=250&auto=format&fit=crop'],
                ['title' => 'مقدمة في Docker', 'subject' => 'أمن المعلومات', 'views' => '1.2k', 'image' => 'https://images.unsplash.com/photo-1605745341112-85968b193ef5?q=80&w=400&h=250&auto=format&fit=crop'],
                ['title' => 'برمجة الـ API بـ Laravel', 'subject' => 'تطوير الويب', 'views' => '8.9k', 'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=400&h=250&auto=format&fit=crop'],
                ['title' => 'تحليل البيانات بـ Python', 'subject' => 'الذكاء الاصطناعي', 'views' => '3.1k', 'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=400&h=250&auto=format&fit=crop'],
            ] as $lesson)
                <div class="bg-white rounded-[40px] border border-slate-100 shadow-sm overflow-hidden group hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">
                    <div class="h-48 relative overflow-hidden">
                        <img src="{{ $lesson['image'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="">
                        <div class="absolute inset-0 bg-indigo-900/40 group-hover:bg-indigo-900/60 transition-colors flex items-center justify-center opacity-0 group-hover:opacity-100">
                             <div class="flex gap-2">
                                <button class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-indigo-600 shadow-xl hover:scale-110 transition-transform"><i data-lucide="edit-3" class="w-5 h-5"></i></button>
                                <button class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-rose-500 shadow-xl hover:scale-110 transition-transform"><i data-lucide="trash-2" class="w-5 h-5"></i></button>
                             </div>
                        </div>
                        <div class="absolute top-4 right-4 px-3 py-1 bg-white/20 backdrop-blur-md rounded-lg text-white text-[9px] font-black uppercase tracking-widest border border-white/20">
                            {{ $lesson['subject'] }}
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-lg font-black text-slate-800 leading-tight mb-6 group-hover:text-indigo-600 transition-colors">{{ $lesson['title'] }}</h3>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2 text-slate-400 font-bold text-[10px] uppercase">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                                {{ $lesson['views'] }} مشاهدة
                            </div>
                            <button class="text-xs font-black text-indigo-600 uppercase tracking-widest hover:underline">الإحصائيات</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- List View -->
        <div x-show="viewMode === 'list'" x-transition>
            <x-teacher-card padding="p-0">
                <x-teacher-table :headers="['الدرس', 'المادة', 'الحالة', 'المشاهدات', 'تاريخ الإنشاء', 'إجراءات']">
                     @foreach(['تطوير الويب', 'أمن المعلومات', 'الذكاء الاصطناعي'] as $sub)
                        <tr class="hover:bg-slate-50/50 transition-all">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-slate-100 flex-shrink-0"></div>
                                    <span class="font-black text-sm text-slate-800">عنوان الدرس التجريبي هنا</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-xs font-bold text-slate-400 uppercase tracking-tight">{{ $sub }}</td>
                            <td class="px-8 py-6 text-xs font-black text-emerald-500">منشور</td>
                            <td class="px-8 py-6 text-xs font-black text-indigo-600">4.5k</td>
                            <td class="px-8 py-6 text-xs font-bold text-slate-400">2024-05-12</td>
                            <td class="px-8 py-6 flex gap-2">
                                <button class="p-2.5 bg-slate-100 text-slate-400 rounded-xl hover:text-indigo-600 transition-all"><i data-lucide="edit-3" class="w-4 h-4"></i></button>
                                <button class="p-2.5 bg-slate-100 text-slate-400 rounded-xl hover:text-rose-600 transition-all"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                            </td>
                        </tr>
                     @endforeach
                </x-teacher-table>
            </x-teacher-card>
        </div>
    </div>
@endsection

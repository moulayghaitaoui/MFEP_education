@extends('layouts.teacher')

@section('title', 'الملفات والموارد - فضاء الأستاذ')

@section('content')
    <div x-data="{ uploadModal: false }">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-12">
            <div>
                <h1 class="text-4xl font-black text-slate-900 tracking-tighter mb-2">إدارة الملفات والموارد البيداغوجية</h1>
                <p class="text-slate-500 font-medium text-lg">نظم مكتبتك الرقمية، ارفع المستندات، وشاركها مع الأفواج.</p>
            </div>
            
            <button @click="uploadModal = true" class="bg-indigo-600 text-white px-8 py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 transition-all flex items-center gap-3">
                <i data-lucide="upload" class="w-5 h-5"></i>
                رفع ملفات
            </button>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-4 gap-12">
            <!-- File Categories -->
            <div class="xl:col-span-1 space-y-8">
                <x-teacher-card title="مجلداتي">
                    <div class="space-y-3">
                        @foreach([
                            ['name' => 'دروس الـ Laravel', 'count' => 12, 'active' => true, 'icon' => 'folder'],
                            ['name' => 'اختبارات سداسي 1', 'count' => 8, 'active' => false, 'icon' => 'folder-lock'],
                            ['name' => 'مشاريع الطلاب', 'count' => 45, 'active' => false, 'icon' => 'folder-open'],
                            ['name' => 'كتب ومراجع', 'count' => 5, 'active' => false, 'icon' => 'library'],
                        ] as $folder)
                            <button @class([
                                'w-full p-5 rounded-2xl border flex items-center justify-between group transition-all',
                                'bg-indigo-600 border-indigo-600 text-white shadow-xl shadow-indigo-600/20' => $folder['active'],
                                'bg-white border-slate-100 text-slate-500 hover:bg-slate-50 hover:border-slate-200' => !$folder['active'],
                            ])>
                                <div class="flex items-center gap-4">
                                    <i data-lucide="{{ $folder['icon'] }}" class="w-5 h-5"></i>
                                    <span class="text-xs font-black">{{ $folder['name'] }}</span>
                                </div>
                                <span @class([
                                    'px-2 py-0.5 rounded-lg text-[9px] font-black',
                                    'bg-white/20 text-white' => $folder['active'],
                                    'bg-slate-100 text-slate-500' => !$folder['active'],
                                ])>{{ $folder['count'] }}</span>
                            </button>
                        @endforeach
                    </div>
                </x-teacher-card>

                <x-teacher-card title="سعة التخزين">
                    <div class="space-y-4">
                        <div class="flex justify-between text-[10px] font-black uppercase tracking-widest mb-2">
                            <span class="text-slate-400">المساحة المستخدمة</span>
                            <span class="text-slate-900">2.4 GB / 10 GB</span>
                        </div>
                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-indigo-600 rounded-full" style="width: 24%"></div>
                        </div>
                        <p class="text-[9px] font-bold text-slate-400 text-center uppercase tracking-tighter">بقي لديك 7.6 جيجابايت متاحة</p>
                    </div>
                </x-teacher-card>
            </div>

            <!-- Files Grid -->
            <div class="xl:col-span-3 space-y-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach([
                        ['name' => 'بنية MVC.pdf', 'size' => '2.4 MB', 'type' => 'pdf'],
                        ['name' => 'قواعد البيانات.zip', 'size' => '15 MB', 'type' => 'zip'],
                        ['name' => 'أمثلة برمجية.js', 'size' => '45 KB', 'type' => 'code'],
                        ['name' => 'شرح Laravel.mp4', 'size' => '120 MB', 'type' => 'video'],
                        ['name' => 'تصميم الواجهات.fig', 'size' => '8.2 MB', 'type' => 'design'],
                        ['name' => 'خارطة الطريق.png', 'size' => '1.5 MB', 'type' => 'image'],
                    ] as $file)
                        <div class="bg-white p-6 rounded-[32px] border border-slate-100 shadow-sm group hover:shadow-xl hover:border-indigo-100 transition-all duration-300">
                             <div class="flex items-center justify-between mb-6">
                                <div @class([
                                    'w-14 h-14 rounded-2xl flex items-center justify-center',
                                    'bg-rose-50 text-rose-500' => $file['type'] == 'pdf',
                                    'bg-amber-50 text-amber-600' => $file['type'] == 'zip',
                                    'bg-blue-50 text-blue-600' => $file['type'] == 'code',
                                    'bg-indigo-50 text-indigo-600' => $file['type'] == 'video',
                                    'bg-emerald-50 text-emerald-600' => $file['type'] == 'design',
                                    'bg-slate-50 text-slate-600' => $file['type'] == 'image',
                                ])>
                                    <i data-lucide="{{ 
                                        $file['type'] == 'pdf' ? 'file-text' : 
                                        ($file['type'] == 'zip' ? 'package' : 
                                        ($file['type'] == 'code' ? 'code-2' : 
                                        ($file['type'] == 'video' ? 'film' : 
                                        ($file['type'] == 'design' ? 'figma' : 'image'))))
                                    }}" class="w-7 h-7"></i>
                                </div>
                                <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                     <button class="p-2 text-slate-300 hover:text-indigo-600 transition-all"><i data-lucide="download" class="w-4 h-4"></i></button>
                                     <button class="p-2 text-slate-300 hover:text-rose-600 transition-all"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                                </div>
                             </div>
                             <h4 class="text-sm font-black text-slate-800 mb-1 truncate">{{ $file['name'] }}</h4>
                             <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $file['size'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Upload Modal -->
        <x-teacher-modal name="uploadModal" title="رفع موارد بيداغوجية">
             <div class="space-y-8">
                 <div class="w-full h-64 bg-slate-50 rounded-[40px] border-4 border-dashed border-slate-100 flex flex-col items-center justify-center group hover:bg-indigo-50 hover:border-indigo-200 transition-all cursor-pointer relative">
                    <i data-lucide="upload-cloud" class="w-12 h-12 text-slate-300 group-hover:text-indigo-600 mb-4 transition-colors"></i>
                    <p class="text-lg font-black text-slate-800">اسحب الملفات هنا</p>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-2">PDF, ZIP, MP4, PNG (Max 50MB)</p>
                    <input type="file" multiple class="absolute inset-0 opacity-0 cursor-pointer">
                 </div>
                 
                 <div class="space-y-3">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-1">تصنيف الملف</label>
                    <select class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 font-bold text-slate-800 outline-none appearance-none">
                        <option>مجلد الدروس</option>
                        <option>مجلد الاختبارات</option>
                        <option>مجلد المشاريع</option>
                    </select>
                 </div>
                 
                 <button @click="uploadModal = false" class="w-full bg-indigo-600 text-white py-5 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 transition-all">بدء الرفع</button>
             </div>
        </x-teacher-modal>
    </div>
@endsection

@props(['headers' => []])

<div class="overflow-x-auto">
    <table class="w-full text-right border-collapse">
        <thead class="bg-slate-50 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] border-b border-slate-100">
            <tr>
                @foreach($headers as $header)
                    <th class="px-8 py-5">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-50">
            {{ $slot }}
        </tbody>
    </table>
</div>

<div class="justify-between md:px-16 px-6 grid my-24 lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-5">
    @foreach($cats as $cat)
    <a href="/cat/{{ $cat['id'] }}" class="block drop-shadow-xl h-96 bg-neutral-800 border rounded border-black p-2 cursor-pointer {{ $cat['sold'] == false ? 'hover:scale-105 hover:z-10':'bg-neutral-700 opacity-40' }} transition-all">
        @if($cat['sold'])
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
            <span class="text-white drop-shadow-xl font-bold text-3xl md:text-4xl">Adopted</span>
        </div>
        @endif
        <img src="\cat-showcase-images\{{ $cat['id'] }}\0.jpg" alt="image of cat :)" class="w-full h-72 object-cover mb-1">
        <div class="flex flex-col gap-1">
            <span class="text-lg text-white">{{ $cat['name'] }}</span>
            <span class="text-md text-red-600 font-bold">{{ $cat['price'] }}€</span>
            @php
            $catDob = new DateTime($cat['dob']);
            @endphp
            <span class="text-sm text-neutral-400">{{ $catDob->diff(new DateTime())->format('%y years %m months %d days') }} old</span>
        </div>
    </a>
    @endforeach
</div>
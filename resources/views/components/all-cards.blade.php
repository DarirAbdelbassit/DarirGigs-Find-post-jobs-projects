 @props(['item'])
 <x-card>
    <div onclick="window.location.href = '{{ route('listings.show', ['id' => $item->id]) }}'" class="flex cursor-pointer">
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $item->logo ? 'storage/' . $item->logo : asset('/images/no-image.png') }}" alt="" />
        <div onclick="window.location.href = '{{ route('listings.show', ['id' => $item->id]) }}'">
            <h1>{{ $item->title }}</h1>
            <div class="text-xl font-bold mb-4">{{ $item->company }}</div>
            <x-tag :tags="$item->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $item->location }}
            </div>
        </div>
    </div>

 </x-card>

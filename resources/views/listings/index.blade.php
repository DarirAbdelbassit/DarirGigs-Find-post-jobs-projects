<x-layout>
    @guest
        @include('partials.hero')
    @endguest
    @include('partials.search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if (!count($listings) == 0)
            @foreach ($listings as $item)
                <x-all-cards :item="$item" />
            @endforeach
        @endif
    </div>
    @if (count($listings) == 0)
        <div class="flex items-center justify-center h-40 w-full">
            <h3 class="text-2xl text-gray-500">No Listings Found</h3>
        </div>
    @endif
    <div class="mt-6 p-4">
        {{ $listings->links() }}
    </div>
</x-layout>

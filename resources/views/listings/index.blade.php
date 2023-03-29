<x-layout>
    @if (!count($listings)==0)
    <div
    class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>
    @foreach ($listings as $item)
    <x-all-cards :item="$item" />
    @endforeach
</div>
    @else
    <h3>no Listing</h3>
    @endif
</x-layout>

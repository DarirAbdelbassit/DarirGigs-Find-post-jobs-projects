<x-layout>
    @if (!Auth::check())
    @include('partials.hero')
    @endif
    @include('partials.search')
    @if (!count($listings)==0)
    <div
    class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>
    @foreach ($listings as $item)
    <x-all-cards :item="$item" />
    @endforeach
    @else
    <h3>no Listing</h3>
    @endif
</div>
<div class="mt-6 p-4">
    {{ $listings->links() }}
</div>
</x-layout>

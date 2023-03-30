<x-layout>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                    Manage Gigs
                </h1>
            </header>
            <table class="w-full table-auto rounded-sm">
                <tbody>
                    <tr class="border-gray-300">
                        @if (!empty($listings))
                            @foreach ($listings as $listing)
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/listings/{{ $listing->id }}">
                                        {{ $listing->title }}
                                    </a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/listings/{{ $listing->id }}/edit"
                                        class="text-blue-400 px-6 py-2 rounded-xl"><i
                                            class="fa-solid fa-pen-to-square"></i>
                                        Edit</a>
                                </td>
                                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <form method="post" action="/listings/{{ $listing->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            @endforeach
                        @endif
                        @if($listings->count() == 0)
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <p class="text-lg text-center">
                                    You have no gigs yet.
                                </p>
                            </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layout>

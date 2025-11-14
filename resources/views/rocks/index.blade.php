<x-app-layout>
    <div class="flex justify-center m-4">
        @include('components.search')
    </div>
    <div class="border-t-gray-800 border-t" >
        <div class="inline-flex items-center px-5 py-1 font-semibold text-xs text-white  uppercase tracking-widest ">
            <h1 class="text-white text-2xl font-bold">Filter</h1>
            <div class="p-4 flex">
                <!-- dropdown filter continent -->
                @include('components.filter')
            </div>

        </div>
    </div>

    <div class="p-4">
        @foreach($rocks as $rock)
            <a href="{{ route('rocks.show', $rock) }}"
               class="">

                <div
                    class="rounded-lg p-4 text-white bg-gray-900 border border-gray-800 rounded-xl overflow-hidden shadow-md hover:border-blue-600 p-5 flex flex-col justify-between mb-2">
                    <!--toekomstige titel-->
                    <h1 class="text-2xl font-bold mb-4">Here goes your title</h1>
                    <div class="shadow-xl p-4 rounded-lg border mb-3 space-y-1 border-gray-800">
                        <x-paragraph>{{ $rock['name'] }}</x-paragraph>
                        <x-paragraph>{{ $rock['type'] }}</x-paragraph>
                        <x-paragraph>{{ $rock['category'] }}</x-paragraph>
                        <x-paragraph>{{ $rock['color'] }}</x-paragraph>
                        <a class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-300 border hover:bg-blue-600 hover:text-white border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-blue-600 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{ route('rocks.index', ['continent' => $rock->continent_id]) }}">{{ $rock->continent->name ?? 'Unknown' }}</a>
                        <p><strong>Hardness:</strong> {{ $rock['hardness'] }}</p>
                        <p><strong>Description:</strong> {{ $rock['description'] }}</p>

                        <p class="text-gray-700"><strong>Created
                                at:</strong> {{ $rock['created_at']->format('d M Y H:i') }}</p>
                    </div>

                    <div class="p-1 mt-1">
                        <p><strong>Creator:</strong> {{ $rock->user->name ?? 'Unknown' }}</p>
                    </div>
                </div>
            </a>
        @endforeach
        <div class="mt-6">
            {{ $rocks->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>


<x-app-layout>
    <x-slot name="header">
            <h1 >Rocks</h1>
    </x-slot>
        <div class="">
            <div class="bg-gray-950 flex justify-center p-4">
                @include('components.search')
            </div>
        </div>
        <div
            class="bg-gray-950 border border-gray-800 border rounded-b-lg inline-flex w-full items-center px-5 py-1 font-semibold text-xs text-white uppercase focus:outline-1">
            <x-icon-filter class="h-9 w-auto text-gray-800 dark:text-gray-200"/>
            <div class="p-4 flex">
                <!-- dropdown filter continent -->
                @include('components.filter')
            </div>
        </div>

    <!-- cards -->
    <section>
        <div class="p-4">
            @foreach($rocks as $rock)
                <a href="{{ route('rocks.show', $rock) }}"
                   class="">

                    <div
                        class="rounded-lg p-4 text-white backdrop-blur-sm bg-opacity-90 border border-gray-800 rounded-xl overflow-hidden shadow-md hover:border-blue-600 p-5 flex flex-col justify-between mb-2">
                        <!--toekomstige titel-->
                        <h1 class="text-2xl font-bold mb-4">{{ $rock['title'] }}</h1>
                        <img src="{{ $rock->image }}" alt="{{ $rock['name'] }}"
                             class="w-full h-64 object-cover mb-4 rounded-lg">
                        <div class="shadow-xl p-4 rounded-lg border mb-3 space-y-1 border-gray-800">
                            <x-paragraph>{{ $rock['name'] }}</x-paragraph>
                            <x-paragraph>{{ $rock['type'] }}</x-paragraph>
                            <x-paragraph>{{ $rock['category'] }}</x-paragraph>
                            <x-paragraph>{{ $rock['color'] }}</x-paragraph>
                            <a class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-300 border hover:bg-blue-600 hover:text-white border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-blue-600 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                               href="{{ route('rocks.index', ['continent' => $rock->continent_id]) }}">{{ $rock->continent->name ?? 'Unknown' }}</a>
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
    </section>
</x-app-layout>



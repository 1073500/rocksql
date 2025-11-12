<x-app-layout>
    <div class="p-4">
            @foreach($rocks as $rock)
                <a href="{{ route('rocks.show', $rock) }}"
                   class="transform transition duration-300 hover:scale-105 hover:shadow-xl">

                <div
                    class="rounded-lg p-4 text-white bg-gray-900 border border-gray-800 rounded-xl overflow-hidden shadow-md hover:border-blue-600 p-5 flex flex-col justify-between mb-2">
                    <!--toekomstige titel-->
                    <h1 class="text-2xl font-bold mb-4">Here goes your title</h1>
                    <div class="shadow-xl p-4 rounded-lg border mb-3 space-y-1 border-gray-800">
                        <x-paragraph>{{ $rock['name'] }}</x-paragraph>
                        <x-paragraph>{{ $rock['type'] }}</x-paragraph>
                        <x-paragraph>{{ $rock['category'] }}</x-paragraph>
                        <x-paragraph>{{ $rock['color'] }}</x-paragraph>
                        <x-paragraph>{{ $rock->continent->name ?? 'Unknown' }}</x-paragraph>
                        <p><strong>Hardness:</strong> {{ $rock['hardness'] }}</p>
                        <p><strong>Description:</strong> {{ $rock['description'] }}</p>

                        <p class="text-gray-700"><strong>Created at:</strong> {{ $rock['created_at']->format('d M Y H:i') }}</p>
                    </div>

                    <div class="p-1 mt-1">
                        <p><strong>Creator:</strong> {{ $rock->user->name ?? 'Unknown' }}</p>
                    </div>
                </div>
        </a>
    @endforeach
</x-app-layout>


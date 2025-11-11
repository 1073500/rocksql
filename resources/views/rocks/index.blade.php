<x-app-layout>
    <div class="m-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($rocks as $rock)
                <a href="{{ route('rocks.show', $rock) }}"
                   class="transform transition duration-300 hover:scale-105 hover:shadow-xl">

                <div
                    class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden shadow-md hover:border-blue-600 p-5 flex flex-col justify-between">
                    <!--toekomstige titel-->

                    <div class="text-gray-300 mb-3 space-y-1">
                        <p><strong>Created by:</strong> {{ $rock->user->name ?? 'Unknown' }}</p>
                        <p><strong>Name:</strong> {{ $rock['name'] }}</p>
                        <p><strong>Type:</strong> {{ $rock['type'] }}</p>
                        <p><strong>Category:</strong> {{ $rock['category'] }}</p>
                        <p><strong>Hardness:</strong> {{ $rock['hardness'] }}</p>
                        <p><strong>Color:</strong> {{ $rock['color'] }}</p>
                        <p><strong>Description:</strong> {{ $rock['description'] }}</p>
                        <p><strong>Continent:</strong> {{ $rock->continent->name ?? 'Unknown' }}</p>
                        <p><strong>Created at:</strong> {{ $rock['created_at']->format('d M Y H:i') }}</p>
                    </div>

                    <div class="mt-auto">
                    <span
                        class="inline-block bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-medium hover:bg-blue-700 transition-colors">View Details</span>
                    </div>
                </div>
        </a>
    @endforeach
</x-app-layout>


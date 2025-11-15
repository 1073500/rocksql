<x-app-layout>
    <div class="max-w-2xl mx-auto bg-gray-900 text-gray-200 p-6 rounded-xl mt-10 shadow-md">
        <h1 class="text-3xl font-bold mb-4">{{ $rock->name }}</h1>

        <p><strong>Type:</strong> {{ $rock->type }}</p>
        <p><strong>Category:</strong> {{ $rock->category }}</p>
        <p><strong>Color:</strong> {{ $rock->color }}</p>
        <p><strong>Hardness:</strong> {{ $rock->hardness }}</p>
        <p><strong>Description:</strong> {{ $rock->description }}</p>
        <p><strong>Continent:</strong> {{ $rock->continent->name ?? 'Unknown' }}</p>
        <p><strong>Created by:</strong> {{ $rock->user->name ?? 'Unknown' }}</p>
        <p><strong>Created at:</strong> {{ $rock->created_at->format('d M Y H:i') }}</p>

        <div class="flex flex-col sm:flex-row sm:space-x-3 space-y-2 sm:space-y-0">
            <a href="/rocks/{{ $rock->id }}/edit" class="flex-1 text-center bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg px-4 py-2 transition">Edit</a>

            <form method="POST" action="{{ route('rocks.update', $rock->id) }}" class="flex-1">
                @csrf
                @method('DELETE')
                <x-primary-button type="submit" >Delete</x-primary-button>
            </form>
        </div>

        <div class="mt-6">
            <a href="{{ route('rocks.index') }}" class="text-blue-400 hover:underline">← Back to all rocks</a>
        </div>
    </div>

    <!-- Comment -->
    <div>
        <div>
            <form method="POST" action="{{ route('comments.store', $rock) }}">
                @csrf
                <textarea name="comment" rows="3" required>{{ old('$comment') }}</textarea>
                <button type="submit">Post comment</button>
            </form>
        </div>
        @if ($errors->has('comment_error'))
            <div class="text-red-500">
                {{ $errors->first('comment_error') }}
            </div>
        @endif


        <!-- loopen -->
        <div class="text-white">
            @foreach($rock->comments as $comment)
                <p>{{ e($comment->comment) }} Posted by {{ $comment->user->name ?? 'Anonymous' }}</p>
                @if(auth()->id() === $comment->user_id || auth()->user()->isAdmin())
                    <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @endif
            @endforeach
        </div>
    </div>


</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div
        class="flex items-center justify-center flex-col m-8 rounded-lg p-4 text-white backdrop-blur-sm bg-opacity-90 border border-gray-800 rounded-xl shadow-md ">
        <div class="mask-radial-at-center mask-radial-from-100% w-32 h-32 mb-4">
            <img src="{{ asset('images/profile.png') }} " alt="Profile Image">
        </div>
        <h1 class="text-2xl font-bold mb-4 text-white">{{ $user->name }}</h1>
        <h2 class="text-1xl font-bold mb-4 text-gray-400">{{ $user->email }}</h2>
        <x-primary-button><a href="{{ route('profile.edit') }}">Edit profile</a></x-primary-button>
    </div>


    @if($rocks->isEmpty())
        <p>No rocks found.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach($rocks as $rock)
                <div class="rounded-lg text-white backdrop-blur-sm bg-opacity-90 border border-gray-800 rounded-xl overflow-hidden shadow-md hover:border-blue-600 p-5 flex flex-col justify-between mb-2">
                    <h1 class="text-2xl font-bold mb-4">{{ $rock->title }}</h1>
                    <img src="{{ $rock->image }}" alt="{{ $rock->name }}" class="w-full h-64 object-cover mb-4 rounded-lg">
                    <div>
                        <x-secondary-button><a href="{{ route('rocks.show', $rock) }}">See Rock</a></x-secondary-button>
                        <p class="mt-2 text-gray-600"><strong>Created at:</strong> {{ $rock->created_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<div class="sm:col-span-4">
    <x-input-label class="hidden" for="search">Search</x-input-label>
    <div
        class="border border-gray-700 bg-gray-900 p-0.5 m-2 rounded-full inline-flex items-center px-1 text-sm font-medium leading-5 text-gray-500 ">
        <div class="">
            <form action="{{ route('rocks.index') }}" method="GET">
                @csrf
                <input
                    class="border border-gray-700 bg-gray-200 p-2 m-2 rounded-full inline-flex items-center px-6 text-sm font-medium leading-5 text-gray-900 hover:text-gray-900 hover:duration-300 ease-in hover:bg-gray-200 dark:text-gray-900 dark:hover:text-gray-900 focus:outline-none"
                    name="search"  placeholder="Search name"></input>
                <button
                    class="border border-gray-700 bg-gray-900 p-2 m-2 rounded-full inline-flex items-center px-6 text-sm font-medium leading-5 text-gray-500 hover:border-blue-600 hover:text-gray-700 hover:duration-300 ease-in hover:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none">
                    Search
                </button>
                <a href="{{ route('rocks.index') }}" class="border border-blue-600 bg-g p-2 m-2 rounded-full inline-flex items-center px-6 text-sm font-medium leading-5 text-gray-500 hover:text-white hover:duration-300 ease-in hover:bg-blue-600 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none">Show all</a>
            </form>
        </div>
    </div>
</div>


<div class="sm:col-span-4">
    <x-input-label class="hidden" for="search">Search</x-input-label>
    <div
        class="mt-1 flex sm:border sm:border-gray-700 p-2 sm:rounded-full shadow-sm rounded-lg">
        <div class="">
            <form action="{{ route('rocks.index') }}" method="GET">
                @csrf
                <input
                    class="w-full sm:w-auto border border-gray-700 bg-gray-200 p-2 m-1 sm:m-2 rounded-full inline-flex items-center px-6 text-sm font-medium leading-5 text-gray-900 hover:text-gray-900 hover:duration-300 ease-in hover:bg-gray-200 dark:text-gray-900 dark:hover:text-gray-900 focus:outline-1"
                    name="search"  placeholder="Search tag"></input>
                <button
                    class="w-full sm:w-auto border border-gray-700 bg-gray-900 p-2 m-1 sm:m-2 rounded-full inline-flex justify-center items-center px-6 text-sm font-medium leading-5 text-gray-500 hover:border-blue-600 hover:text-gray-700 hover:duration-300 ease-in dark:text-gray-400 dark:hover:text-gray-200 focus:outline-1 hover:bg-blue-600">
                    Search
                </button>
            </form>
        </div>
    </div>
</div>


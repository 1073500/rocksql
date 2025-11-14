<form method="GET" action="{{ route('rocks.index') }}">
    <select name="continent" onchange="this.form.submit()"
            class="border border-gray-700 bg-gray-900 p-2 m-2 rounded-full inline-flex items-center px-6 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:duration-300 ease-in hover:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none">
        <option value="">Continents</option>
        @foreach($continents as $continent)
            <option value="{{ $continent->id }}"
                {{ request('continent') == $continent->id ? 'selected' : '' }}>
                {{ $continent->name }}
            </option>
        @endforeach
    </select>
</form>
<!-- alle filters verwijderen -->
<a href="{{ route('rocks.index') }}"
   class="capitalize border border-red-800 bg-g p-2 m-2 rounded-full inline-flex items-center px-6 text-sm font-medium leading-5 text-gray-500 hover:text-white hover:duration-300 ease-in hover:bg-red-800 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none">Remove
    filters</a>

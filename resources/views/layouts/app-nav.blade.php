<div class="">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center">
            <div class="flex w-full items-center justify-evenly opacity-75">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="h-14 w-auto text-gray-800 dark:text-gray-200 "/>
                </a>

                <a href="{{ route('homepage') }}">
                    <x-icon-home class="h-9  w-auto text-gray-800 dark:text-gray-200"/>
                </a>

                <a href="{{ route('rocks.create') }}">
                    <x-icon-create class="h-9 w-auto text-gray-800 dark:text-gray-200"/>
                </a>

                <a href="{{ route('rocks.index') }}">
                    <x-icon-index class="h-9 w-auto text-gray-800 dark:text-gray-200"/>
                </a>

                <a href="{{ route('dashboard') }}">
                    <x-icon-profile class="fill-current h-9 w-auto text-gray-800 dark:text-gray-200"/>
                </a>
            </div>
        </div>
    </div>

</div>

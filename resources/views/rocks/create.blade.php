<x-app-layout>
    <x-slot name="header">
        <h1>Post a Rock</h1>
    </x-slot>
    <div class="m-6 p-6 backdrop-blur-sm bg-opacity-90 border border-gray-800 rounded-xl overflow-hidden shadow-md ">
        <form method="POST" action="{{ route('rocks.store') }}">
            @csrf


            <fieldset>
                <!-- Title -->
                <div>
                    <x-input-label for="title" :value="__('Title')"/>
                    <x-text-input id="title" placeholder="Beautiful Geode" class="block mt-1 w-full" type="text" name="title"
                                  :value="old('title')"
                                  autofocus autocomplete="title"/>
                    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                </div>

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" placeholder="Geode" class="block mt-1 w-full" type="text" name="name"
                                  :value="old('name')"
                                  autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <!-- Type -->
                <div class="mt-4 text-gray-500">
                    <x-input-label for="type_id" :value="__('Type')"/>
                    <select id="type_id" name="type_id"
                            class="bg-gray-800 block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-10">
                        <option class="text-white" value="">-- Select a Type --</option>
                        @foreach ($types as $type)
                            <option class="text-white border-gray-900" value="{{ $type->id }}"
                                {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->type }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('type_id')" class="mt-2"/>
                </div>

                <!-- Category -->
                <div class="mt-4 text-gray-500">
                    <x-input-label for="category_id" :value="__('Category')"/>
                    <select id="category_id" name="category_id"
                            class="bg-gray-800 block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-10">
                        <option class="text-white" value="">-- Select a Category --</option>
                        @foreach ($categories as $category)
                            <option class="text-white border-gray-900" value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->category }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
                </div>

                <!-- Color -->
                <div class="mt-4 text-gray-500">
                    <x-input-label for="color_id" :value="__('Color')"/>
                    <select id="color_id" name="color_id"
                            class="bg-gray-800 block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-10">
                        <option class="text-white" value="">-- Select a Color --</option>
                        @foreach ($colors as $color)
                            <option class="text-white border-gray-900" value="{{ $color->id }}"
                                {{ old('color_id') == $color->id ? 'selected' : '' }}>
                                {{ $color->color }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('color_id')" class="mt-2"/>
                </div>

                <!-- Hardness -->
                <div class="mt-4 text-gray-500">
                    <x-input-label for="hardness_id" :value="__('Hardness')"/>
                    <select id="hardness_id" name="hardness_id"
                            class="bg-gray-800 block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-10">
                        <option class="text-white" value="">-- Select a Hardness --</option>
                        @foreach ($hardnesses as $hardness)
                            <option class="text-white border-gray-900" value="{{ $hardness->id }}"
                                {{ old('hardness_id') == $hardness->id ? 'selected' : '' }}>
                                {{ $hardness->hardness }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('hardness_id')" class="mt-2"/>
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')"/>
                    <x-text-input id="description" placeholder="Quartz filled geode from Morocco."
                                  class="block mt-1 w-full"
                                  type="text" name="description"
                                  :value="old('description')" autocomplete="description"/>
                    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>

                <!-- Continent -->
                <div class="mt-4 text-gray-500">
                    <x-input-label for="continent_id" :value="__('Continent')"/>
                    <select id="continent_id" name="continent_id"
                            class="bg-gray-800 block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-10">
                        <option class="text-white" value="">-- Select a Continent --</option>
                        @foreach ($continents as $continent)
                            <option class="text-white border-gray-900" value="{{ $continent->id }}"
                                {{ old('continent_id') == $continent->id ? 'selected' : '' }}>
                                {{ $continent->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('continent_id')" class="mt-2"/>
                </div>

                <!-- Upload Image-->
                <div class="mt-4">
                    <x-input-label for="image" :value="__('Image URL')"/>
                    <x-text-input id="image" placeholder="https://example.com/rock.jpg"
                                  class="block mt-1 w-full"
                                  type="text" name="image"
                                  :value="old('image')" autocomplete="image"/>
                    <x-input-error :messages="$errors->get('image')" class="mt-2"/>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Create Rock') }}
                    </x-primary-button>
                </div>
            </fieldset>
        </form>
    </div>
</x-app-layout>

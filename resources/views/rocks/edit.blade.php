<x-app-layout>
    <h1>Edit rock</h1>
    <div class="">
        <form method="POST" action="{{ route('rocks.update', $rock->id) }}">
            @csrf
            @method('PATCH')
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" placeholder="Geode" class="block mt-1 w-full" type="text" name="name"
                              :value="old('name', $rock->name)"
                              autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <!-- Type -->
            <div class="mt-4">
                <x-input-label for="type" :value="__('Type')"/>
                <x-text-input id="type" placeholder="Sedimentary" class="block mt-1 w-full" type="text" name="type"
                              :value="old('type', $rock->type)"
                              autocomplete="type"/>
                <x-input-error :messages="$errors->get('type')" class="mt-2"/>
            </div>

            <!-- Category -->
            <div class="mt-4">
                <x-input-label for="category" :value="__('Category')"/>
                <x-text-input id="category" placeholder="Mineral" class="block mt-1 w-full" type="text" name="category"
                              :value="old('category', $rock->category)"
                              autocomplete="category"/>
                <x-input-error :messages="$errors->get('category')" class="mt-2"/>
            </div>

            <!-- Color -->
            <div class="mt-4">
                <x-input-label for="color" :value="__('Color')"/>
                <x-text-input id="color" placeholder="White" class="block mt-1 w-full" type="text" name="color"
                              :value="old('color', $rock->color)"
                              autocomplete="color"/>
                <x-input-error :messages="$errors->get('color')" class="mt-2"/>
            </div>

            <!-- Hardness -->
            <div class="mt-4">
                <x-input-label for="hardness" :value="__('Hardness')"/>
                <x-text-input id="hardness" placeholder="7" class="block mt-1 w-full" type="text" name="hardness"
                              :value="old('hardness', $rock->hardness)"
                              autocomplete="hardness"/>
                <x-input-error :messages="$errors->get('hardness')" class="mt-2"/>
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')"/>
                <x-text-input id="description" placeholder="Quartz filled geode from Morocco." class="block mt-1 w-full"
                              type="text" name="description"
                              :value="old('description', $rock->description)" autocomplete="description"/>
                <x-input-error :messages="$errors->get('description')" class="mt-2"/>
            </div>

            <!-- Continent -->
            <div class="mt-4">
                <x-input-label for="continent_id" :value="__('Continent')"/>
                <select id="continent_id" name="continent_id"
                        class="bg-gray-800 block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-10">
                    <option class="text-white" value=""></option>
                    @foreach ($continents as $continent)
                        <option value="{{ $continent->id }}"
                            {{ old('continent_id', $rock->continent_id) == $continent->id ? 'selected' : '' }}>
                            {{ $continent->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('continent_id')" class="mt-2"/>
            </div>

            <a href="/rocks/{{ $rock->id }}" class="text-sm/6  font-semibold text-white">Cancel</a>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Update Rock') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

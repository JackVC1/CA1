@props(['action', 'method', 'team', 'player'])


<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif
    <!-- Name -->
    <div class="mb-4">
        <label for="name" class="black text-sm font-medium text-gray-700">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $player->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            />
            @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <!-- Age -->
        <div class="mb-4">
        <label for="age" class="black text-sm font-medium text-gray-700">Age</label>
        <input
            type="integer"
            name="age"
            id="age"
            value="{{ old('age', $player->age ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            />
            @error('age')
            <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <!-- Position -->
        <div class="mb-4">
        <label for="position" class="black text-sm font-medium text-gray-700">Position</label>
        <input
            type="text"
            name="position"
            id="position"
            value="{{ old('position', $player->position ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            />
            @error('position')
            <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <!-- Country -->
        <div class="mb-4">
        <label for="country" class="black text-sm font-medium text-gray-700">Country</label>
        <input
            type="text"
            name="country"
            id="country"
            value="{{ old('country', $player->country ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            />
            @error('country')
            <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <!-- Last Club -->
        <div class="mb-4">
        <label for="signed_from" class="black text-sm font-medium text-gray-700">Last Club</label>
        <input
            type="text"
            name="signed_from"
            id="signed_from"
            value="{{ old('signed_from', $player->signed_from ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            />
            @error('signed_from')
            <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <x-primary-button>
            {{ isset($player) ? 'Update Player' : 'Save Player' }}
        </x-primary-button>

    </form>

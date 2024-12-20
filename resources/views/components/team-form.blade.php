@props(['action', 'method', 'team'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    <!-- cross-site request forgery token used to prevent csrf -->
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Name input fields for adding or updating -->
    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $team->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('name')
            <!-- throws error message when there is an issue with name -->
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($team->image)
        <div class="mb-4">
            <img src="{{ asset('images/teams/' . $team->image) }}" alt="Team crest" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <!-- Manager input fields for adding or updating -->
    <div class="mb-4">
        <label for="manager" class="block text-sm text-gray-700">Manager</label>
        <input
            type="text"
            name="manager"
            id="manager"
            value="{{ old('manager', $team->manager ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('manager')
            <!-- throws error message when there is an issue with manager -->
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Location input fields for adding or updating -->
    <div class="mb-4">
        <label for="location" class="block text-sm text-gray-700">Location</label>
        <input
            type="text"
            name="location"
            id="location"
            value="{{ old('location', $team->location ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('location')
            <!-- throws error message when there is an issue with location -->
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Stadium input fields for adding or updating -->
    <div class="mb-4">
        <label for="stadium" class="block text-sm text-gray-700">Stadium</label>
        <input
            type="text"
            name="stadium"
            id="stadium"
            value="{{ old('stadium', $team->stadium ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('stadium')
            <!-- throws error message when there is an issue with stadium -->
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Attendance input fields for adding or updating -->
    <div class="mb-4">
        <label for="attendance" class="block text-sm text-gray-700">Attendance</label>
        <input
            type="number"
            name="attendance"
            id="attendance"
            value="{{ old('attendance', $team->attendance ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('attendance')
            <!-- throws error message when there is an issue with attendance -->
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Year Established input fields for adding or updating -->
    <div class="mb-4">
        <label for="established" class="block text-sm text-gray-700">Established</label>
        <input
            type="number"
            name="established"
            id="established"
            value="{{ old('established', $team->established ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            min="1800"
            max="{{ date('Y') }}" />
        @error('established')
            <!-- throws error message when there is an issue with established year -->
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Image input fields for adding or updating -->
    <div class="mb-4">
        <!-- Edited text to show image change is optional when updating a team -->
        <label for="image" class="block text-sm font-medium text-gray-700">Team Crest Image (Optional)</label>
        <input
            type="file"
            name="image"
            id="image"
            {{ isset($team) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        @error('image')
            <!-- throws error message when there is an issue with image -->
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-primary-button>
            <!-- This changes the text of the button to suit the function used - update or add -->
            {{ isset($team) ? 'Update Team' : 'Add Team' }}
        </x-primary-button>
    </div>
</form>

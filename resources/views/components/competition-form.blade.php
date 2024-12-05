@props(['action', 'method', 'competition'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Name input fields for adding or updating -->
    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Competition Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $competition->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- image input fields for adding or updating -->
    @isset($competition->image)
        <div class="mb-4">
            <img src="{{ asset('images/teams/' . $competition->image) }}" alt="Competition logo" class="w-24 h-24 object-cover">
        </div>
    @endisset

    <!-- competition input fields for adding or updating -->
    <div class="mb-4">
        <label for="format" class="block text-sm text-gray-700">Competition Format</label>
        <input
            type="text"
            name="format"
            id="format"
            value="{{ old('format', $competition->format ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('format')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- prize money input fields for adding or updating -->
    <div class="mb-4">
        <label for="prize_money" class="block text-sm text-gray-700">Prize Money</label>
        <input
            type="text"
            name="prize_money"
            id="prize_money"
            value="{{ old('prize_money', $competition->prize_money ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('prize_money')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- image input fields for adding or updating -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Competition Logo (Optional)</label>
        <input
            type="file"
            name="image"
            id="image"
            {{ isset($competition) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <!-- when clicked competition is updated or added -->
        <x-primary-button>
            {{ isset($competition) ? 'Update Competition' : 'Add Competition' }}
        </x-primary-button>
    </div>
</form>

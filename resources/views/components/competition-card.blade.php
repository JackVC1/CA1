@props(['name', 'format', 'image', 'prizeMoney'])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 w-64 h-80">
    <h4 class="font-bold text-lg truncate">{{ $name }}</h4>
    <img src="{{ asset('images/teams/' . $image) }}" alt="{{ $name }}" class="h-32 w-full object-cover rounded-md">
    <p class="text-gray-600 mt-2">Format: {{ $format }}</p>
    <p class="text-gray-600 mt-2">Prize Money: €{{ number_format($prizeMoney, 2) }}</p>
</div>


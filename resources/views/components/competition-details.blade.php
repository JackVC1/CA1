<!-- Lists the arguments which can be passed in -->
@props(['name', 'format', 'image', 'prizeMoney'])

<!-- Competition Details Component -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{ $name }}</h4>
    <img src="{{ asset('images/teams/' . $image) }}" alt="{{ $name }}">
    <p class="text-gray-600">Format: {{ $format }}</p>
    <p class="text-gray-600">Prize Money: €{{ number_format($prizeMoney, 2) }}</p>
</div>

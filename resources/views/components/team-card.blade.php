<!-- Defines properties passed into the component -->
@props(['name', 'manager', 'image', 'location', 'stadium', 'attendance', 'year'])

<!-- This component creates cards that display each teams information in a card in the following order -->
<!-- Created on command line -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow:lg translation duration-300">
    <h4 class="font-bold text-lg">{{ $name }}</h4>
    <img src="{{asset( 'images/teams/' . $image)}}" alt="{{$name}}">
    <p class="text-gray-600">{{ $manager }}</p>
    <p class="text-gray-800 mt-4">{{ $location }}</p>
    <p class="text-gray-800 mt-4">{{ $stadium }}</p>
    <p class="text-gray-800 mt-4">{{ $attendance }}</p>
    <p class="text-gray-800 mt-4">{{ $year }}</p>
</div>

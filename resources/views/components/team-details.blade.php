<!-- Lists the arguments which can be passed in -->
@props(['name', 'manager', 'image', 'location', 'stadium', 'attendance', 'year'])

<!-- Team Details Component -->
<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 max-w-xl mx-auto"> <!-- Limit the overall container width to make the component more compact -->

    <!-- Team Name -->
    <h1 class="font-bold text-black-600 mb-4 text-center" style="font-size: 3rem;">{{ $name }}</h1> <!-- Center the heading -->

    <!-- Team Crest Image -->
    <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
        <img src="{{ asset('images/teams/' . $image) }}" alt="{{ $name }}" class="w-full max-w-xs h-auto object-cover">
    </div>

    <!-- Manager -->
    <h2 class="text-gray-500 text-sm not-italic mb-2" style="font-size: 1rem;">Manager: {{ $manager }}</h2>

    <!-- Location -->
    <h3 class="text-gray-500 text-sm not-italic mb-2" style="font-size: 1rem;">Location: {{ $location }}</h3>

    <!-- Stadium -->
    <h4 class="text-gray-500 text-sm not-italic mb-2" style="font-size: 1rem;">Stadium: {{ $stadium }}</h4>

    <!-- Attendance -->
    <h5 class="text-gray-500 text-sm not-italic mb-2" style="font-size: 1rem;">Attendance: {{ $attendance }}</h5>

    <!-- Year
    <h2 class="text-gray-500 text-sm not-italic mb-2" style="font-size: 1rem;">Established: {{ $year }}</h2> -->

</div>


<!-- This page is accessed when a card is clicked on the web page -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Teams') }}
        </h2>
    </x-slot>

    <!-- Consistent page styling -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Team Details</h3>
                    <!-- When clicked - opens the read part of CRUD and shows all details relevant to team selected -->
                    <x-team-details
                         :name="$team->name"
                         :manager="$team->manager"
                         :image="$team->image"
                         :location="$team->location"
                         :stadium="$team->stadium"
                         :attendance="$team->attendance"
                         :year="$team->year"
                         />

                         {{-- Team Players --}}
                         <h4 class="font-semibold text-md mt-8">Players</h4>
                         @if($team->players->isEmpty())
                         <p class="text-gray-600">No Players Yet</p>
                         @else
                         <ul class="mt-4 space-y-4">
                            @foreach($team->players as $player)
                            <li class="bg-gray-100 p-4 rounded-lg">
                                <p class="font-semibold">{{ $player->user->name }} ({{ $player->created_at->format('M d,Y') }})</p>
                                <p>Player: {{ $player->name }}</p>
                                <p>Age: {{ $player->age }}</p>
                                <p>Position: {{ $player->position }}</p>
                                <p>Country: {{ $player->country }}</p>
                                <p>Last Club: {{ $player->signed_from }}</p>
                            </li>
                            @endforeach
                         </ul>
                         @endif

                         {{--- Add A New Player ---}}
                         <h4 class="font-semibold text-md mt-8">Add a Player</h4>
                         <form action="{{ route('players.store', $team) }}" method="POST" class="mt-4">
                            @csrf

                            <div class="mb-4">
                        <label for="name" class="block text-sm text-gray-700">Name</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                        @error('name')
                        <!-- throws error message when there is an issue with name -->
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        </div>

                        <div class="mb-4">
                        <label for="age" class="block text-sm text-gray-700">Age</label>
                        <input
                            type="text"
                            name="age"
                            id="age"
                            required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                        @error('age')
                        <!-- throws error message when there is an issue with age -->
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        </div>

                        <div class="mb-4">
                        <label for="position" class="block text-sm text-gray-700">Position</label>
                        <input
                            type="text"
                            name="position"
                            id="position"
                            required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                        @error('position')
                        <!-- throws error message when there is an issue with position -->
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        </div>

                        <div class="mb-4">
                        <label for="country" class="block text-sm text-gray-700">Country</label>
                        <input
                            type="text"
                            name="country"
                            id="country"
                            required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                        @error('country')
                        <!-- throws error message when there is an issue with country -->
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        </div>

                        <div class="mb-4">
                        <label for="signed from" class="block text-sm text-gray-700">Signed From</label>
                        <input
                            type="text"
                            name="signed from"
                            id="signed from"
                            required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                        @error('signed from')
                        <!-- throws error message when there is an issue with signed from -->
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Submit Player
                        </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

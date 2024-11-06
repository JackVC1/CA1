<!-- This is the home page of the application -->
<!-- Each function routes back here when executed successfully -->
<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <!-- Page title -->
        {{ __('All Teams') }}
    </h2>
    <!-- calls success component and is displayed when function executes successfully -->
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>
</x-slot>

    <!-- page styling, consistent across application -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Teams:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Team card component - creates a card to contain and display all info passed into each team -->
                        @foreach($teams as $team)
                        <div>
                            <a href="{{ route('teams.show', $team) }}">
                                <x-team-card
                                :name="$team->name"
                                :image="$team->image"
                                :manager="$team->manager"
                                :location="$team->location"
                                :stadium="$team->stadium"
                                :attendance="$team->attendance"
                                :year="$team->year"
                                />
                            </a>

                            <!-- Edit and Delete Buttons -->
                            <div class="mt-4 flex space-x-2">
                                <!-- Edit button routes to teams.edit and receives the $team object so it knows which team is for editing -->
                                <a href="{{ route('teams.edit', $team) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                Edit
                                </a>

                                <!-- Delete Button - includes message asking if user are sure they want to delete team-->
                                <form action="{{ route('teams.destroy', $team) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this team?')">
                                    @csrf
                                    @method('DELETE')
                                    <!-- delete button red to differentiate from others and suit action -->
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

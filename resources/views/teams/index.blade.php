<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('All Teams') }}
    </h2>
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Teams:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($teams as $team)
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

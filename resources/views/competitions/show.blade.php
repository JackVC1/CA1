<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Competition Details') }}
        </h2>
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
    </x-slot>

    <!-- Consistent page styling -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Competition Details</h3>

                    <!-- Competition Details Section -->
                    <x-competition-details
                        :name="$competition->name"
                        :format="$competition->format"
                        :image="$competition->image"
                        :prizeMoney="$competition->prize_money"
                    />

                    <h4 class="font-semibold text-lg mb-4">Competition Teams</h4>
                    <div class="team-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($competition->teams as $team)
                        <x-team-card
                        :name="$team->name"
                        :image="$team->image"
                        :manager="$team->manager"
                        :location="$team->location"
                        :stadium="$team->stadium"
                        :attendance="$team->attendance"
                        :year="$team->year"
                        />
                    @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

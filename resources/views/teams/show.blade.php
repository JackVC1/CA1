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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

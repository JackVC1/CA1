<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome message card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome to the League of Ireland") }}
                </div>
            </div>

           <!-- cards that display current league and cup champions -->
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- First card including an image field and text box -->
        <div class="flex flex-col items-center">
            <img src="images/teams/shamrock-rovers-crest.png" alt="Image 1" class="mb-4 w-1/2 h-auto rounded-md">
            <div class="text-center">
                <p class="text-lg font-semibold text-gray-800">Shamrock Rovers</p>
                <p class="text-sm text-gray-600">Current League of Ireland Champions</p>
            </div>
        </div>

        <!-- Second card including an image field and text box -->
        <div class="flex flex-col items-center">
            <img src="images/teams/bray-wanderers-crest.png" alt="Image 2" class="mb-4 w-1/2 h-auto rounded-md">
            <div class="text-center">
                <br>
                <p class="text-lg font-semibold text-gray-800">Bray Wanderers</p>
                <p class="text-sm text-gray-600">Current FAI Cup Champions</p>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</x-app-layout>

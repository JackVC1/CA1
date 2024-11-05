<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Team') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                 <h3 class="font-semibold text-lg mb-4">Edit New Team:</h3>

                 <x-team-form
                    :action="route('teams.update', $team)"
                    :method="'PUT'"
                    :team="$team"
                    />

                </div>
            </div>
        </div>
    </div>

</x-app-layout>

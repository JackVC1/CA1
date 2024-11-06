<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Team') }}
        </h2>
    </x-slot>

    <!-- page styling, consistent with create page -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- sub-header shows we are editing teams on this page -->
                 <h3 class="font-semibold text-lg mb-4">Edit New Team:</h3>

    <!-- Reuses component from create.blade - method is now PUT and route is teams.update as we are updating rather than creating -->
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

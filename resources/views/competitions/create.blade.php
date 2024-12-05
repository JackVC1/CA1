<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- Sets page title as Create New Competition -->
            {{ __('Create New Competition') }}
        </h2>
    </x-slot>

    <!-- Page styling using containers, colours and sizing -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- sub-header to create new competitions -->
                    <h3 class="font-semibold text-lg mb-4">Add New Competition:</h3>

                    <!-- Reusable blade form component used in creating and updating competitions -->
                    <x-competition-form
                        :action="route('competitions.store')"
                        :method="'POST'"
                        />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

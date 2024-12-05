<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- Page title -->
            {{ __('All Competitions') }}
        </h2>
        <!-- Calls success component and is displayed when a function executes successfully -->
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Competitions:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                        <!-- Competition card component -->
                        @foreach($competitions as $competition)
                        <div>
                        <a href="{{ route('competitions.show', $competition) }}">
                            <x-competition-card
                                :name="$competition->name"
                                :format="$competition->format"
                                :image="$competition->image"
                                :prizeMoney="$competition->prize_money"
                                />
                        </a>

                            <!-- Edit and Delete Buttons -->
                            <div class="mt-4 flex space-x-2">
                                <!-- Edit button when clicked edit competitions opens-->
                                <a href="{{ route('competitions.edit', $competition) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('competitions.destroy', $competition) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this competition?')">
                                    @csrf
                                    @method('DELETE')
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

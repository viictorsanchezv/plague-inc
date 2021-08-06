<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="h-screen">
        <div class="h-screen ">
            <div class="h-screen bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:map>
            </div>
        </div>
    </div>
</x-app-layout>
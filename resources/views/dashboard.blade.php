<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reiniciar partida') }}
        </h2>
    </x-slot>

    <div class="h-screen bg-cover" style="background-image: url({{ URL::asset('img/start-game.jpg') }}); background-repeat: no-repeat;">
        <div class="max-w-5xl my-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <livewire:menu>
            </div>
        </div>
    </div>
</x-app-layout>

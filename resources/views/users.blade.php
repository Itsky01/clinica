<x-app-layout> <!-- seccion para pantalla principal de profesionales: titulo y contenido hereda de app.blade-->
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('profesionles') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 LISTADO DE PROFESIONALES 
            </div>
        </div>
    </div>
</x-app-layout>

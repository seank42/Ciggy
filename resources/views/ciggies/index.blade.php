<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ciggy Shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                  {{-- when add ciggy  button is clicked it rerotues to ciggies create page  --}}
                <a href="{{ route('ciggies.create') }}" class="btn-link btn-lg mb-2">Add a Ciggy</a>
                @foreach ($ciggies as $ciggy)
                <a href="{{ route('ciggies.show', $ciggy) }}">
                <div class="p-6 mt-6 bg-white border-b border-gray-200">
                    {{$ciggy->brand}}
                </div>
                </a>

                @endforeach


    </div>
        </div>
            </div>



</x-app-layout>

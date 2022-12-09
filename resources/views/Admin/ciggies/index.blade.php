<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ciggy Shop') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <x-alert-success>
                {{ session('success') }}
            </x-alert-success> --}}
            <a href="{{ route('admin.ciggies.create') }}" class="btn-link btn-lg mb-2">Add a Ciggy</a>
            @forelse ($ciggies as $ciggy)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        <a href="{{ route('admin.ciggies.show', $ciggy) }}">
                    </h2>
                    <p class="mt-2">
                        {{$ciggy->brand}}
                    </p>

                    <h3 class="font-bold text-1xl"> <strong> Manufacturer Name </strong>
                        {{$ciggy->manufacturer->name}} </h3>
                        {{$ciggy->manufacturer->address}}

                </div>
            @empty
            <p>No Ciggies</p>
            @endforelse
            <!-- This line of code simply adds the links for Pagination-->
            {{-- {{$ciggies->links()}} --}}
        </div>
    </div>
</x-app-layout>

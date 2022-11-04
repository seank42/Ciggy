<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ciggy Shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 mt-6 bg-white border-b border-gray-200">
                    <h2>
                    {{$ciggy->brand}}
                    </h2>
                    <p>{{$ciggy->type}}</p>
                    <p>{{$ciggy->price}}</p>
                </div>

                <a href="{{ route('ciggies.edit', $ciggy) }}" class="btn-link ml-auto">Edit</a>

                <form action="{{ route('ciggies.destroy', $ciggy) }}" method="post">
                    @method('delete')
                    @csrf
    </div><button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete?')">Delete </button>
         </div>
            </div>



</x-app-layout>

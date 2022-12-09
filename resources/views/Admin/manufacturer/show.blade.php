<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ciggy Shop') }}
        </h2>
    </x-slot>
  {{-- its a loop that gets its data from the database created  --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 mt-6 bg-white border-b border-gray-200">
                    {{-- <h2>
                    {{$ciggy->brand}}
                    </h2>
                    <p>{{$ciggy->type}}</p>
                    <p>{{$ciggy->price}}</p> --}}

                    <h1 class="text-xl font-bold mt-4">Manufacturer</h1>
                    <p>{{$manufacturer->name}}</p>
                    <p>{{$manufacturer->address}}</p>

                </div>
  {{-- when edit button is clicked it rerotues to the edit page  --}}
                <a href="{{ route('admin.manufacturer.edit', $manufacturer) }}" class="btn-link btn-lg mb-2">Edit</a>

                <form action="{{ route('admin.manufacturer.destroy', $manufacturer) }}" method="post">
                    @method('delete')
                    @csrf
    {{-- when delete  button is clicked it rerotues to the edit page  --}}
                </div><button type="submit" class="btn btn-danger ml-0" onclick="return confirm('Are you sure you want to delete?')">Delete </button>
         </div>
            </div>



</x-app-layout>



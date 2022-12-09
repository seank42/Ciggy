<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Ciggy') }}
        </h2>
    </x-slot>
 {{-- the text feild  for the function--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.ciggies.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input
                        type="text"
                        name="brand"
                        field="brand"
                        placeholder="Brand"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('brand')"></x-text-input>

                    <x-text-input
                        type="text"
                        name="type"
                        field="type"
                        placeholder="Type..."
                        class="w-full mt-6"
                        :value="@old('type')"></x-text-input>

                    <x-textarea
                        name="price"
                        rows="10"
                        field="price"
                        placeholder="Price..."
                        class="w-full mt-6"
                        :value="@old('price')"></x-textarea>

                    <x-text-input
                        type="text"
                        name="amount"
                        field="Amount"
                        placeholder="amount..."
                        class="w-full mt-6"
                        :value="@old('amount')"></x-text-input>

                        <label for="manufacturer">Manufacturer</label>
                        <select name="manufacturer_id">
                            @foreach ($manufacturers as $manufacturer)
                            <option value="{{$manufacturer->id}}" {{old('manufacturer_id') ? "selected" : ""}}>
                            {{$manufacturer->name}}
                            </option>
                            @endforeach
                        </select>

<br/>
                    <x-primary-button class="mt-6">Save Ciggy</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit manufacturer') }}
        </h2>
    </x-slot>
 {{-- the text feild  for the function--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.manufacturer.update', $manufacturer) }}" method="post" enctype="multipart/form-data">
                    @method('put')
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



                    <x-primary-button class="mt-6">Save manufacturer</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit manu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <!-- The route is admin.books.update, this route defined in web.php calls BookController:update() function -->
                <form action="{{ route('admin.manufacturers.update', $drink) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-text-input
                    type="text"
                    name="name"
                    field="name"
                    placeholder="name"
                    class="w-full"
                    autocomplete="off"
                    :value="@old('name', $manufacturer->name)"
                   ></x-text-input>

                <x-text-input
                    type="text"
                    name="price"
                    field="price"
                    placeholder="price"
                    class="w-full mt-6"
                    :value="@old('price', $manufacturer->price)"></x-text-input>

                <x-text-input
                    type="text"
                    name="quantity"
                    rows="10"
                    field="quantity"
                    placeholder="quantity"
                    class="w-full mt-6"
                    :value="@old('quantity', $manufacturer->quantity)"></x-text-input>

                <x-text-input
                    type="text"
                    name="alcohol_level"
                    field="alcohol_level"
                    placeholder="alcohol level"
                    class="w-full mt-6"
                    :value="@old('alcohol_level',$manufacturer->alcohol_level)"></x-text-input>

                    <div class="form-group">
                        <label for="manufacturer">manufacturer</label>
                        <select name="manufacturer_id">
                          @foreach ($manufacturers as $manufacturer)
                            <option value="{{$manufacturer->id}}" {{(old('manufacturer_id') == $manufacturer->id) ? "selected" : ""}}>
                              {{$manufacturer->name}}
                            </option>
                          @endforeach
                     </select>

               <x-primary-button class="mt-6">Save Drink</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

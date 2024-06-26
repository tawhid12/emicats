<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-center items-center h-full">
                <div class="w-full sm:max-w-2xl px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <form method="POST" action="{{ route('products.update',$product) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Brand Name -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="title">
                                Title <span class="text-red-400 text-xs">(Required)</span>
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="title" type="text" name="title" autofocus="autofocus" value="{{ old('title', $product->title) }}">
                            @error('title')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="ref">
                                Reference
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="ref" type="text" name="ref" autofocus="autofocus" value="{{ old('ref', $product->ref) }}">
                            @error('ref')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="ref1">
                                Reference One
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="ref1" type="text" name="ref1" autofocus="autofocus" value="{{ old('ref1', $product->ref1) }}">
                            @error('ref1')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="ref2">
                                Reference
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="ref2" type="text" name="ref2" autofocus="autofocus" value="{{ old('ref2', $product->ref2) }}">
                            @error('ref2')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="">
                                Select Brand
                            </label>
                            <select class="px-4 py-1 border focus:ring-gray-500 focus:border-gray-900 w-full"
                                id="select-brand" name="brands[]" autocomplete="off" multiple>
                                <option value="">Select</option>
                                @forelse ($brands as $b)
                                    <option value="{{ $b->id }}" {{ $product->brands->contains($b->id) ? 'selected' : '' }}>{{ $b->b_name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="">
                                Select Model
                            </label>
                            <select class="px-4 py-1 border focus:ring-gray-500 focus:border-gray-900 w-full"
                                id="select-carmodels" name="carmodels[]" autocomplete="off" multiple>
                                <option value="">Select</option>
                                @forelse ($carmodels as $c)
                                    <option value="{{ $c->id }}">{{ $c->model_name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="description">
                                Description
                            </label>
                            <textarea rows="4"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="description" name="description" autofocus="autofocus">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="">
                                Select Year
                            </label>
                            <select class="px-4 py-1 border focus:ring-gray-500 focus:border-gray-900 w-full"
                                id="select-years" name="years[]" autocomplete="off" multiple>
                                <option value="">Select</option>
                               @php for ($i = 1970; $i <= date('Y'); $i++) {@endphp
                                    <option value="{{$i}}">{{$i}}</option>
                                @php
                                    }
                                @endphp
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="manufacturer_id">
                                Select Manufacturer
                            </label>
                            <select class="px-4 py-1 border focus:ring-gray-500 focus:border-gray-900 w-full"
                                id="" name="manufacturer_id" autocomplete="off">
                                <option value="">Select</option>
                                @forelse ($manufacturers as $m)
                                    <option value="{{ $m->id }}">{{ $m->manu_name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="">
                                Select Components
                            </label>
                            <select class="px-4 py-1 border focus:ring-gray-500 focus:border-gray-900 w-full"
                                id="select-components" name="components[]" autocomplete="off" multiple>
                                <option value="">Select</option>
                                @forelse ($components as $c)
                                    <option value="{{ $c->id }}">{{ $c->c_name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="weight">
                                Weight
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="weight" type="text" name="weight" autofocus="autofocus" required value="{{ old('weight', $product->weight) }}">
                            @error('weight')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="pt">
                                Platinum
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="weight" type="text" name="pt" autofocus="autofocus" required value="{{ old('pt', $product->pt) }}">
                            @error('pt')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="pd">
                                 Palladium
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="weight" type="text" name="pd" autofocus="autofocus" required value="{{ old('pd', $product->pd) }}">
                            @error('pd')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="rh">
                                 Rhodium
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="weight" type="text" name="rh" autofocus="autofocus" required value="{{ old('rh', $product->rh) }}">
                            @error('rh')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Logo Upload -->
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700" for="image">
                                Image
                            </label>
                            <div class="flex flex-col image-preview">
                                {{-- <div class="flex itmes-center justify-center py-4">
                                    <img class="w-96 h-72 object-cover rounded-3xl"
                                        src="{{ asset(\App\Models\Product::PLACEHOLDER_IMAGE_PATH) }}" alt="">
                                </div> --}}

                                <input type="file" id="image" name="image[]" accept=".png, .jpg, .jpeg"
                                    class="image-upload-input" multiple>
                                <p class="text-xs text-gray-500 mt-1">Upload PNG, JPG, or JPEG files only.</p>
                                @if (count($product->getImageUrlAttribute()) > 0)
                                    <div class="slick-carousel">
                                        @foreach ($product->getImageUrlAttribute() as $image)
                                            <img class="w-20 h-16 object-cover" src="{{ $image }}"
                                                alt="{{ $product->title }}">
                                        @endforeach
                                    </div>
                                @else
                                    {{-- <p>No images available for this product.</p> --}}
                                    <img src="https://via.placeholder.com/300" alt="Product Image">
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-3">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

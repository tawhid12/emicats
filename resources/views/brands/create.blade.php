<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Brand') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-center items-center h-full">
                <div class="w-full sm:max-w-2xl px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <form method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Brand Name -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="brand">
                                Brand <span class="text-red-400 text-xs">(Required)</span>
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="brand" type="text" name="b_name" autofocus="autofocus">
                            @error('b_name')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Logo Upload -->
                        <div class="mt-4">
                            <label class="block font-medium text-sm text-gray-700" for="image">
                                Brand Image
                            </label>
                            <div class="flex flex-col image-preview">
                                <div class="flex itmes-center justify-center py-4">
                                    <img class="w-96 h-72 object-cover rounded-3xl"
                                        src="{{ asset(\App\Models\Brand::PLACEHOLDER_IMAGE_PATH) }}" alt="">
                                </div>

                                <input type="file" id="image" name="image" accept=".png, .jpg, .jpeg"
                                    class="image-upload-input">
                                <p class="text-xs text-gray-500 mt-1">Upload PNG, JPG, or JPEG files only.</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-3">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

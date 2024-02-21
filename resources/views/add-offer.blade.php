<x-app-layout>
    <div class="py-6">
        <div class="w-3/4 mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('offers.store') }}" enctype="multipart/form-data">
                        @csrf
                        <label class="block">
                            <span class="text-gray-700">Title <span>* Make This to attention user as required
                                    field</span></span>
                            <input type="text" class="mt-1 block w-full" placeholder="Title" name="title">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Price</span>
                            <input type="text" class="mt-1 block w-full" placeholder="Price" name="price">
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Select Category</span>
                            <select class="block w-full mt-1" name="categories[]">
                                <option value="">Select Category</option>
                                @forelse ($categories as $value)
                                    <option value="{{ $value->id }}">{{ $value->title }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('categories')
                                {{ $message }}
                            @enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Select Location</span>
                            <select class="block w-full mt-1" name="locations[]">
                                <option value="">Select Location</option>
                                @forelse ($locations as $value)
                                    <option {{ in_array($value->id, old('locations', [])) ? 'selected' : '' }}
                                        value="{{ $value->id }}">
                                        {{ $value->title }}</option>
                                @empty
                                @endforelse
                            </select>
                        </label>
                        <label class="block image-preview">
                            <span class="text-gray-700">Image</span>
                            <img src="" alt="">
                            <input type="file" class="image-upload-input mt-1 block w-full" name="image">
                        </label>
                        <label class="block">
                            <span class="text-gray-700">Description</span>
                            <textarea class="mt-1 block w-full" name="description"></textarea>
                        </label>
                        <button type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

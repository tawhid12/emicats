<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product List') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="flex justify-end">
                    <a href="{{ route('products.create') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full my-3">Create New
                        Product</a>
                </div>
                <form action="{{ route('products.index') }}">
                    @csrf
                    <div class="flex justify-center space-x-4 my-3">
                        <!-- Rounded Select Options -->
                        <div class="px-4 py-1 bg-white border rounded-lg">
                            <select
                                class="w-full bg-transparent text-sm text-gray-900 placeholder-gray-200 rounded border-none outline-none"
                                name="status">
                                <option disabled selected>Select Status</option>
                                <option>Select Status</option>
                            </select>
                        </div>
                        <!-- Rounded Input Box for Search -->
                        <input type="text"
                            class="px-4 py-1 rounded border border-gray-200 focus:outline-none focus:border-gray-500"
                            placeholder="Search..." name="search">
                        <!-- Search Icon Submit Button -->
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold text-sm py-1 px-6 rounded">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.783-4.783M12 19a7 7 0 100-14 7 7 0 000 14z"></path>
                            </svg>
                        </button>
                        <!-- Reset Button -->
                        <a href=""
                            class="bg-red-500 hover:bg-red-700 text-white font-bold text-sm py-1 px-6 rounded flex items-center">Reset</a>
                    </div>
                </form>

                @if (session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                        role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm"></p>
                            </div>
                        </div>
                    </div>
                @endif

                <table class="table-fixed w-full mt-3 text-sm">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $p)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $p->title }}</td>
                                <td class="border px-4 py-2">
                                    <img class="w-20 h-16 object-cover" src="{{ asset($p->image_url) }}" alt="">
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('brands.edit', $p) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    <a href=""
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="py-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

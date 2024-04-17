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

                <table class="table-fixed w-full mt-3 text-xs">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-1 py-1">No.</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Reference</th>
                            {{-- <th class="px-4 py-2" style="width: 300px">Description</th> --}}
                            <th class="px-4 py-2">PT|PD|RH</th>
                            <th class="px-4 py-2">Weight</th>
                            <th class="px-4 py-2">Brands</th>
                            <th class="px-4 py-2">Models</th>
                            <th class="px-4 py-2">Year</th>
                            <th class="px-4 py-2">Component</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2" style="width:100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $p)
                            <tr>
                                <td class="border px-1 py-1">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $p->title }}</td>
                                <td class="border px-4 py-2">
                                    {{ $p->ref }},
                                    {{ $p->ref1 }},
                                    {{ $p->ref2 }}
                                </td>
                                {{-- <td class="border px-4 py-2 w-50">{{ $p->description }}</td> --}}
                                <td class="border px-4 py-2">{{-- $p->manufacturer?->manu_name --}}
                                    <span>PT:{{ $p->pt }}</span>
                                    <span>PD:{{ $p->pd }}</span>
                                    <span>RH:{{ $p->rh }}</span>
                                </td>
                                <td class="border px-4 py-2">{{ $p->weight }}</td>
                                <td class="border px-4 py-2" style="width:300px">
                                    @php
                                        $brandNames = $p->brands->pluck('b_name')->implode(', ');
                                    @endphp
                                    {{ $brandNames }}
                                </td>
                                <td class="border px-4 py-2" style="width:300px">
                                    @php
                                        $carmodels = $p->carmodels->pluck('model_name')->implode(', ');
                                    @endphp
                                    {{ $carmodels }}
                                </td>
                                <td class="border px-4 py-2" style="width:300px">
                                    {{ $p->years }}
                                </td>
                                <td class="border px-4 py-2" style="width:300px">
                                    @php
                                        $componentNames = $p->components->pluck('c_name')->implode(', ');
                                    @endphp
                                    {{ $componentNames }}
                                </td>
                                <td class="border px-4 py-2">{{ $p->status }}</td>
                                <td class="border px-4 py-2">
                                    @if (count($p->getImageUrlAttribute()) > 0)
                                        <div class="slick-carousel">
                                            @foreach ($p->getImageUrlAttribute() as $image)
                                                <img class="w-20 h-16 object-cover" src="{{ $image }}"
                                                    alt="{{ $p->title }}">
                                            @endforeach
                                        </div>
                                    @else
                                        {{-- <p>No images available for this product.</p> --}}
                                        <img src="https://via.placeholder.com/300" alt="Product Image">
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    <p>
                                        {{-- <strong>Per Kilo Price</strong> --}}
                                        @php
                                            $ph =
                                                (($p->pt / 1000 / $setting->pt_value) *
                                                    $setting->pt *
                                                    $setting->exchange_rate *
                                                    $setting->pt_per) /
                                                100;
                                            $pd =
                                                (($p->pd / 1000 / $setting->pd_value) *
                                                    $setting->pd *
                                                    $setting->exchange_rate *
                                                    $setting->pd_per) /
                                                100;
                                            $rh =
                                                (($p->rh / 1000 / $setting->rh_value) *
                                                    $setting->rh *
                                                    $setting->exchange_rate *
                                                    $setting->rh_per) /
                                                100;
                                            $per_kilo_price = $ph + $pd + $rh;
                                        @endphp

                                        {{-- $per_kilo_price --}}
                                        {{ round(($p->weight * $per_kilo_price) / 1000) }}
                                    </p>
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('products.edit', $p) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 d-block px-4 rounded">Edit</a>
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('destroy-form-{{ $p->id }}').submit();"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">
                                        Delete
                                    </a>
                                    <form id="destroy-form-{{ $p->id }}"
                                        action="{{ route('products.destroy', $p->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
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

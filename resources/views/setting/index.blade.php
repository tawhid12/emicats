<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setting') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
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
                            <th class="px-1 py-1">PT</th>
                            <th class="px-4 py-2">Val</th>
                            <th class="px-4 py-2">%</th>
                            <th class="px-1 py-1">PD</th>
                            <th class="px-4 py-2">Val</th>
                            <th class="px-4 py-2">%</th>
                            <th class="px-1 py-1">RH</th>
                            <th class="px-4 py-2">Val</th>
                            <th class="px-4 py-2">%</th>
                            <th class="px-4 py-2">Exchange Rate</th>
                            <th class="px-4 py-2" style="width:100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="border px-4 py-2">{{ $setting->pt }}</td>
                            <td class="border px-4 py-2">{{ $setting->pt_value }}</td>
                            <td class="border px-4 py-2">{{ $setting->pt_per }}</td>
                            <td class="border px-4 py-2">{{ $setting->pd }}</td>
                            <td class="border px-4 py-2">{{ $setting->pd_value }}</td>
                            <td class="border px-4 py-2">{{ $setting->pd_per }}</td>
                            <td class="border px-4 py-2">{{ $setting->rh }}</td>
                            <td class="border px-4 py-2">{{ $setting->rh_value }}</td>
                            <td class="border px-4 py-2">{{ $setting->rh_per }}</td>
                            <td class="border px-4 py-2">{{ $setting->exchange_rate }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('setting.edit', $setting) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 d-block px-4 rounded">Edit</a>
                                <a href=""
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded">Delete</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-app-layout>

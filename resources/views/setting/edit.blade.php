<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Setting') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-center items-center h-full">
                <div class="w-full sm:max-w-2xl px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <form method="POST" action="{{ route('setting.update', $setting->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Brand Name -->
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="brand">
                                PT <span class="text-red-400 text-xs">(Required)</span>
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="brand" type="text" name="pt" autofocus="autofocus"
                                value="{{ old('pt', $setting->pt) }}">
                            @error('pt')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="brand">
                                PD <span class="text-red-400 text-xs">(Required)</span>
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="brand" type="text" name="pd" autofocus="autofocus"
                                value="{{ old('pd', $setting->pd) }}">
                            @error('pd')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="brand">
                                RH <span class="text-red-400 text-xs">(Required)</span>
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="brand" type="text" name="rh" autofocus="autofocus"
                                value="{{ old('rh', $setting->rh) }}">
                            @error('rh')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="brand">
                                PT Value<span class="text-red-400 text-xs">(Required)</span>
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="brand" type="text" name="pt_value" autofocus="autofocus"
                                value="{{ old('pt_value', $setting->pt_value) }}">
                            @error('pt_value')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="brand">
                                PT %<span class="text-red-400 text-xs">(Required)</span>
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="brand" type="text" name="pt_per" autofocus="autofocus"
                                value="{{ old('pt_per', $setting->pt_per) }}">
                            @error('pt_per')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="brand">
                                PD Value<span class="text-red-400 text-xs">(Required)</span>
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="brand" type="text" name="pd_value" autofocus="autofocus"
                                value="{{ old('pd_value', $setting->pd_value) }}">
                            @error('pt_value')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="brand">
                                PT %<span class="text-red-400 text-xs">(Required)</span>
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="brand" type="text" name="pd_per" autofocus="autofocus"
                                value="{{ old('pd_per', $setting->pd_per) }}">
                            @error('pd_per')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="brand">
                                Rh Value<span class="text-red-400 text-xs">(Required)</span>
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="brand" type="text" name="rh_value" autofocus="autofocus"
                                value="{{ old('rh_value', $setting->rh_value) }}">
                            @error('rh_value')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="brand">
                                RH %<span class="text-red-400 text-xs">(Required)</span>
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="brand" type="text" name="rh_per" autofocus="autofocus"
                                value="{{ old('rh_per', $setting->rh_per) }}">
                            @error('rh_per')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block font-medium text-sm text-gray-700" for="brand">
                                Exchange Rate (AED to Dollar)<span class="text-red-400 text-xs">(Required)</span>
                            </label>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                id="brand" type="text" name="exchange_rate" autofocus="autofocus"
                                value="{{ old('exchange_rate', $setting->exchange_rate) }}">
                            @error('exchange_rate')
                                <p class="text-red-700">{{ $message }}</p>
                            @enderror
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

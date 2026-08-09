<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Add Product') }}
            </h2>

            <a href="{{ route('products.index') }}"
               class="text-sm font-semibold text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                ← Back to Products
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-xl p-6">

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Product Information
                    </h3>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Add a new product to your LifeERP inventory.
                    </p>
                </div>

                <form method="POST" action="{{ route('products.store') }}">
                    @csrf

                    {{-- Basic Information --}}
                    <div class="mb-8">
                        <h4 class="text-md font-semibold text-gray-900 dark:text-white mb-4">
                            Basic Information
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- Product Name --}}
                            <div>
                                <label for="name"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Product Name *
                                </label>

                                <input type="text"
                                       name="name"
                                       id="name"
                                       value="{{ old('name') }}"
                                       required
                                       class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                       placeholder="e.g. Blackout Curtain">
                            </div>

                            {{-- Category --}}
                            <div>
                                <label for="category"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Category
                                </label>

                                <input type="text"
                                       name="category"
                                       id="category"
                                       value="{{ old('category') }}"
                                       class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                       placeholder="e.g. Curtains">
                            </div>

                            {{-- Brand --}}
                            <div>
                                <label for="brand"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Brand
                                </label>

                                <input type="text"
                                       name="brand"
                                       id="brand"
                                       value="{{ old('brand') }}"
                                       class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                       placeholder="Brand name">
                            </div>

                            {{-- Unit --}}
                            <div>
                                <label for="unit"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Unit *
                                </label>

                                <select name="unit"
                                        id="unit"
                                        required
                                        class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

                                    <option value="pcs" {{ old('unit', 'pcs') == 'pcs' ? 'selected' : '' }}>
                                        Pieces (pcs)
                                    </option>

                                    <option value="meter" {{ old('unit') == 'meter' ? 'selected' : '' }}>
                                        Meter
                                    </option>

                                    <option value="roll" {{ old('unit') == 'roll' ? 'selected' : '' }}>
                                        Roll
                                    </option>

                                    <option value="kg" {{ old('unit') == 'kg' ? 'selected' : '' }}>
                                        Kilogram (kg)
                                    </option>

                                    <option value="set" {{ old('unit') == 'set' ? 'selected' : '' }}>
                                        Set
                                    </option>
                                </select>
                            </div>

                        </div>

                        {{-- Description --}}
                        <div class="mt-6">
                            <label for="description"
                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Description
                            </label>

                            <textarea name="description"
                                      id="description"
                                      rows="4"
                                      class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                      placeholder="Product description...">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    {{-- Pricing --}}
                    <div class="mb-8">
                        <h4 class="text-md font-semibold text-gray-900 dark:text-white mb-4">
                            Pricing
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label for="cost_price"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Cost Price (QAR) *
                                </label>

                                <input type="number"
                                       name="cost_price"
                                       id="cost_price"
                                       value="{{ old('cost_price', 0) }}"
                                       min="0"
                                       step="0.01"
                                       required
                                       class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="selling_price"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Selling Price (QAR) *
                                </label>

                                <input type="number"
                                       name="selling_price"
                                       id="selling_price"
                                       value="{{ old('selling_price', 0) }}"
                                       min="0"
                                       step="0.01"
                                       required
                                       class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                        </div>
                    </div>

                    {{-- Inventory --}}
                    <div class="mb-8">
                        <h4 class="text-md font-semibold text-gray-900 dark:text-white mb-4">
                            Inventory
                        </h4>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label for="stock_quantity"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Opening Stock *
                                </label>

                                <input type="number"
                                       name="stock_quantity"
                                       id="stock_quantity"
                                       value="{{ old('stock_quantity', 0) }}"
                                       min="0"
                                       step="0.01"
                                       required
                                       class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div>
                                <label for="minimum_stock"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Minimum Stock *
                                </label>

                                <input type="number"
                                       name="minimum_stock"
                                       id="minimum_stock"
                                       value="{{ old('minimum_stock', 0) }}"
                                       min="0"
                                       step="0.01"
                                       required
                                       class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                        </div>
                    </div>

                    {{-- Status & Notes --}}
                    <div class="mb-8">
                        <h4 class="text-md font-semibold text-gray-900 dark:text-white mb-4">
                            Status & Notes
                        </h4>

                        <div class="flex items-center mb-6">
                            <input type="checkbox"
                                   name="is_active"
                                   id="is_active"
                                   value="1"
                                   checked
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">

                            <label for="is_active"
                                   class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                Product is active
                            </label>
                        </div>

                        <div>
                            <label for="notes"
                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Notes
                            </label>

                            <textarea name="notes"
                                      id="notes"
                                      rows="3"
                                      class="mt-1 block w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                      placeholder="Additional notes...">{{ old('notes') }}</textarea>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-end gap-4 border-t border-gray-200 dark:border-gray-700 pt-6">

                        <a href="{{ route('products.index') }}"
                           class="px-5 py-2.5 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 font-semibold hover:bg-gray-300 dark:hover:bg-gray-600">
                            Cancel
                        </a>

                        <button type="submit"
                                class="px-5 py-2.5 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700">
                            Save Product
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
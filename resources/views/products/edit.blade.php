<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Edit Product
            </h2>

            <a href="{{ route('products.index') }}"
               class="text-sm font-semibold text-gray-600 dark:text-gray-300 hover:text-indigo-500">
                ← Back to Products
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mb-6">
                        <h3 class="text-lg font-bold">
                            Edit Product
                        </h3>

                        <p class="text-gray-500 dark:text-gray-400 mt-1">
                            Update product information for
                            <span class="font-semibold">
                                {{ $product->product_code }}
                            </span>
                        </p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-lg">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form method="POST"
                          action="{{ route('products.update', $product) }}">

                        @csrf
                        @method('PUT')


                        {{-- Basic Information --}}
                        <div class="mb-8">

                            <h4 class="text-md font-bold mb-4">
                                Basic Information
                            </h4>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                {{-- Product Name --}}
                                <div>
                                    <label for="name"
                                           class="block text-sm font-medium mb-2">
                                        Product Name *
                                    </label>

                                    <input type="text"
                                           id="name"
                                           name="name"
                                           value="{{ old('name', $product->name) }}"
                                           required
                                           class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                    @error('name')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- Category --}}
                                <div>
                                    <label for="category"
                                           class="block text-sm font-medium mb-2">
                                        Category
                                    </label>

                                    <input type="text"
                                           id="category"
                                           name="category"
                                           value="{{ old('category', $product->category) }}"
                                           class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                    @error('category')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- Brand --}}
                                <div>
                                    <label for="brand"
                                           class="block text-sm font-medium mb-2">
                                        Brand
                                    </label>

                                    <input type="text"
                                           id="brand"
                                           name="brand"
                                           value="{{ old('brand', $product->brand) }}"
                                           class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                    @error('brand')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- Unit --}}
                                <div>
                                    <label for="unit"
                                           class="block text-sm font-medium mb-2">
                                        Unit *
                                    </label>

                                    <select id="unit"
                                            name="unit"
                                            required
                                            class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                        @php
                                            $units = [
                                                'pcs' => 'Pieces (pcs)',
                                                'meter' => 'Meter',
                                                'yard' => 'Yard',
                                                'kg' => 'Kilogram (kg)',
                                                'roll' => 'Roll',
                                                'set' => 'Set',
                                                'box' => 'Box',
                                            ];
                                        @endphp

                                        @foreach($units as $value => $label)
                                            <option value="{{ $value }}"
                                                {{ old('unit', $product->unit) === $value ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach

                                    </select>

                                    @error('unit')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>


                            {{-- Description --}}
                            <div class="mt-6">

                                <label for="description"
                                       class="block text-sm font-medium mb-2">
                                    Description
                                </label>

                                <textarea id="description"
                                          name="description"
                                          rows="4"
                                          class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">{{ old('description', $product->description) }}</textarea>

                                @error('description')
                                    <p class="text-red-500 text-sm mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>


                        {{-- Pricing --}}
                        <div class="mb-8">

                            <h4 class="text-md font-bold mb-4">
                                Pricing
                            </h4>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                {{-- Cost Price --}}
                                <div>
                                    <label for="cost_price"
                                           class="block text-sm font-medium mb-2">
                                        Cost Price (QAR) *
                                    </label>

                                    <input type="number"
                                           id="cost_price"
                                           name="cost_price"
                                           value="{{ old('cost_price', $product->cost_price) }}"
                                           min="0"
                                           step="0.01"
                                           required
                                           class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                    @error('cost_price')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- Selling Price --}}
                                <div>
                                    <label for="selling_price"
                                           class="block text-sm font-medium mb-2">
                                        Selling Price (QAR) *
                                    </label>

                                    <input type="number"
                                           id="selling_price"
                                           name="selling_price"
                                           value="{{ old('selling_price', $product->selling_price) }}"
                                           min="0"
                                           step="0.01"
                                           required
                                           class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                    @error('selling_price')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>

                        </div>


                        {{-- Inventory --}}
                        <div class="mb-8">

                            <h4 class="text-md font-bold mb-4">
                                Inventory
                            </h4>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                {{-- Stock --}}
                                <div>
                                    <label for="stock_quantity"
                                           class="block text-sm font-medium mb-2">
                                        Stock Quantity *
                                    </label>

                                    <input type="number"
                                           id="stock_quantity"
                                           name="stock_quantity"
                                           value="{{ old('stock_quantity', $product->stock_quantity) }}"
                                           min="0"
                                           step="0.01"
                                           required
                                           class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                    @error('stock_quantity')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                {{-- Minimum Stock --}}
                                <div>
                                    <label for="minimum_stock"
                                           class="block text-sm font-medium mb-2">
                                        Minimum Stock *
                                    </label>

                                    <input type="number"
                                           id="minimum_stock"
                                           name="minimum_stock"
                                           value="{{ old('minimum_stock', $product->minimum_stock) }}"
                                           min="0"
                                           step="0.01"
                                           required
                                           class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">

                                    @error('minimum_stock')
                                        <p class="text-red-500 text-sm mt-1">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                            </div>

                        </div>


                        {{-- Status --}}
                        <div class="mb-8">

                            <label class="flex items-center gap-3">

                                <input type="checkbox"
                                       name="is_active"
                                       value="1"
                                       {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm">

                                <span class="text-sm font-medium">
                                    Product is Active
                                </span>

                            </label>

                        </div>


                        {{-- Notes --}}
                        <div class="mb-8">

                            <label for="notes"
                                   class="block text-sm font-medium mb-2">
                                Notes
                            </label>

                            <textarea id="notes"
                                      name="notes"
                                      rows="4"
                                      class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">{{ old('notes', $product->notes) }}</textarea>

                            @error('notes')
                                <p class="text-red-500 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Buttons --}}
                        <div class="flex items-center gap-3">

                            <button type="submit"
                                    class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold">
                                Update Product
                            </button>

                            <a href="{{ route('products.show', $product) }}"
                               class="px-5 py-2.5 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 font-semibold">
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
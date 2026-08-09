<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Product Details
            </h2>

            <a href="{{ route('products.index') }}"
               class="text-sm font-semibold text-gray-600 dark:text-gray-300 hover:text-indigo-500">
                ← Back to Products
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Product Header --}}
                    <div class="flex items-center justify-between border-b border-gray-200 dark:border-gray-700 pb-5 mb-6">

                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Product Code
                            </p>

                            <h1 class="text-2xl font-bold mt-1">
                                {{ $product->product_code }}
                            </h1>
                        </div>

                        <div>
                            @if($product->is_active)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                                    ● Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-800">
                                    ● Inactive
                                </span>
                            @endif
                        </div>

                    </div>


                    {{-- Basic Information --}}
                    <div class="mb-8">

                        <h3 class="text-lg font-bold mb-5">
                            Basic Information
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Product Name
                                </p>

                                <p class="font-semibold mt-1">
                                    {{ $product->name }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Category
                                </p>

                                <p class="font-semibold mt-1">
                                    {{ $product->category ?: '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Brand
                                </p>

                                <p class="font-semibold mt-1">
                                    {{ $product->brand ?: '—' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Unit
                                </p>

                                <p class="font-semibold mt-1">
                                    {{ $product->unit }}
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Description --}}
                    @if($product->description)

                        <div class="mb-8">

                            <h3 class="text-lg font-bold mb-3">
                                Description
                            </h3>

                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4">
                                {{ $product->description }}
                            </div>

                        </div>

                    @endif


                    {{-- Pricing --}}
                    <div class="mb-8">

                        <h3 class="text-lg font-bold mb-5">
                            Pricing
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Cost Price
                                </p>

                                <p class="text-xl font-bold mt-1">
                                    QAR {{ number_format($product->cost_price, 2) }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Selling Price
                                </p>

                                <p class="text-xl font-bold text-green-600 mt-1">
                                    QAR {{ number_format($product->selling_price, 2) }}
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Stock --}}
                    <div class="mb-8">

                        <h3 class="text-lg font-bold mb-5">
                            Inventory
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Stock Quantity
                                </p>

                                <p class="text-xl font-bold mt-1">
                                    {{ number_format($product->stock_quantity, 2) }}
                                    {{ $product->unit }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Minimum Stock
                                </p>

                                <p class="text-xl font-bold mt-1">
                                    {{ number_format($product->minimum_stock, 2) }}
                                    {{ $product->unit }}
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- Notes --}}
                    @if($product->notes)

                        <div class="mb-8">

                            <h3 class="text-lg font-bold mb-3">
                                Notes
                            </h3>

                            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4">
                                {{ $product->notes }}
                            </div>

                        </div>

                    @endif


                    {{-- Dates --}}
                    <div class="border-t border-gray-200 dark:border-gray-700 pt-5">

                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">

                            <div>
                                Created:
                                {{ $product->created_at?->format('d M Y, h:i A') }}
                            </div>

                            <div>
                                Updated:
                                {{ $product->updated_at?->format('d M Y, h:i A') }}
                            </div>

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="flex items-center gap-3 mt-6">

                        <a href="{{ route('products.edit', $product) }}"
                           class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            Edit Product
                        </a>

                        <a href="{{ route('products.index') }}"
                           class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                            Back
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Products') }}
            </h2>

            <a href="{{ route('products.create') }}"
               class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700">
                + Add Product
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-xl overflow-hidden">

                {{-- Header --}}
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Product List
                            </h3>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Manage your LifeERP products and inventory.
                            </p>
                        </div>

                        <div class="text-sm text-gray-600 dark:text-gray-400">
                            Total: {{ $products->total() }}
                        </div>

                    </div>
                </div>

                @if ($products->count())

                    {{-- Table --}}
                    <div class="overflow-x-auto">

                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>

                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">
                                        Code
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">
                                        Product
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">
                                        Category
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">
                                        Unit
                                    </th>

                                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">
                                        Cost
                                    </th>

                                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">
                                        Selling
                                    </th>

                                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">
                                        Stock
                                    </th>

                                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">
                                        Status
                                    </th>

                                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase">
                                        Actions
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                @foreach ($products as $product)

                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">

                                        {{-- Code --}}
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="font-semibold text-gray-900 dark:text-white">
                                                {{ $product->product_code }}
                                            </span>
                                        </td>

                                        {{-- Product --}}
                                        <td class="px-6 py-4">
                                            <div class="font-medium text-gray-900 dark:text-white">
                                                {{ $product->name }}
                                            </div>

                                            @if ($product->brand)
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $product->brand }}
                                                </div>
                                            @endif
                                        </td>

                                        {{-- Category --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">
                                            {{ $product->category ?? '—' }}
                                        </td>

                                        {{-- Unit --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">
                                            {{ $product->unit }}
                                        </td>

                                        {{-- Cost --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-gray-700 dark:text-gray-300">
                                            QAR {{ number_format($product->cost_price, 2) }}
                                        </td>

                                        {{-- Selling --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right font-semibold text-gray-900 dark:text-white">
                                            QAR {{ number_format($product->selling_price, 2) }}
                                        </td>

                                        {{-- Stock --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right">

                                            @if ($product->stock_quantity <= $product->minimum_stock)
                                                <span class="font-semibold text-red-500">
                                                    {{ number_format($product->stock_quantity, 2) }}
                                                </span>
                                            @else
                                                <span class="text-gray-700 dark:text-gray-300">
                                                    {{ number_format($product->stock_quantity, 2) }}
                                                </span>
                                            @endif

                                        </td>

                                        {{-- Status --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-center">

                                            @if ($product->is_active)
                                                <span class="inline-flex px-2.5 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                    Active
                                                </span>
                                            @else
                                                <span class="inline-flex px-2.5 py-1 text-xs font-semibold rounded-full bg-gray-200 text-gray-700">
                                                    Inactive
                                                </span>
                                            @endif

                                        </td>

                                        {{-- Actions --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-center">

                                            <div class="flex items-center justify-center gap-3">

                                                <a href="{{ route('products.show', $product) }}"
                                                   class="text-blue-600 hover:text-blue-800 font-semibold">
                                                    View
                                                </a>

                                                <a href="{{ route('products.edit', $product) }}"
                                                   class="text-green-600 hover:text-green-800 font-semibold">
                                                    Edit
                                                </a>

                                                <form method="POST"
                                                      action="{{ route('products.destroy', $product) }}"
                                                      onsubmit="return confirm('Are you sure you want to delete this product?');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="text-red-600 hover:text-red-800 font-semibold">
                                                        Delete
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                    {{-- Pagination --}}
                    @if ($products->hasPages())
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            {{ $products->links() }}
                        </div>
                    @endif

                @else

                    {{-- Empty State --}}
                    <div class="p-12 text-center">

                        <div class="text-4xl mb-4">
                            📦
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            No Products Yet
                        </h3>

                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            Start by adding your first product.
                        </p>

                        <a href="{{ route('products.create') }}"
                           class="inline-block mt-6 px-5 py-2.5 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700">
                            + Add First Product
                        </a>

                    </div>

                @endif

            </div>

        </div>
    </div>

</x-app-layout>
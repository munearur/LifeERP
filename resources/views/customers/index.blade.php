<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Customers
            </h2>

            <a href="{{ route('customers.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent
                      rounded-md font-semibold text-xs text-white uppercase tracking-widest
                      hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900
                      focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                      transition ease-in-out duration-150">
                + Add Customer
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-300
                            text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-bold">
                                Customer List
                            </h3>

                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                Manage your LifeERP customers
                            </p>
                        </div>

                        <span class="text-sm text-gray-500 dark:text-gray-400">
                            Total: {{ $customers->total() }}
                        </span>
                    </div>

                    @if ($customers->count())

                        <div class="overflow-x-auto">

                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">

                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>

                                        <th class="px-6 py-3 text-left text-xs font-medium
                                                   text-gray-500 dark:text-gray-300 uppercase">
                                            Code
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium
                                                   text-gray-500 dark:text-gray-300 uppercase">
                                            Company
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium
                                                   text-gray-500 dark:text-gray-300 uppercase">
                                            Contact Person
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium
                                                   text-gray-500 dark:text-gray-300 uppercase">
                                            Phone
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium
                                                   text-gray-500 dark:text-gray-300 uppercase">
                                            Country
                                        </th>

                                        <th class="px-6 py-3 text-right text-xs font-medium
                                                   text-gray-500 dark:text-gray-300 uppercase">
                                            Actions
                                        </th>

                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                    @foreach ($customers as $customer)

                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="font-semibold text-blue-600">
                                                    {{ $customer->customer_code }}
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $customer->company_name ?? '-' }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $customer->contact_person }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $customer->phone }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $customer->country }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right">

                                                <a href="{{ route('customers.show', $customer) }}"
                                                   class="text-blue-600 hover:text-blue-900 mr-3">
                                                    View
                                                </a>

                                                <a href="{{ route('customers.edit', $customer) }}"
                                                   class="text-green-600 hover:text-green-900 mr-3">
                                                    Edit
                                                </a>

                                                <form action="{{ route('customers.destroy', $customer) }}"
                                                      method="POST"
                                                      class="inline">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this customer?')"
                                                            class="text-red-600 hover:text-red-900">
                                                        Delete
                                                    </button>

                                                </form>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                        {{-- Pagination --}}
                        <div class="mt-6">
                            {{ $customers->links() }}
                        </div>

                    @else

                        <div class="text-center py-12">

                            <div class="text-5xl mb-4">
                                👥
                            </div>

                            <h3 class="text-lg font-semibold mb-2">
                                No Customers Yet
                            </h3>

                            <p class="text-gray-500 dark:text-gray-400 mb-6">
                                Start by adding your first customer.
                            </p>

                            <a href="{{ route('customers.create') }}"
                               class="inline-flex items-center px-4 py-2
                                      bg-blue-600 text-white rounded-lg
                                      hover:bg-blue-700">
                                + Add First Customer
                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
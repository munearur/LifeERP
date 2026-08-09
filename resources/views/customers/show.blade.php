<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Customer Details
                </h2>
            </div>

            <div class="flex gap-2">

                <a href="{{ route('customers.edit', $customer) }}"
                   class="inline-flex items-center px-4 py-2 bg-green-600
                          border border-transparent rounded-md font-semibold text-xs
                          text-white uppercase tracking-widest hover:bg-green-700">
                    Edit Customer
                </a>

                <a href="{{ route('customers.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-600
                          border border-transparent rounded-md font-semibold text-xs
                          text-white uppercase tracking-widest hover:bg-gray-700">
                    ← Back
                </a>

            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">

                <div class="p-6">

                    {{-- Customer Header --}}
                    <div class="flex items-center justify-between pb-6
                                border-b border-gray-200 dark:border-gray-700">

                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Customer Code
                            </p>

                            <h1 class="text-3xl font-bold text-blue-600 mt-1">
                                {{ $customer->customer_code }}
                            </h1>
                        </div>

                        <div>
                            @if ($customer->is_active)
                                <span class="inline-flex items-center px-3 py-1
                                             rounded-full text-sm font-medium
                                             bg-green-100 text-green-800">
                                    ● Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1
                                             rounded-full text-sm font-medium
                                             bg-red-100 text-red-800">
                                    ● Inactive
                                </span>
                            @endif
                        </div>

                    </div>

                    {{-- Basic Information --}}
                    <div class="mt-8">

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            Basic Information
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Customer Type
                                </p>

                                <p class="mt-1 text-base font-medium text-gray-900 dark:text-white">
                                    {{ ucfirst($customer->customer_type) }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Company Name
                                </p>

                                <p class="mt-1 text-base font-medium text-gray-900 dark:text-white">
                                    {{ $customer->company_name ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Contact Person
                                </p>

                                <p class="mt-1 text-base font-medium text-gray-900 dark:text-white">
                                    {{ $customer->contact_person }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    VAT / Tax Number
                                </p>

                                <p class="mt-1 text-base font-medium text-gray-900 dark:text-white">
                                    {{ $customer->vat_number ?? '-' }}
                                </p>
                            </div>

                        </div>

                    </div>

                    {{-- Contact Information --}}
                    <div class="mt-10">

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            Contact Information
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Phone
                                </p>

                                <p class="mt-1 text-base font-medium text-gray-900 dark:text-white">
                                    {{ $customer->phone }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    WhatsApp
                                </p>

                                <p class="mt-1 text-base font-medium text-gray-900 dark:text-white">
                                    {{ $customer->whatsapp ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Email
                                </p>

                                <p class="mt-1 text-base font-medium text-gray-900 dark:text-white">
                                    {{ $customer->email ?? '-' }}
                                </p>
                            </div>

                        </div>

                    </div>

                    {{-- Address --}}
                    <div class="mt-10">

                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            Address
                        </h3>

                        <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-5">

                            <p class="text-gray-900 dark:text-white">
                                {{ $customer->address ?? '-' }}
                            </p>

                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                {{ $customer->city ?? '-' }},
                                {{ $customer->country }}
                            </p>

                        </div>

                    </div>

                    {{-- Notes --}}
                    @if ($customer->notes)

                        <div class="mt-10">

                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                Notes
                            </h3>

                            <div class="bg-yellow-50 dark:bg-yellow-900/20
                                        border border-yellow-200 dark:border-yellow-800
                                        rounded-lg p-5">

                                <p class="text-gray-800 dark:text-gray-200">
                                    {{ $customer->notes }}
                                </p>

                            </div>

                        </div>

                    @endif

                    {{-- Footer --}}
                    <div class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-700">

                        <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">

                            <span>
                                Created:
                                {{ $customer->created_at?->format('d M Y, h:i A') }}
                            </span>

                            <span>
                                Updated:
                                {{ $customer->updated_at?->format('d M Y, h:i A') }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
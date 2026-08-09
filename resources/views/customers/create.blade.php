<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Add Customer
            </h2>

            <a href="{{ route('customers.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent
                      rounded-md font-semibold text-xs text-white uppercase tracking-widest
                      hover:bg-gray-700 transition">
                ← Back to Customers
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Customer Information
                        </h3>

                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Add a new customer to LifeERP.
                        </p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 border border-red-300
                                    text-red-800 rounded-lg">
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('customers.store') }}">
                        @csrf

                        {{-- Customer Type --}}
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Customer Type
                            </label>

                            <div class="flex gap-6">

                                <label class="inline-flex items-center">
                                    <input type="radio"
                                           name="customer_type"
                                           value="company"
                                           checked
                                           class="text-blue-600 focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                        Company
                                    </span>
                                </label>

                                <label class="inline-flex items-center">
                                    <input type="radio"
                                           name="customer_type"
                                           value="individual"
                                           class="text-blue-600 focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                        Individual
                                    </span>
                                </label>

                            </div>
                        </div>

                        {{-- Company / Contact --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label for="company_name"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Company Name
                                </label>

                                <input type="text"
                                       id="company_name"
                                       name="company_name"
                                       value="{{ old('company_name') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300
                                              dark:bg-gray-900 dark:border-gray-700
                                              dark:text-white focus:border-blue-500
                                              focus:ring-blue-500">

                                @error('company_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="contact_person"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Contact Person <span class="text-red-500">*</span>
                                </label>

                                <input type="text"
                                       id="contact_person"
                                       name="contact_person"
                                       value="{{ old('contact_person') }}"
                                       required
                                       class="mt-1 block w-full rounded-md border-gray-300
                                              dark:bg-gray-900 dark:border-gray-700
                                              dark:text-white focus:border-blue-500
                                              focus:ring-blue-500">

                                @error('contact_person')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- Phone / WhatsApp --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                            <div>
                                <label for="phone"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Phone <span class="text-red-500">*</span>
                                </label>

                                <input type="text"
                                       id="phone"
                                       name="phone"
                                       value="{{ old('phone') }}"
                                       required
                                       placeholder="+974 XXXXXXXX"
                                       class="mt-1 block w-full rounded-md border-gray-300
                                              dark:bg-gray-900 dark:border-gray-700
                                              dark:text-white focus:border-blue-500
                                              focus:ring-blue-500">

                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="whatsapp"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    WhatsApp
                                </label>

                                <input type="text"
                                       id="whatsapp"
                                       name="whatsapp"
                                       value="{{ old('whatsapp') }}"
                                       placeholder="+974 XXXXXXXX"
                                       class="mt-1 block w-full rounded-md border-gray-300
                                              dark:bg-gray-900 dark:border-gray-700
                                              dark:text-white focus:border-blue-500
                                              focus:ring-blue-500">

                                @error('whatsapp')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- Email / VAT --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                            <div>
                                <label for="email"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Email
                                </label>

                                <input type="email"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300
                                              dark:bg-gray-900 dark:border-gray-700
                                              dark:text-white focus:border-blue-500
                                              focus:ring-blue-500">

                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="vat_number"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    VAT / Tax Number
                                </label>

                                <input type="text"
                                       id="vat_number"
                                       name="vat_number"
                                       value="{{ old('vat_number') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300
                                              dark:bg-gray-900 dark:border-gray-700
                                              dark:text-white focus:border-blue-500
                                              focus:ring-blue-500">

                                @error('vat_number')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- Address --}}
                        <div class="mt-6">

                            <label for="address"
                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Address
                            </label>

                            <textarea id="address"
                                      name="address"
                                      rows="3"
                                      class="mt-1 block w-full rounded-md border-gray-300
                                             dark:bg-gray-900 dark:border-gray-700
                                             dark:text-white focus:border-blue-500
                                             focus:ring-blue-500">{{ old('address') }}</textarea>

                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- City / Country --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                            <div>
                                <label for="city"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    City
                                </label>

                                <input type="text"
                                       id="city"
                                       name="city"
                                       value="{{ old('city') }}"
                                       placeholder="Doha"
                                       class="mt-1 block w-full rounded-md border-gray-300
                                              dark:bg-gray-900 dark:border-gray-700
                                              dark:text-white focus:border-blue-500
                                              focus:ring-blue-500">

                                @error('city')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="country"
                                       class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Country <span class="text-red-500">*</span>
                                </label>

                                <input type="text"
                                       id="country"
                                       name="country"
                                       value="{{ old('country', 'Qatar') }}"
                                       required
                                       class="mt-1 block w-full rounded-md border-gray-300
                                              dark:bg-gray-900 dark:border-gray-700
                                              dark:text-white focus:border-blue-500
                                              focus:ring-blue-500">

                                @error('country')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- Notes --}}
                        <div class="mt-6">

                            <label for="notes"
                                   class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Notes
                            </label>

                            <textarea id="notes"
                                      name="notes"
                                      rows="4"
                                      placeholder="Additional customer notes..."
                                      class="mt-1 block w-full rounded-md border-gray-300
                                             dark:bg-gray-900 dark:border-gray-700
                                             dark:text-white focus:border-blue-500
                                             focus:ring-blue-500">{{ old('notes') }}</textarea>

                            @error('notes')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        {{-- Active --}}
                        <div class="mt-6">

                            <label class="inline-flex items-center">

                                <input type="checkbox"
                                       name="is_active"
                                       value="1"
                                       checked
                                       class="rounded border-gray-300 text-blue-600
                                              shadow-sm focus:ring-blue-500">

                                <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                                    Active Customer
                                </span>

                            </label>

                        </div>

                        {{-- Buttons --}}
                        <div class="flex items-center justify-end gap-3 mt-8 pt-6
                                    border-t border-gray-200 dark:border-gray-700">

                            <a href="{{ route('customers.index') }}"
                               class="px-5 py-2.5 bg-gray-200 dark:bg-gray-700
                                      text-gray-700 dark:text-gray-200 rounded-lg
                                      hover:bg-gray-300 dark:hover:bg-gray-600">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="px-5 py-2.5 bg-blue-600 text-white rounded-lg
                                           hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                                Save Customer
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Edit Customer
            </h2>

            <a href="{{ route('customers.show', $customer) }}"
               class="inline-flex items-center px-4 py-2 bg-gray-600
                      border border-transparent rounded-md font-semibold text-xs
                      text-white uppercase tracking-widest hover:bg-gray-700">
                ← Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <div class="mb-8">
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                            Edit Customer
                        </h1>

                        <p class="mt-1 text-gray-600 dark:text-gray-400">
                            Update customer information for
                            <strong>{{ $customer->customer_code }}</strong>
                        </p>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 border border-red-300
                                    text-red-700 rounded-lg">

                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('customers.update', $customer) }}">

                        @csrf
                        @method('PATCH')

                        {{-- Customer Type --}}
                        <div class="mb-6">

                            <label class="block text-sm font-medium
                                          text-gray-700 dark:text-gray-300 mb-2">
                                Customer Type
                            </label>

                            <div class="flex gap-6">

                                <label class="flex items-center">
                                    <input type="radio"
                                           name="customer_type"
                                           value="company"
                                           class="text-blue-600"
                                           {{ old('customer_type', $customer->customer_type) === 'company' ? 'checked' : '' }}>

                                    <span class="ml-2 text-gray-700 dark:text-gray-300">
                                        Company
                                    </span>
                                </label>

                                <label class="flex items-center">
                                    <input type="radio"
                                           name="customer_type"
                                           value="individual"
                                           class="text-blue-600"
                                           {{ old('customer_type', $customer->customer_type) === 'individual' ? 'checked' : '' }}>

                                    <span class="ml-2 text-gray-700 dark:text-gray-300">
                                        Individual
                                    </span>
                                </label>

                            </div>

                        </div>

                        {{-- Company / Contact --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label class="block text-sm font-medium
                                              text-gray-700 dark:text-gray-300">
                                    Company Name
                                </label>

                                <input type="text"
                                       name="company_name"
                                       value="{{ old('company_name', $customer->company_name) }}"
                                       class="mt-1 block w-full rounded-md
                                              border-gray-300 dark:border-gray-700
                                              dark:bg-gray-900 dark:text-white
                                              shadow-sm">

                                @error('company_name')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium
                                              text-gray-700 dark:text-gray-300">
                                    Contact Person *
                                </label>

                                <input type="text"
                                       name="contact_person"
                                       value="{{ old('contact_person', $customer->contact_person) }}"
                                       required
                                       class="mt-1 block w-full rounded-md
                                              border-gray-300 dark:border-gray-700
                                              dark:bg-gray-900 dark:text-white
                                              shadow-sm">

                                @error('contact_person')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Phone --}}
                            <div>
                                <label class="block text-sm font-medium
                                              text-gray-700 dark:text-gray-300">
                                    Phone *
                                </label>

                                <input type="text"
                                       name="phone"
                                       value="{{ old('phone', $customer->phone) }}"
                                       required
                                       class="mt-1 block w-full rounded-md
                                              border-gray-300 dark:border-gray-700
                                              dark:bg-gray-900 dark:text-white
                                              shadow-sm">

                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- WhatsApp --}}
                            <div>
                                <label class="block text-sm font-medium
                                              text-gray-700 dark:text-gray-300">
                                    WhatsApp
                                </label>

                                <input type="text"
                                       name="whatsapp"
                                       value="{{ old('whatsapp', $customer->whatsapp) }}"
                                       class="mt-1 block w-full rounded-md
                                              border-gray-300 dark:border-gray-700
                                              dark:bg-gray-900 dark:text-white
                                              shadow-sm">

                                @error('whatsapp')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label class="block text-sm font-medium
                                              text-gray-700 dark:text-gray-300">
                                    Email
                                </label>

                                <input type="email"
                                       name="email"
                                       value="{{ old('email', $customer->email) }}"
                                       class="mt-1 block w-full rounded-md
                                              border-gray-300 dark:border-gray-700
                                              dark:bg-gray-900 dark:text-white
                                              shadow-sm">

                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- VAT --}}
                            <div>
                                <label class="block text-sm font-medium
                                              text-gray-700 dark:text-gray-300">
                                    VAT / Tax Number
                                </label>

                                <input type="text"
                                       name="vat_number"
                                       value="{{ old('vat_number', $customer->vat_number) }}"
                                       class="mt-1 block w-full rounded-md
                                              border-gray-300 dark:border-gray-700
                                              dark:bg-gray-900 dark:text-white
                                              shadow-sm">

                                @error('vat_number')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>

                        {{-- Address --}}
                        <div class="mt-6">

                            <label class="block text-sm font-medium
                                          text-gray-700 dark:text-gray-300">
                                Address
                            </label>

                            <textarea name="address"
                                      rows="3"
                                      class="mt-1 block w-full rounded-md
                                             border-gray-300 dark:border-gray-700
                                             dark:bg-gray-900 dark:text-white
                                             shadow-sm">{{ old('address', $customer->address) }}</textarea>

                        </div>

                        {{-- City / Country --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                            <div>
                                <label class="block text-sm font-medium
                                              text-gray-700 dark:text-gray-300">
                                    City
                                </label>

                                <input type="text"
                                       name="city"
                                       value="{{ old('city', $customer->city) }}"
                                       class="mt-1 block w-full rounded-md
                                              border-gray-300 dark:border-gray-700
                                              dark:bg-gray-900 dark:text-white
                                              shadow-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-medium
                                              text-gray-700 dark:text-gray-300">
                                    Country *
                                </label>

                                <input type="text"
                                       name="country"
                                       value="{{ old('country', $customer->country) }}"
                                       required
                                       class="mt-1 block w-full rounded-md
                                              border-gray-300 dark:border-gray-700
                                              dark:bg-gray-900 dark:text-white
                                              shadow-sm">
                            </div>

                        </div>

                        {{-- Notes --}}
                        <div class="mt-6">

                            <label class="block text-sm font-medium
                                          text-gray-700 dark:text-gray-300">
                                Notes
                            </label>

                            <textarea name="notes"
                                      rows="4"
                                      class="mt-1 block w-full rounded-md
                                             border-gray-300 dark:border-gray-700
                                             dark:bg-gray-900 dark:text-white
                                             shadow-sm">{{ old('notes', $customer->notes) }}</textarea>

                        </div>

                        {{-- Active --}}
                        <div class="mt-6">

                            <label class="flex items-center">

                                <input type="checkbox"
                                       name="is_active"
                                       value="1"
                                       {{ old('is_active', $customer->is_active) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-blue-600
                                              shadow-sm">

                                <span class="ml-2 text-sm text-gray-700
                                             dark:text-gray-300">
                                    Active Customer
                                </span>

                            </label>

                        </div>

                        {{-- Buttons --}}
                        <div class="flex items-center justify-end gap-3 mt-8
                                    pt-6 border-t border-gray-200
                                    dark:border-gray-700">

                            <a href="{{ route('customers.show', $customer) }}"
                               class="px-5 py-2.5 bg-gray-600 text-white
                                      rounded-md font-semibold text-sm
                                      hover:bg-gray-700">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="px-5 py-2.5 bg-blue-600 text-white
                                           rounded-md font-semibold text-sm
                                           hover:bg-blue-700">
                                Update Customer
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>
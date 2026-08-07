<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">
                🚀 LifeERP Dashboard
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-blue-600 text-white rounded-xl p-6 shadow">
                    <h2 class="text-lg font-semibold">Today's Sales</h2>
                    <p class="text-3xl font-bold mt-3">QAR 0.00</p>
                </div>

                <div class="bg-green-600 text-white rounded-xl p-6 shadow">
                    <h2 class="text-lg font-semibold">Customers</h2>
                    <p class="text-3xl font-bold mt-3">0</p>
                </div>

                <div class="bg-purple-600 text-white rounded-xl p-6 shadow">
                    <h2 class="text-lg font-semibold">Products</h2>
                    <p class="text-3xl font-bold mt-3">0</p>
                </div>

                <div class="bg-red-600 text-white rounded-xl p-6 shadow">
                    <h2 class="text-lg font-semibold">Pending Orders</h2>
                    <p class="text-3xl font-bold mt-3">0</p>
                </div>

            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                    Recent Activity
                </h2>

                <p class="text-gray-600 dark:text-gray-300">
                    Welcome to LifeERP. Your business dashboard is ready.
                </p>
            </div>

        </div>
    </div>
</x-app-layout>
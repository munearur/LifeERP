<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of customers.
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(10);

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created customer.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_type'  => ['required', 'in:company,individual'],
            'company_name'   => ['nullable', 'string', 'max:255'],
            'contact_person' => ['required', 'string', 'max:255'],
            'phone'          => ['required', 'string', 'max:50'],
            'whatsapp'       => ['nullable', 'string', 'max:50'],
            'email'          => ['nullable', 'email', 'max:255'],
            'address'        => ['nullable', 'string'],
            'city'           => ['nullable', 'string', 'max:100'],
            'country'        => ['required', 'string', 'max:100'],
            'vat_number'     => ['nullable', 'string', 'max:100'],
            'is_active'      => ['nullable', 'boolean'],
            'notes'          => ['nullable', 'string'],
        ]);

        // Generate customer code: CUS-0001, CUS-0002, etc.
        $nextNumber = (Customer::max('id') ?? 0) + 1;

        $validated['customer_code'] = 'CUS-' . str_pad(
            $nextNumber,
            4,
            '0',
            STR_PAD_LEFT
        );

        $validated['is_active'] = $request->boolean('is_active');

        Customer::create($validated);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified customer.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified customer.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified customer.
     */
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'customer_type'  => ['required', 'in:company,individual'],
            'company_name'   => ['nullable', 'string', 'max:255'],
            'contact_person' => ['required', 'string', 'max:255'],
            'phone'          => ['required', 'string', 'max:50'],
            'whatsapp'       => ['nullable', 'string', 'max:50'],
            'email'          => ['nullable', 'email', 'max:255'],
            'address'        => ['nullable', 'string'],
            'city'           => ['nullable', 'string', 'max:100'],
            'country'        => ['required', 'string', 'max:100'],
            'vat_number'     => ['nullable', 'string', 'max:100'],
            'is_active'      => ['nullable', 'boolean'],
            'notes'          => ['nullable', 'string'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $customer->update($validated);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified customer.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->with('success', 'Customer deleted successfully.');
    }
}
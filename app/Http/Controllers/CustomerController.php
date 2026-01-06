<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => 'required|string|min:6|confirmed',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string',
            'bio'      => 'nullable|string',
            'status'   => 'required|in:active,banned,pending',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'address', 'bio', 'status']);
        $data['password'] = bcrypt($request->password);

        // Check if customer with the same email exists
        $existingCustomer = Customer::where('email', $request->email)->first();

        if ($existingCustomer) {
            // Delete old profile image if it exists
            if ($existingCustomer->profile_image && Storage::disk('public')->exists($existingCustomer->profile_image)) {
                Storage::disk('public')->delete($existingCustomer->profile_image);
            }

            // Store new image
            if ($request->hasFile('profile_image')) {
                $data['profile_image'] = $request->file('profile_image')->store('profiles', 'public');
            }

            // Update existing customer
            $existingCustomer->update($data);
        } else {
            // Store new image
            if ($request->hasFile('profile_image')) {
                $data['profile_image'] = $request->file('profile_image')->store('profiles', 'public');
            }

            // Create new customer
            Customer::create($data);
        }

        return redirect()->route('customers.index')->with('success', 'Customer saved successfully.');
    }



      public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }



   public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:customers,email,' . $customer->id,
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string',
            'bio'      => 'nullable|string',
            'status'   => 'required|in:active,banned,pending',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'phone', 'address', 'bio', 'status']);

        // If a new image is uploaded
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($customer->profile_image && Storage::disk('public')->exists($customer->profile_image)) {
                Storage::disk('public')->delete($customer->profile_image);
            }

            // Store new image
            $data['profile_image'] = $request->file('profile_image')->store('profiles', 'public');
        }

        // Update customer
        $customer->update($data);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }



    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }



    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}

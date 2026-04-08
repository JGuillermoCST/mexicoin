<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // This controller will handle address-related actions
    // such as listing addresses, creating new addresses,
    // updating existing addresses, and deleting addresses.

    // Methods for handling addresses will be added here
    // as needed in the future.

    public function index()
    {
        // Logic to list all addresses
        $addresses = Address::where('user_id', Auth::user()->id)->get();

        return view('users.addresses.index', compact('addresses'));
    }

    public function store(Request $request)
    {
        // Logic to create a new address
        $request->validate([
            'name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'street2' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'number_ext' => 'required|numeric',
            'number_int' => 'nullable|numeric',
            'zip_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
        ]);

        Address::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'street' => $request->street,
            'street2' => $request->street2,
            'number_ext' => $request->number_ext,
            'number_int' => $request->number_int,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
        ]);

        return redirect()->route('addresses')->with('success', 'Dirección agregada exitosamente.');
    }

    public function update(Request $request, $id)
    {
        // Logic to update an existing address
        $address = Address::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'street2' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'number_ext' => 'required|numeric',
            'number_int' => 'nullable|numeric',
            'zip_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
        ]);

        $address->update([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'street' => $request->street,
            'street2' => $request->street2,
            'number_ext' => $request->number_ext,
            'number_int' => $request->number_int,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
        ]);

        return redirect()->route('addresses')->with('success', 'Dirección actualizada exitosamente.');
    }

    public function destroy($id)
    {
        // Logic to delete an address
        $address = Address::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $address->delete();

        return redirect()->route('addresses')->with('success', 'Dirección eliminada exitosamente.');
    }
}

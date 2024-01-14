<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index()
    {
        $customers = Customer::all();

        if (request()->wantsJson()) {
            return response()->json($customers->toArray());
        }

        return view('customer.index', compact('customers'));
    }

    function store(Request $request)
    {

        $customers = Customer::create($request->except('_token', '_method'));

        alert()->success('Berhasil!', 'Data Pelanggan Berhasil Disimpan!');

        return redirect()->route('customers.index');
    }

    function update(Request $request, Customer $customer)
    {

        $customer->fill($request->except('_token', '_method'));

        $customer->save();

        alert()->success('Berhasil!', 'Data Pelanggan Telah Berhasil Dirubah!');

        return redirect()->route('customers.index');
    }

    function destroy(Customer $customer)
    {
        $customer->delete();

        alert()->success('Berhasil!', 'Data Pelanggan Berhasil Dihapus!');

        return redirect()->route('customers.index');
    }
}

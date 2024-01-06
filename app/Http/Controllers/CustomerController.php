<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index() {
        $customers = Customer::all();

        if(request()->wantsJson()) {
            return response()->json($customers->toArray());
        }

        return view('customer.index', compact('customers'));
    }
}

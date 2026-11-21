<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Task 10
    public function index()
    {
        return response()->json(Customer::all());
    }

    // Task 2
    public function store(Request $request)
    {
        $data = $request->validate([
            "name"         => "required|string",
            "password"     => ["required", "string", "min:8"],
            "email"        => ["required", "string", "email", "unique:customers,email"],
            "phone_number" => ["required", "string", "unique:customers,phone_number"],
        ]);

        $customer = Customer::create($data);
        $token = $customer->createToken("login")->plainTextToken;

        return response()->json([
            "customer" => $customer,
            "token"    => $token,
        ], 201);
    }

    // Task 10
    public function show(Customer $customer)
    {
        return response()->json($customer->load("borrowings"));
    }
}

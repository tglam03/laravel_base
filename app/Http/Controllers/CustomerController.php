<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::query()->latest('id')->paginate(5);

        return view('customers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name'      => 'required|max:255',
            'address'   => 'required|max:255',
            'phone'   => [
                'required',
                'max:20',
                Rule::unique('customers')
            ],
            'email'   => 'required|max:255|email',
            'is_actve' => [
                'nullable',
                Rule::in(0, 1)
            ],
        ]);

        try {

            Customer::query()->create($data);

            return redirect()->route('customers.index')->with('success', 'Thao tac thanh cong');
        } catch (\throwable $th) {
            return back()->with('success', 'That bai');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name'      => 'required|max:255',
            'address'   => 'required|max:255',
            'avatar'    =>  'nullable|max:2048',
            'phone'     =>  [
                'required',
                'string',
                'max:20',
                Rule::unique('customers')->ignore($customer->id)
            ],
            'email'     =>  'required|email|max:100',
            'is_active' =>  ['nullable', Rule::in(0, 1)]
        ]);

        try {
            //code...
            // check is active co ton tai  data base
            $data['is_active'] ??= 0;

            $customer->update($data);


            return redirect()->route('customers.index')
                ->with('succes', 'Thao tac thanh cong');
        } catch (\Throwable $th) {

            return back()
                ->with('succes', 'That bai')
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {

            $customer->delete();

            return back()->with('success', 'Thanh cong');
        } catch (\throwable $th) {
            return back()->with('success', 'That bai');
        }
    }

    // force remove
    public function forceDestroy(Customer $customer): \Illuminate\Http\RedirectResponse
    {
        try {

            $customer->delete();

            return back()->with('success', 'Thanh cong');
        } catch (\throwable $th) {
            return back()->with('success', 'That bai');
        }
    }
}

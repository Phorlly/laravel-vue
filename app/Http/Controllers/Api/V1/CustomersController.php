<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Customer::orderBy('created_at', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            "name" => "required|string|max:100",
            "phone" => "required|string|max:20",
            "address" => "required|string|max:255",
        ]);

        $data = Customer::create([
            'name' => $request->name,
            'sex' => $request->sex,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return response([
            "message" => "Successfully Data Saved.!",
            "status_code" => 200,
            "data" => $data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Customer::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $this->validate($request, [
            "name" => "required|string|max:100",
            "phone" => "required|string|max:20",
            "address" => "required|string|max:255",
        ]);

        $data = Customer::findOrFail($id)->update($request->all());

        return response([
            "message" => "Successfully Data Saved.!",
            "status_code" => 200,
            "data" => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Customer::findOrFail($id)->delete();

        return response([
            "message" => "Successfully Data Deleted.!",
            "status_code" => 200
        ]);
    }
}
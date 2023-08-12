<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // desc
        return Category::orderBy('created_at', 'asc')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|string|max:100"
        ]);

        $data = Category::create([
            'name' => $request->name,
            'name_kh' => $request->name_kh,
            'noted' => $request->noted
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
       return Category::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "name" => "required|string|max:100",
        ]);

        $data = Category::findOrFail($id)->update($request->all());

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
        Category::findOrFail($id)->delete();

        return response([
            "message" => "Successfully Data Deleted.!",
             "status_code" => 200
        ]);
    }
}

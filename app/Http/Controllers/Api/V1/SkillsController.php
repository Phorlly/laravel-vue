<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Http\Resources\V1\SkillResource;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        //get data
        $data = Skill::get();
        return response([
            "data" => $data,
            "message" =>"Successfully Query  Data .!",
            "status_code" => 200
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillRequest $request)
    {
        //post data
       $data = Skill::create($request->validated());
        return response([
            "data" => $data,
            "message" =>"Successfully Created .!",
            "status_code" => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
//        get data by id
        $data = Skill::findOrFail($id);

        if($data != null){
            $data->first();
        }

        return response([
            "data" => $data,
            "status_code" => 200,
             "message" => "Successfully Get Data by id"
         ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, $id)
    {
        //put data by id
        $data = Skill::findOrFail($id);
        if($data != null){
            $data->update($request->validated());
        }

        return response([
            "data" => $data,
            "message" => "Successfully Updated.!",
            "status_code" => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //delete data by id
        $data = Skill::findOrFail($id);

        if($data != null){
            $data->delete();
        }

        return response([
            "message" => "Successfully Deleted.!",
            "status_code" => 200
        ]);
    }
}

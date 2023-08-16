<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::with(['category'])->orderBy('created_at', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'name_kh' => 'required|string|max:255',
            'price' => 'required|numeric',
            'photo' => 'required|image64:jpeg,png,jpg,gif,svg'
        ]);

        $fileName = "";
        $photo = $request->{'photo'};
        if ($photo) {
            // $originalFileName = $photo->getClientOriginalName();
            // $extension = pathinfo($originalFileName, PATHINFO_EXTENSION); // Get the file extension

            // //$fileName = Carbon::now()->format('d-m-Y-H-i-s') . '.' . $extension;
            // $fileName = time().'-' . $request->{'name'} .'.' . $extension;
            //$fileName = date('d-m-Y-H-i-s') .'-'. $originalFileName;

            $fileName = now()->format('dmY_His'). '-' .time(). '.' .explode('/', explode(':', substr($photo,0, strpos($photo,";")))[1])[1];
            Image::make($photo)->save(public_path('images/foods/').$fileName);
        }

        $data = Product::create([
            'name' => $request->{'name'},
            'name_kh' => $request->{'name_kh'},
            'price' => $request->{'price'},
            'photo' => $fileName,
            'noted' => $request->{'noted'},
            'category_id' => $request->{'category_id'}
        ]);

        return response(['message'=>'Successfully saved.!','data'=> $data],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Product::find($id);

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'name_kh' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $photo = $request->{'photo'};
        $currentPhoto = $data->photo;
        if ($currentPhoto != $photo) {
            $this->validate($request,['photo' => 'required|image64:jpeg,png,jpg,gif,svg']);
            $fileName = now()->format('dmY_His'). '-' .time(). '.' .explode('/', explode(':', substr($photo,0, strpos($photo,";")))[1])[1];
            Image::make($photo)->save(public_path('images/foods/').$fileName);
            $request->merge(['photo' => $fileName]);

            $existFile = public_path('images/foods/').$currentPhoto;
            if (file_exists($existFile)){
                @unlink($existFile);
            }

            $data->update([
                'name' => $request->{'name'},
                'name_kh' => $request->{'name_kh'},
                'price' => $request->{'price'},
                'photo' => $fileName,
                'noted' => $request->{'noted'},
                'category_id' => $request->{'category_id'}
            ]);
        }else{
            $data->update([
                'name' => $request->{'name'},
                'name_kh' => $request->{'name_kh'},
                'price' => $request->{'price'},
                'photo' => $currentPhoto,
                'noted' => $request->{'noted'},
                'category_id' => $request->{'category_id'}
            ]);
        }


        return response(['message'=>'Successfully update.!','data'=> $data],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::find($id);

        if($data){
            $data->delete();
        }

        return ['message'=>'Successfully deleted .!', 200];
    }
}

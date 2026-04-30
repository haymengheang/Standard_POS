<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Icproduct;


class ProductController extends Controller
{
       public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Product list',
            'data' => Icproduct::all()
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'productid'       => 'required|unique:icproduct,productid',
            'productname'     => 'required',
            'product_line'    => 'required',
            'unit_of_measure' => 'required',
            'price'           => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation error',
                'errors'  => $validator->errors()
            ], 422);
        }
        $product = Icproduct::create($request->all());
         return response()->json([
            'status'=>true,
            'message'=>'icproduct',
            'data'=>$product
         ], 200, [], JSON_PRETTY_PRINT);
    }

    public function show($id)
    {
        return Icproduct::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $product = Icproduct::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy($id)
    {
        Icproduct::destroy($id);
         return response()->json([
            'status'=>true,
            'message'=>'delete success'
         ], 200, [], JSON_PRETTY_PRINT);
    }
}

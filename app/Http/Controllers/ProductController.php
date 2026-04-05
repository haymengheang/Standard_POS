<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Icproduct;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function ShowProduct():View
    {
      // $products = Icproduct::all();
      $products =  Icproduct::paginate(6);
      return view('Product.ShowProduct', compact('products'));
    }
    public function ShowSaveProduct():View
    {
        return View('Product.SaveProduct');
    }
    public function SaveProduct(Request $request)
    {
        $imageName = null;
      if ($request->hasFile('image')){
        $image = $request->file('image');
        $imageName = $request->PRODUCTID.'_'.time().'.'.$image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
      }
        Icproduct::create([
        'productid' =>$request->PRODUCTID,
        'productname'=>$request->PRODUCTNAME,
        'productname2'=>$request->PRODUCTNAME2,
        'unit_of_measure'=>$request->UNIT_OF_MEASURE,
        'image'=>$imageName,
        'product_line'=>$request->PRODUCT_LINE,
        'price'=>$request->PRICE,
        'action'=>$request->status,
        'other_price'=>$request->OTHER_PRICE,
        'created_at'=>now()
      ]);
      return redirect()->back()->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
      $product = Icproduct::where('productid', $id)->first();
      return view('Product.SaveProduct', compact('product'));
    }
    public function update(Request $request, $id)
    {
      $product = Icproduct::where('productid',$id)->first();
      $imageName = null;
      if ($request->hasFile('image')){
        $image = $request->file('image');
        $imageName = $request->PRODUCTID.'_'.time().'.'.$image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
      }
      $product->update([
        'productname'=>$request->PRODUCTNAME,
        'productname2'=>$request->PRODUCTNAME2,
        'unit_of_measure'=>$request->UNIT_OF_MEASURE,
        'image'=>$imageName,
        'product_line'=>$request->PRODUCT_LINE,
        'price'=>$request->PRICE,
        'action'=>$request->status,
        'other_price'=>$request->OTHER_PRICE,
        'updated_at'=>now()
      ]);
      return redirect()->route('Show.Product');
    }
    public function destroy($id)
    {
      $product = Icproduct::where('productid',$id)->first();
      if($product->image && File::exists(public_path('uploads/' . $product->image))){
        File::delete(public_path('uploads/' . $product->image));
      }
      $product->delete();
      return redirect()->route('Show.Product');
    }

}

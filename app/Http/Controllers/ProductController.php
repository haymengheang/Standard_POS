<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Icproduct;
use App\Models\product_line;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

public function ShowProduct(Request $request)
{
    $query = Icproduct::query();
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('productid', 'like', "%{$search}%")
              ->orWhere('productname', 'like', "%{$search}%")
              ->orWhere('product_line', 'like', "%{$search}%");
        });
    }
      if ($request->filled('category')) {
        $query->where('product_line', $request->category);
    }

    $products = $query->paginate(6);
    $categories = product_line::select('productlineid','productlinename')->get();

    if ($request->ajax()) {
      return response()->json([
          'table' => view('Product.SearchPartials', compact('products'))->render(),
          'pagination' => view('Product.PaginationPartials', compact('products'))->render()
      ]);
    }
    return view('Product.ShowProduct', compact('products','categories'));
}

    public function ShowSaveProduct():View
    {
      $categories = product_line::select('productlinename', 'productlineid');
      return View('Product.SaveProduct', compact('categories'));
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
        'useradd'=>Auth::user()->name,
        'created_at'=>now()
      ]);
      return redirect()->back()->with('success', 'Data saved successfully');
    }

    public function edit($id)
    {
      $product = Icproduct::where('productid', $id)->first();
      $categories = product_line::select('productlineid', 'productlinename')->get();
      return view('Product.SaveProduct', compact('product','categories'));
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
        'useredit'=>Auth::user()->name,
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

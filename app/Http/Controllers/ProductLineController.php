<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\product_line;

class ProductLineController extends Controller
{
    public function ShowProductLine():View
    {
        $productline = product_line::paginate(6);
        return view('ProductLine.ShowProductLine',compact('productline'));
    }
    public function ShowProductLineEdit():View
    {
        return view('ProductLine.SaveProductLine');
    }
    public function SaveProductLine(Request $request)
    {
        $imageName = null;
        if($request->hasfile('image')){
            $image = $request->file('image');
            $imageName = $request->productsLineid.'_'.time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
        }
        product_line::create([
            'productlineid'=>$request->productsLineid,
            'productlinename'=>$request->productsLinename,
            'productlinename2'=>$request->productsLinename2,
            'noted'=>$request->Noted,
            'disc'=>$request->discAmount,
            'disc_percentage'=>$request->discPercentage,
            'picture'=>$imageName,
            'active'=>$request->status,
            'created_at'=>now()
        ]);
        return redirect()->back()->with('success','Data saved successfully');
    }
    //     public function edit($id)
    // {
    //   $product = Icproduct::where('productid', $id)->first();
    //   return view('Product.SaveProduct', compact('product'));
    // }

    public function edit($id)
    {
        $productline = product_line::where('productlineid',$id)->first();
        // return view()
    }
}

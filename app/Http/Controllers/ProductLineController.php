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

    public function edit($id)
    {
        $productline = product_line::where('productlineid',$id)->first();
        return view('ProductLine.SaveProductLine',compact('productline'));
    }


    public function update(Request $request,$id)
    {
        $productline = product_line::where('productsLineid',$id)->first();
        $imageName = null;
        if($request->hasfile('image')){
            $image = $request->file('image');
            $imageName = $request->productsLineid.'_'.time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
        }
       $productline->update([
            'productlineid'=>$request->productsLineid,
            'productlinename'=>$request->productsLinename,
            'productlinename2'=>$request->productsLinename2,
            'noted'=>$request->Noted,
            'disc'=>$request->discAmount,
            'disc_percentage'=>$request->discPercentage,
            'picture'=>$imageName,
            'active'=>$request->status,
            'updated_at'=>now()
        ]);
       return redirect()->route('Show.ProductLine');
    }

    public function destroy($id)
    {
        $productline = product_line::where('productlineid',$id)->first();
        if($productline->image && File::exists(public_path('uploads/'. $productline->image))){
            File::delete(public_path('uploads/' . $productline->image));
        }
        $productline->delete();
        return redirect()->route('Show.ProductLine');
    }

}

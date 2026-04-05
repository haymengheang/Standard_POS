<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Icproduct;
class MainController extends Controller
{
    public function show():view
    {
        return view('Main');
    }
    public function SaveDate():view
    {
        return view('SaveData');
    }
    public function SaveData(Request $request)
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
}

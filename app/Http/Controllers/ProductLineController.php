<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\product_line;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class ProductLineController extends Controller
{
    public function ShowProductLine(Request $request)
    {
        $query = product_line::query();
        if ($request->filled('search')){
            $search = $request->search;
            $query->where(function ($q) use ($search){
                $q->where('productlineid', 'like', "%{$search}%")
                ->orWhere('productlinename', 'like', "%{$search}%")
                ->orWhere('productlinename2','like', "%{$search}%");
            });
        }
        $productline = $query->paginate(6);
        if ($request->ajax()){
            return response()->json([
                'table' => view('ProductLine.SearchProductLinePartials', compact('productline'))->render(),
                'pagination' => view('ProductLine.PaginationProductLinePartials', compact('productline'))->render()
            ]);
        }
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
            'productlineid'=>Str::Upper($request->productsLineid),
            'productlinename'=>$request->productsLinename,
            'productlinename2'=>$request->productsLinename2,
            'noted'=>$request->Noted,
            'disc'=>$request->discAmount,
            'disc_percentage'=>$request->discPercentage,
            'picture'=>$imageName,
            'active'=>$request->status,
            'useradd'=>Auth::user()->name,
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
        $productline = product_line::where('productlineid',$id)->first();
        $imageName = null;
        if($request->hasfile('image')){
            $image = $request->file('image');
            $imageName = $request->productsLineid.'_'.time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
        }
       $productline->update([
            'productlineid'=>Str::Upper($request->productsLineid),
            'productlinename'=>$request->productsLinename,
            'productlinename2'=>$request->productsLinename2,
            'noted'=>$request->Noted,
            'disc'=>$request->discAmount,
            'disc_percentage'=>$request->discPercentage,
            'picture'=>$imageName,
            'active'=>$request->status,
            'useredit'=>Auth::user()->name,
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

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\icum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UnitofMeasureController extends Controller
{
    public function ShowUnitofMeasure(Request $request){
        $query = icum::query();
        if ($request->filled('search')){
            $search = $request->search;
            $query->where(function ($q) use ($search){
                $q->where('umid','like', "%{$search}%")
                ->orWhere('umname','like', "%{$search}%")
                ->orwhere('umname2','like', "%{$search}%");
            });
        }
        $UnitOfMeasure = $query->paginate(6);

         if ($request->ajax()) {
          return response()->json([
          'table' => view('UnitofMeasure.SearchUnitOfMeasurePartials', compact('UnitOfMeasure'))->render(),
          'pagination' => view('Product.PaginationPartials', compact('UnitOfMeasure'))->render()
      ]);
    }
    return view('UnitofMeasure.ShowUnitofMeasure', compact('UnitOfMeasure'));
    }

    //     public function ShowProduct(Request $request)
// {
//     $query = Icproduct::query();
//     if ($request->filled('search')) {
//         $search = $request->search;
//         $query->where(function ($q) use ($search) {
//             $q->where('productid', 'like', "%{$search}%")
//               ->orWhere('productname', 'like', "%{$search}%")
//               ->orWhere('product_line', 'like', "%{$search}%");
//         });
//     }
//       if ($request->filled('category')) {
//         $query->where('product_line', $request->category);
//     }

//     $products = $query->paginate(6);
//     $categories = product_line::select('productlineid','productlinename')->get();

//     if ($request->ajax()) {
//       return response()->json([
//           'table' => view('Product.SearchPartials', compact('products'))->render(),
//           'pagination' => view('Product.PaginationPartials', compact('products'))->render()
//       ]);
//     }
//     return view('Product.ShowProduct', compact('products','categories'));
// }



    public function ShowPageSaveUnitofMeasure(){
        return view('UnitofMeasure.SaveUnitofMeasure');
    }

    public function SaveUnitofMeasure(Request $request){
            icum::create([
            'umid' =>Str::upper($request->umid),
            'umname'=>$request->umname,
            'umname2'=>$request->umname2,
            'factor'=>$request->factor,
            'note'=>$request->Noted,
            'active'=>$request->status,
            'useradd'=>Auth::user()->name,
            'created_at'=>now()
        ]);
        return redirect()->back()->with('success', 'Data saved successfully');
    }


}

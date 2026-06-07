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
          'pagination' => view('UnitofMeasure.PaginationUnitofMeasurePartials', compact('UnitOfMeasure'))->render()
      ]);
    }
    return view('UnitofMeasure.ShowUnitofMeasure', compact('UnitOfMeasure'));
    }
        public function edit($id)
    {
        $UnitOfMeasure = icum::where('umid', $id)->first();
        return view('UnitofMeasure.SaveUnitofMeasure', compact('UnitOfMeasure'));
    }

     public function update(Request $request, $id)
    {

      $UnitOfMeasure = icum::where('umid',$id)->first();
      $UnitOfMeasure->update([
        'umid' =>Str::upper($request->umid),
            'umname'=>$request->umname,
            'umname2'=>$request->umname2,
            'factor'=>$request->factor,
            'note'=>$request->Noted,
            'active'=>$request->status,
            'useradd'=>Auth::user()->name,
            'updated_at	'=>now()
      ]);
      return redirect()->route('Show.Unitofmeasure');
    }

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

    public function destroy($id)
    {
      $UnitOfMeasure = icum::where('umid',$id)->first();
      $UnitOfMeasure->delete();
      return redirect()->route('Show.Unitofmeasure');
    }


}

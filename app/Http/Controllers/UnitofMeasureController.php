<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\icum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UnitofMeasureController extends Controller
{
    public function ShowUnitofMeasure(){
        $UnitofMeasure = icum::paginate(6);
        return view('UnitofMeasure.ShowUnitofMeasure', compact('UnitofMeasure'));
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
}

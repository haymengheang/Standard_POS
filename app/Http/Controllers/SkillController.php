<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Models\User;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Skill::where('userid', Auth::id())->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'skillname' => 'required|string|max:255',
        ]);

        $skill = Skill::create([
            'userid' => Auth::id(), // Use user ID instead of name
            'skillname' => $request->skillname,
            'username' => Auth::user()->name, // Store username for easier access
        ]);

        return response()->json([
            'success' => true,
            'skill' => $skill,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $profile = User::where('email', Auth::user()->email)->first();
        $imageName = $profile->profile;
        if($request->hasfile('image')){
            $image = $request->file('image');
            $imageName = Auth::user()->email.'_'.time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
        }
       $profile->update([
            'name'=>$request->name,
            'position'=>$request->position,
            'location'=>$request->location,
            'phonenumber'=>$request->phonenumber,
            'full_name'=>$request->full_name,
            'bio'=>$request->bio,
            'profile'=>$imageName,
            'useredit'=>Auth::user()->name,
            'updated_at'=>now()
        ]);
       return redirect()->back()->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {

        if ($skill->userid != Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $skill->delete();
        return response()->json(['success' => true]);
    }
}

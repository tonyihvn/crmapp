<?php

namespace App\Http\Controllers;

use App\followups;
use App\members;
use Illuminate\Http\Request;

class FollowupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $followups = followups::orderBy('created_at', 'desc')->paginate(5);
        $title = 'Followup Activities';
        return view('followups.followups')->with(['followups'=>$followups])->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->can_post()) {
            $members = members::all();
            return view('followups.newfollowup')->with(['members'=>$members]);
        } else {
            return redirect('/')->withErrors('You have not sufficient permissions for adding followup activity');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        followups::create($request->all());
        $message = "Followup activity added successfully, welldone!";
        return redirect('/')->withMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\followups  $followups
     * @return \Illuminate\Http\Response
     */
    public function show(followups $followups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\followups  $followups
     * @return \Illuminate\Http\Response
     */
    public function edit(followups $followups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\followups  $followups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, followups $followups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\followups  $followups
     * @return \Illuminate\Http\Response
     */
    public function destroy(followups $followups)
    {
        //
    }

    public function addfollowup($memberid,$name){
        if (auth()->user()->can_post()) {
            $members = members::select('id','name')->get();
            return view('followups.newfollowup')->with(['members'=>$members, 'memberid'=>$memberid,'name'=>$name]);
        } else {
            return redirect('/')->withErrors('You have not sufficient permissions for adding followup activity');
        }
    }
}

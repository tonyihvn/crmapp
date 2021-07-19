<?php

namespace App\Http\Controllers;

use App\members;
use App\followups;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = members::orderBy('category', 'desc')->paginate(5);
        $title = 'Members List';
        return view('members.members')->with(['members'=>$members])->withTitle($title);
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
            return view('members.register')->with(['members'=>$members]);
        } else {
            return redirect('/')->withErrors('You have not sufficient permissions for registering a member');
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
        members::create($request->all());
        $message = "Member registered successfully, welcome!";
        return redirect('/')->withMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\members  $members
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Members::where('id', $id)->first();
        $members = members::all();
        $followups = followups::where('member_id',$id)->orderBy('created_at', 'desc')->paginate(5);

        if ($member) {
            return view('members.member')->with(['member'=>$member,'members'=>$members,'followups'=>$followups]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\members  $members
     * @return \Illuminate\Http\Response
     */
    public function edit(members $members)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\members  $members
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, members $members)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\members  $members
     * @return \Illuminate\Http\Response
     */
    public function destroy(members $members)
    {
        //
    }

    public function searchMember(Request $request)
    {
        $results = members::where('name', 'LIKE', '%'.$request->keyword.'%')->orWhere('about', 'LIKE', '%'.$request->keyword.'%')->orWhere('location', 'LIKE', '%'.$request->keyword.'%')->get();
        
        if($results){
            return view('members.members')->with(['members'=>$results])->withTitle("Search Results for: ". $request->keyword);
        }else{
            $message = "No member information found with the search keyword: ".$request->keyword;
            return redirect('/members')->withMessage($message);

        }
        
    }
}

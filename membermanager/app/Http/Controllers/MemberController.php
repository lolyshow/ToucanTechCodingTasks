<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\School;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::join("schools",
        "members.school_id","schools.id")
        ->join("countries", "schools.country_id","countries.id")
        ->get();
        $schools = School::all();
        return view ('members.index')
        ->with('members', $members)
        ->with('schools', $schools);
        
    }

    public function chartpage(){
        $schoolMembers = Member::join("schools",
        "members.school_id","schools.id")
        ->join("countries", "schools.country_id","countries.id")
        ->select("schools.school_name", "countries.country_name")
        ->selectRaw('COUNT(members.id) as total_members')
        ->groupBy('schools.school_name', 'countries.country_name')
        ->get();

        return view('welcome')->with("schoolMembers",$schoolMembers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_form()
    {
        $schools = School::all();
        return view('members.create')->with('schools', $schools);
    }
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Member::create($input);
        return redirect('members')->with('flash_message', 'Member Addedd!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $members = Member::join("schools",
        "members.school_id","schools.id")
        ->join("schools", "schools.country_id","countries.id")
        ->get();
        return view('members.show')->with('Member', $members);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('members.edit')->with('Member', $member);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $input = $request->all();
        $member->update($input);
        return redirect('member')->with('flash_message', 'Member Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::destroy($id);
        return redirect('members')->with('flash_message', 'Member deleted!');  
    }

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\DB;
use App\Models\Member;


class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = DB::table('members')->get();

        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members'
        ]);


        $member = new Member;

        $member->name = $request->input('name');
        $member->email = $request->input('email');

        $member->save();
        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function  edit($id)
    {

        $member = DB::table('members')
            ->where('id', $id)
            ->get();

        $member = $member->first();

        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => "required|email"
        ]);


        $name = $request->input('name');
        $email = $request->input('email');
        $memderid = $request->input('memderid');

        $member =  DB::table('members')
            ->where('id', $memderid)
            ->update([
                'name' => $name,
                'email' => $email
            ]);


        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = DB::table('members')
            ->where('id', $id)
            ->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }

    /**
     * Remove the specified resource from associateshcool.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function associateshcool($id)
    {
        $associateshcools = DB::table('schools')
            ->join('member_school', 'schools.id', '=', 'member_school.school_id')
            ->where('member_school.member_id', $id)
            ->select('schools.id', 'schools.name', 'schools.location')
            ->get();

        return view('members.associateshcool', compact('associateshcools'));
    }
}

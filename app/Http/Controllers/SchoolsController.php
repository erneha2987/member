<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Support\Facades\DB;
use App\Models\Member;

use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$schools = School::all();
        $schools = DB::table('schools')->get();
        return view('schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = DB::table('members')->get();

        return view('schools.create', compact('members'));
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
            'location' => 'required',
            'member_ids' => 'required',
        ]);

        $schoolId = DB::table('schools')->insertGetId([
            'name' =>  $request->input('name'),
            'location' =>  $request->input('location')
        ]);


        foreach ($request->input('member_ids') as $value) {

            // Insert a new row into the members table
            DB::table('member_school')->insert([
                'member_id' => $value,
                'school_id' => $schoolId
            ]);
        }

        return redirect()->route('schools.index')->with('success', 'School created successfully.');
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
    public function edit($id)
    {

        $school = DB::table('schools')
            ->where('id', $id)
            ->get();

        $school = $school->first();

        $members = DB::table('members')->get();

        $school_members = DB::table('member_school')
            ->where('school_id', $id)->select('member_id')
            ->get();




        foreach ($school_members as $key => $value) {
            $school_member[] =  $value->member_id;
        }

        // print_r($school_member);

        return view('schools.edit', compact('members', 'school', 'school_member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        $name = $request->input('name');
        $location = $request->input('location');
        $schoolid = $request->input('schoolid');


        $member =  DB::table('schools')
            ->where('id', $schoolid)
            ->update([
                'name' => $name,
                'location' => $location
            ]);



        $memberdelete = DB::table('member_school')
            ->where('school_id', $schoolid)
            ->delete();

        foreach ($request->input('member_ids') as $value) {


            // Insert a new row into the members table
            DB::table('member_school')->insert([
                'member_id' => $value,
                'school_id' => $schoolid
            ]);
        }


        return redirect()->route('schools.index')->with('success', 'School updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $member = DB::table('schools')
            ->where('id', $id)
            ->delete();

        return redirect()->route('schools.index')->with('success', 'School deleted successfully.');
    }
}
